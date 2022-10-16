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
