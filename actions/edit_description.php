<?php
require_once('../utils/sessionManager.php');
require_once('../utils/database.php');
loginIsRequried();
if(isset($_POST['description'])){
    $description = strip_tags($_POST['description']);
    $id_user = $_SESSION['id_user'];
    if($description !== ''){
        $db = new DB();
        $db->setDescription($id_user, $description);
    }
}
header('Location: ../profile.php');