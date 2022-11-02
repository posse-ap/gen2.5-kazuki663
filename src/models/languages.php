<?php
//検索
function languageResearch($db) {
  $stmt = $db->prepare("SELECT * from languages");
  $stmt->execute(array());
  $output = $stmt->fetchALL(PDO::FETCH_ASSOC);
  return $output;
}

//円グラフ用時間計算
function languageTime($db, $condition, $id) {
  $stmt = $db->prepare("SELECT language, sum(time) from study_languages INNER JOIN languages ON study_languages.language_id = languages.id WHERE user_id = ? $condition");
  $stmt->execute(array(
    $id
  ));
  $output = $stmt->fetchALL(PDO::FETCH_ASSOC);
  return $output;
}

//挿入
function InsertLanguage($db, $user_id, $language_id, $time, $day) {
  $result = False;
    try{
    $stmt = $db->prepare(
        "INSERT INTO
    `study_languages` (
    `user_id`,
    `language_id`,
    `time`,
    `day`
    )
    VALUES(?,?,?,?)");

    $stmt->bindValue(1,$user_id, PDO::PARAM_STR);
    $stmt->bindValue(2,$language_id, PDO::PARAM_STR);
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
