<?php
//modelsフォルダの中のfileをrequire
foreach (glob("../models/*") as $filename) {
  require($filename);
}

session_start();

//ログインしてなかったらログイン画面に戻す
if (empty($_SESSION['user_id'])) {
  header("Location: http://" . $_SERVER['HTTP_HOST'] . "/views/login.php");
  exit();
}

//ユーザー検索
$id = $_SESSION['user_id'];
$condition = "id = ?";
$user = userSearch($db, $condition, $id);

//月変更処理
if (isset($_GET['month'])) {
  $month = $_GET['month'];
  if ($month == "2022-08") {
    $today = "2022-08-06";
  } else {
    $today = "1000-10-10";
  }
  $Month = date("Y年m月", strtotime($month));
  $Month_after = date("Y-m", strtotime("$month +1 month"));
  $Month_before = date("Y-m", strtotime("$month -1 month"));
  $last_day = date('Y-m-d H:i:s', strtotime("$month last day of this month"));
} else {
  //今の時間取得
  // $today = date("Y-m-d");
  $today = "2022-08-06";
  // $month = date("Y-m");
  $month = "2022-08";
  // $Month = date("Y年m月", strtotime($month));
  // $Month_after = date("Y-m", strtotime('$month +1 month'));
  // $Month_before = date("Y-m", strtotime('$month -1 month'));
  $Month = "2022年8月";
  $Month_after = "2022-09";
  $Month_before = "2022-07";
  $last_day = date('Y-m-d H:i:s', strtotime("$month last day of this month"));
}


//時間集計
//日
$today_condition = "AND day LIKE '$today%'";
$today_hour = TotalHour($db, $today_condition, $id);
//月
$month_condition = "AND day LIKE '$month%'";
$month_hour = TotalHour($db, $month_condition, $id);
//トータル
$total_condition = "AND day <= '$last_day'";
$total_hour = TotalHour($db, $total_condition, $id);

