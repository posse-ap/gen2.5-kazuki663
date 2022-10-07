<?php
//検索
function languageResearch($db) {
  $stmt = $db->prepare("SELECT * from languages");
  $stmt->execute(array());
  $output = $stmt->fetchALL(PDO::FETCH_ASSOC);
  return $output;
}

//円グラフ用時間計算
function languageTime() {
  $stmt = $db->prepare("SELECT language.languages, sum(time) from study_languages INNER JOIN   ")
}
?>