<?php
include_once "db.php";
if(isset($_POST['del'])){
    foreach($_POST['del'] as $id) {
        $User->del($id);
    }
}
to("../back.php?do=admin");