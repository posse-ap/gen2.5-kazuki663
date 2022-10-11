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

