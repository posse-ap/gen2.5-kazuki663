<?php
//時間集計
function TotalHour($db, $condition, $id) {
  $stmt = $db->prepare("SELECT sum(time) from study_time WHERE user_id = ? $condition");
  $stmt->execute(array(
    $id
  ));
  $output = $stmt->fetchALL(PDO::FETCH_ASSOC);
  return $output;
}

//検索
function TimeResearch($db, $condition, $id) {
  $stmt = $db->prepare("SELECT day, sum(time) from study_time WHERE user_id = ? $condition");
  $stmt->execute(array(
    $id
  ));
  $output = $stmt->fetchALL(PDO::FETCH_ASSOC);
  return $output;
}

//挿入
function InsertTime($db, $user_id, $time, $day) {
  $result = False;
    try{
    $stmt = $db->prepare(
        "INSERT INTO
    `study_time` (
    `user_id`,
    `time`,
    `day`
    )
    VALUES(?,?,?)");

    $stmt->bindValue(1,$user_id, PDO::PARAM_STR);
    $stmt->bindValue(2,$time, PDO::PARAM_STR);
    $stmt->bindValue(3,$day, PDO::PARAM_STR);
    $stmt->execute();
    }catch(\Exception $e){
        echo $e->getMessage();
        return $result;
        //ここでエラーページに飛ばしたい
        //→その際にもどるボタンで、前いたページに遷移させる
    }
}
