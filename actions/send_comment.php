<?php
require_once('../utils/sessionManager.php');
require_once('../utils/database.php');
loginIsRequried();
if (isset($_POST['text']) && isset($_POST['video'])) {
    $text = strip_tags($_POST['text']);
    if ($text !== '') {
        $db = new DB();
        var_dump($db->sendComment($_SESSION['id_user'], $_POST['video'], $text));
        header('Location: ../video.php?video='.$_POST['video']);
    } else {
        header('Location: ../index.php');
    }
}
