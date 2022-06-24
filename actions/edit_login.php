<?php
require_once('../utils/sessionManager.php');
require_once('../utils/database.php');
loginIsRequried();
if(isset($_POST['login'])){
    $login = strip_tags($_POST['login']);
    $id_user = $_SESSION['id_user'];
    if($login !== ''){
        $db = new DB();
        $db->setLogin($id_user, $login);
    }
}
header('Location: ../profile.php');