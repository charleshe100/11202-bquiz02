<?php include_once "db.php";

$news=$News->find($_POST['news']);
if($Log->count(['news'=>$_POST['news'],'acc'=>$_SESSION['user']])>0){
    //收回讚
    $Log->del(['news'=>$_POST['news'],'acc'=>$_SESSION['user']]);
    $news['good']--;
}else{
    //按讚
    $Log->save(['news'=>$_POST['news'],'acc'=>$_SESSION['user']]);
    $news['good']++;
}

$News->save($news);

?>