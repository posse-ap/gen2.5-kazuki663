<?php
//検索
function userSearch($db, $condition) {
  $stmt = $db->prepare("SELECT * from users WHERE $condition");
    $stmt->execute();
    $output = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $output;
}