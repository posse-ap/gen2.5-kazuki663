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