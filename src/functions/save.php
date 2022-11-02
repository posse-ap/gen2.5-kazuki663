<?php
sleep(4);

//modelsフォルダの中のfileをrequire
foreach (glob("../models/*") as $filename) {
  require($filename);
}

session_start();
$id = $_SESSION['user_id'];

//POSTされたもの一覧
if(isset($_POST)){
  $day = $_POST['study_day'];
  $contents = $_POST['contents'];
  $languages = $_POST['languages'];
  $time = $_POST['time'];
}

//必要な情報作成
//language_idとtime生成
$num = count($languages);
$language_time = $time/$num;
//content_idとtime生成
$number = count($contents);
$content_time = $time/$number;

//各テーブルに対するinsert処理
InsertTime($db, $id, $time, $day);
foreach($languages as $language_id){
  InsertLanguage($db, $id, $language_id, $language_time, $day);
}
foreach($contents as $content_id){
  InsertContent($db, $id, $content_id, $content_time, $day);
}

header("Location: ../views/top.php");
exit();
