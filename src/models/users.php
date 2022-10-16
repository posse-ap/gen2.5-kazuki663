<?php
//検索
function userSearch($db, $condition, $constant) {
  $stmt = $db->prepare("SELECT * from users WHERE $condition");
    $stmt->execute(array(
      $constant
    ));
    $output = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $output;
}
