<?php include_once "db.php";

$_POST['acc'];
$res=$User->count(['acc'=>$_POST['acc']]);
if($res>0){
    echo 1;
}else{
    echo 0;    
}

?>