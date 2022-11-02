<?php
//検索
function contentsResearch($db) {
  $stmt = $db->prepare("SELECT * from contents");
  $stmt->execute(array());
  $output = $stmt->fetchALL(PDO::FETCH_ASSOC);
  return $output;
}

//円グラフ用時間計算
function contentsTime($db, $condition, $id) {
  $stmt = $db->prepare("SELECT content, sum(time) from study_contents INNER JOIN contents ON study_contents.content_id = contents.id WHERE user_id = ? $condition");
  $stmt->execute(array(
    $id
  ));
  $output = $stmt->fetchALL(PDO::FETCH_ASSOC);
  return $output;
}

//挿入
function InsertContent($db, $user_id, $content_id, $time, $day) {
  $result = False;
    try{
    $stmt = $db->prepare(
        "INSERT INTO
    `study_contents` (
    `user_id`,
    `content_id`,
    `time`,
    `day`
    )
    VALUES(?,?,?,?)");

    $stmt->bindValue(1,$user_id, PDO::PARAM_STR);
    $stmt->bindValue(2,$content_id, PDO::PARAM_STR);
    $stmt->bindValue(3,$time, PDO::PARAM_STR);
    $stmt->bindValue(4,$day, PDO::PARAM_STR);
    $stmt->execute();
    }catch(\Exception $e){
        echo $e->getMessage();
        return $result;
        //ここでエラーページに飛ばしたい
        //→その際にもどるボタンで、前いたページに遷移させる
    }
}
