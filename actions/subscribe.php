<?php
require_once('../utils/sessionManager.php');
require_once('../utils/database.php');
loginIsRequried();
if(isset($_POST['channel'])){
    echo $_POST['channel'];
    $db = new DB();
    $isSubscribed = $db->isSubscribed($_SESSION['id_user'], $_POST['channel']);
    if($isSubscribed){
        $db->unsubscribe(3,3);
        echo 'yes';
    }else{
        $db->subscribe(3, 3);
        echo 'Ге по';
    }
    // header('Location: ../video.php?video='.$_POST['video']);
}else{
    header('Location: ../index.php');
}