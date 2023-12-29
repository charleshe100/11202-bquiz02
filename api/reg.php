<?php include_once "db.php";

unset($_POST['pw2']);
$User->save($_POST);
?>