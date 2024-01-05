<?php include_once "db.php";

// echo $User->count($_POST);

// 下面簡化成上面
//echo $User->count(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);

// 下面簡化成上面
/* $res=$User->count(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
   echo $res; */

// 下面簡化成上面
/* $res=$User->count(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
if($res>0){
    echo 1;
}else{
    echo 0;
} */

$res=$User->count($_POST);

if($res){
    $_SESSION['user']=$_POST['acc'];
}

echo $res;

?>