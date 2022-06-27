<?php
require_once('../utils/sessionManager.php');
require_once('../utils/database.php');
loginIsRequried();
if(isset($_POST['channel']) && isset($_POST['back'])){
    $db = new DB();
    $isSubscribed = $db->isSubscribed($_SESSION['id_user'], $_POST['channel']);
    if($isSubscribed){
        $db->unsubscribe(3,3);
    }else{
        $db->subscribe(3, 3);
    }
    header('Location: '.$_POST['back']);
}else{
    header('Location: ../index.php');
}