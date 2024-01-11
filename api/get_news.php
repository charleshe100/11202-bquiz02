<?php include_once "db.php";

$news=$News->find($_GET['id']);
echo nl2br($news['news']);