//勉強時間算出(複数回のpostに対応済み)
$time_condition = "AND day LIKE '$month%' GROUP BY day";
$study_times = TimeResearch($db, $time_condition, $id);
//月の日数取得
$monthDay = intval(date('t', strtotime("$today")));
//学習した日付の配列取得
$study_day = array();
//学習した日と時間の配列
$study_data = array();
foreach ($study_times as $study_time) {
  $need_day = intval(date('j', strtotime($study_time['day'])));
  array_push($study_day, $need_day);
  $day_array = array(intval(date('j', strtotime($study_time['day']))), intval($study_time['sum(time)']));
  $study_data = array_merge($study_data, array($day_array));
}
//棒グラフ用配列の作成
for ($i = 1; $i <= $monthDay; $i++) {
  $key = in_array($i, $study_day);
  if ($key) {
  } else {
    array_splice($study_data, $i - 1, 0, [[$i, 0]]);
  }
}
//学習時間円グラフの色の配列作成
$languages = languageResearch($db);
$language_colors = array();
foreach ($languages as $language) {
  array_push($language_colors, $language['color']);
}
//学習時間円グラフ用の配列作成
$language_condition = "AND day LIKE '$month%' GROUP BY language_id ORDER BY language_id ASC";
$languages_data = languageTime($db, $language_condition, $id);
$language_data = array();
foreach ($languages_data as $data) {
  $lang = $data['language'];
  $language_array = array("$lang", $data['sum(time)']);
  array_push($language_data, $language_array);
}
//学習コンテンツ円グラフの色の配列作成
$contents = contentsResearch($db);
$contents_colors = array();
foreach ($contents as $content) {
  array_push($contents_colors, $content['color']);
}
//学習コンテンツ円グラフ用の配列作成
$contents_condition = "AND day LIKE '$month%' GROUP BY content_id ORDER BY content_id ASC";
$contents_data = contentsTime($db, $contents_condition, $id);
$content_data = array();
foreach ($contents_data as $data) {
  $content = $data['content'];
  $content_array = array("$content", $data['sum(time)']);
  array_push($content_data, $content_array);
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/reset.css" />
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <title>Webapp</title>
</head>

<body>
  <header>
    <div class="header-container">
      <div class="leftcontainer">
        <img src="../img/posse.jpg" alt="posse" class="posse" />
        <p class="first">1st week</p>
      </div>
      <div class="user_info">
        <p><?= $user[0]['name'] ?></p>
        <form action="../functions/logout.php" method="get">
          <input type="submit" class="logout" name="btn_logout" value="ログアウト">
        </form>
      </div>
      <button id="modal-open" class="kiroku">記録・投稿</button>
    </div>
  </header>
  <div class="container">
    <div class="left-container">
      <div class="hour-container">
        <div class="hourbox">
          <div class="box">
            <p class="top">Today</p>
            <p class="number">
              <?php
              //合計が０だった時の場合分け
              if (is_null($today_hour[0]["sum(time)"])) {
                echo 0;
              } else {
                echo $today_hour[0]["sum(time)"];
              }
              ?>
            </p>
            <p class="hour">hour</p>
          </div>
        </div>
        <div class="hourbox">
          <div class="box">
            <p class="top">Month</p>
            <p class="number">
              <?php
              if (is_null($month_hour[0]["sum(time)"])) {
                echo 0;
              } else {
                echo $month_hour[0]["sum(time)"];
              }
              ?>
            </p>
            <p class="hour">hour</p>
          </div>
        </div>
        <div class="hourbox">
          <div class="box">
            <p class="top">Total</p>
            <p class="number">
              <?php
              if (is_null($total_hour[0]["sum(time)"])) {
                echo 0;
              } else {
                echo $total_hour[0]["sum(time)"];
              }
              ?>
            </p>
            <p class="hour">hour</p>
          </div>
        </div>
      </div>
      <div class="column">

        <div id="column"></div>
        <div id="column-2"></div>
      </div>
    </div>
    <div class="right-container">

      <div class="pie">
        <div id="pie-1"></div>
        <div id="pie-3"></div>

      </div>
      <div class="pie">
        <div id="pie-2"></div>
        <div id="pie-4"></div>
      </div>
    </div>
    <div class="year-container">
      <a href="top.php?month=<?= $Month_before ?>" class="year_before">
        <</a>
          <div class="year"><?= $Month ?></div>
          <a href="top.php?month=<?= $Month_after ?>" class="year_before">></a>
    </div>
  </div>


  <!-- ここからmodal -->

  <div id="modal-overlay">
    <!-- POST処理 -->
    <form action="../functions/save.php" method="POST">
      <div id="modal-content" class="modal-container">
        <div class="modal-box">
          <div class="left-modal">
            <div class="study-day">
              <label for="">学習日</label>
              <div class="study-container">
                <input type="text" class="study-box" id="study-box" name="study_day" />
              </div>
            </div>
            <div class="study-content">
              <h1>学習コンテンツ（複数選択可）</h1>
              <div class="content-option">
                <?php
                foreach($contents as $index => $content){
                ?>
                  <input class="visually-hidden" type="checkbox" name="contents[]" id="<?= $content["content"] ?>" value="<?= $index + 1 ?>" />
                <div class="content-options">
                  <label for="<?= $content["content"] ?>"><?= $content["content"] ?></label>
                </div>
                <?php
                }
                ?>
              </div>
            </div>
            <div class="study-language">
              <h1>学習言語（複数選択可）</h1>
              <div class="content-option">
                <?php
                foreach($languages as $index => $language){
                ?>
                <input class="visually-hidden" type="checkbox" name="languages[]" id="<?= $language["language"] ?>" value="<?= $index + 1 ?>" />
                <div class="content-options">
                  <label for="<?= $language["language"] ?>"><?= $language["language"] ?></label>
                </div>
                <?php
                }
                ?>
              </div>
            </div>
          </div>
          <div class="right-modal">
            <div class="study-time">
              <label for="">学習時間</label>
              <div class="study-container">
                <input type="text" class="study-box" name="time" />
              </div>
            </div>
            <div class="twitter-comment">
              <label for="">Twitter用コメント</label>
              <div class="twitter-container">
                <textarea class="twitter-box"></textarea>
              </div>
            </div>
            <div class="twitter-share">
              <section class="bigcheck" id="Bigcheck">
                <div></div>
              </section>
              <li>Twitterにシェアする</li>
            </div>
          </div>
        </div>
        <div class="btn-container">
          <input type="submit" class="modal-btn" id="finish-btn" value="記録・投稿">
        </div>
        <button type="button" id="modal-close" class="close-btn">×</button>
      </div>
    </form>
  </div>

  <!-- ここからloading画面 -->
  <div id="loading-overlay">
    <div id="loading-page">
      <img src="../img/loading-img.png" alt="" class="loading-img , active-img" id="loading">
    </div>
  </div>

  <!-- 完了画面 -->
  <div id="finish-overlay">
    <div id="finish-page">
      <div class="finish-container">
        <div class="finish-content">

          <section class="awesome">AWESOME!</section>
          <section class="biggest-check">
            <div></div>
          </section>
          <section class="finish-word">記録・投稿<br>完了しました</section>
          <button id="finish-close" class="finish-close">×</button>
        </div>
      </div>
    </div>

  </div>




  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


  <script src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="../js/index.js"></script>
  <script>
    function drawChart() {
      //棒グラフ
      let column = document.getElementById('column');
      let data;
      let options = {
        width: 620,
        height: 450,
        colors: ['#0171b8'],
        animation: {
          startup: true,
          duration: 400,
          easing: 'inAndout',
        },
        enableInteractivity: false,
        legend: 'none',
        chartArea: {
          width: '80%',
          height: '60%'
        },
      };
      let stick_chart = new google.visualization.ColumnChart(column);
      data = new google.visualization.arrayToDataTable([
        ['day', 'time'],
        <?php
        foreach ($study_data as $data) {
          echo "[$data[0], $data[1]],";
        }
        ?>
      ]);
      stick_chart.draw(data, options);

      //棒グラフ（レスポンシブ時）
      let column2 = document.getElementById('column-2');
      let data_responsive;
      let options_responsive = {
        width: 305,
        height: 140,
        colors: ['#0171b8'],
        animation: {
          startup: true,
          duration: 400,
          easing: 'inAndout',
        },
        enableInteractivity: false,
        legend: 'none',
        chartArea: {
          width: '90%',
          height: '70%'
        },

      };
      let stick_chart_responsive = new google.visualization.ColumnChart(column2);
      data_responsive = new google.visualization.arrayToDataTable([
        ['day', 'time'],
        <?php
        foreach ($study_data as $data) {
          echo "[$data[0], $data[1]],";
        }
        ?>
      ]);
      stick_chart_responsive.draw(data_responsive, options_responsive);

      //学習言語円グラフ
      let pie1 = document.getElementById('pie-1');
      let pie_data;
      let pie_options = {
        width: 280,
        height: 580,
        title: '学習言語',
        pieHole: 0.5,
        colors: [<?php foreach ($language_colors as $language_color) {
                    echo "'$language_color', ";
                  } ?>],
        legend: {
          position: 'bottom'
        },
        chartArea: {
          width: '100%',
          height: '80%'
        },
        enableInteractivity: false,
        pieSliceTextStyle: {
          fontSize: 10
        },
      };
      let pie_chart = new google.visualization.PieChart(pie1);

      pie_data = new google.visualization.arrayToDataTable([
        ['学習言語', 'time'],
        <?php
        foreach ($language_data as $data) {
          echo "['$data[0]', $data[1]],";
        }
        ?>
      ]);

      pie_chart.draw(pie_data, pie_options);

      //学習言語円グラフ（レスポンシブ）
      let pie_responsive = document.getElementById('pie-3');
      let pie_data_responsive;
      let pie_options_responsive = {
        width: 150,
        height: 210,
        title: '学習言語',
        pieHole: 0.5,
        colors: [<?php foreach ($language_colors as $language_color) {
                    echo "'$language_color', ";
                  } ?>],
        legend: {
          position: 'bottom'
        },
        chartArea: {
          width: '80%',
          height: '80%'
        },
        enableInteractivity: false,
        pieSliceTextStyle: {
          fontSize: 10
        },
      };
      let pie_chart_responsive = new google.visualization.PieChart(pie_responsive);

      pie_data_responsive = new google.visualization.arrayToDataTable([
        ['学習言語', 'time'],
        <?php
        foreach ($language_data as $data) {
          echo "['$data[0]', $data[1]],";
        }
        ?>
      ]);

      pie_chart_responsive.draw(pie_data_responsive, pie_options_responsive);

      //学習コンテンツ円グラフ
      let content_pie = document.getElementById('pie-2');
      let content_data;
      let content_options = {
        width: 280,
        height: 580,
        title: '学習コンテンツ',
        pieHole: 0.5,
        colors: [<?php foreach ($contents_colors as $contents_color) {
                    echo "'$contents_color', ";
                  } ?>],
        legend: {
          position: 'bottom'
        },
        chartArea: {
          width: '100%',
          height: '80%'
        },
        enableInteractivity: false,
        pieSliceTextStyle: {
          fontSize: 10
        },
      };
      let content_chart = new google.visualization.PieChart(content_pie);

      content_data = new google.visualization.arrayToDataTable([
        ['学習コンテンツ', 'time'],
        <?php
        foreach ($content_data as $data) {
          echo "['$data[0]', $data[1]],";
        }
        ?>
      ]);
      content_chart.draw(content_data, content_options);

      //学習コンテンツ円グラフ（レスポンシブ）
      let content_pie_responsive = document.getElementById('pie-4');
      let content_data_responsive;
      let content_options_responsive = {
        width: 150,
        height: 210,
        title: '学習コンテンツ',
        pieHole: 0.5,
        colors: [<?php foreach ($contents_colors as $contents_color) {
                    echo "'$contents_color', ";
                  } ?>],
        legend: {
          position: 'bottom'
        },
        chartArea: {
          width: '80%',
          height: '80%'
        },
        enableInteractivity: false,
        pieSliceTextStyle: {
          fontSize: 10
        },
      };
      let content_chart_responsive = new google.visualization.PieChart(content_pie_responsive);

      content_data_responsive = new google.visualization.arrayToDataTable([
        ['学習コンテンツ', 'time'],
        <?php
        foreach ($content_data as $data) {
          echo "['$data[0]', $data[1]],";
        }
        ?>
      ]);

      content_chart_responsive.draw(content_data_responsive, content_options_responsive);
    }

    google.charts.load('current', {
      packages: ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);
  </script>
</body>

</html>