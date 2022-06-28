<?php
function emitEvent($eventName)
{
    $id_admin = $_SESSION['id_user'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $db = new DB();
    $db->createLog($id_admin, $eventName, $ip, $user_agent);
}