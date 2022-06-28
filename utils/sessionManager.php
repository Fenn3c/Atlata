<?php
session_start();

function loginIsRequried()
{
   if (!isset($_SESSION['id_user'])) {
      header('Location: ../login.php');
   }
}

function permissionRequried($permission)
{
   $db = new DB();
   $id_user = $_SESSION['id_user'];
   $user = $db->getUserById($id_user);
   if ($user['permissions'] < $permission)
      header('Location: ../login.php');
}
