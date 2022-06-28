<?php
require_once('../utils/sessionManager.php');
require_once('../utils/database.php');

if (isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['repeat-password']) && isset($_POST['birthday'])) {
    $login = strip_tags($_POST['login']);
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);
    $repeat_password = strip_tags($_POST['repeat-password']);
    $birthday = strip_tags($_POST['birthday']);
    if ($login != "" && $email != "" && $password != "" && $repeat_password != "" && $birthday != "") {
        if ($password == $repeat_password) {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $db = new DB();
            if (!$db->getUserByLogin($login)) {
                $user = $db->createUser($login, $email, $password_hash, $birthday);
                header("Location: ../login.php");
            } else {
                $_SESSION['registration_error'] = "Пользователь с таким именем уже существует.";
                header("Location: ../registration.php");
            }
        } else {
            $_SESSION['registration_error'] = "Пароли не совпадают";
            header("Location: ../registration.php");
        }
    } else {
        $_SESSION['registration_error'] = "Поля не должны быть пустыми.";
        header("Location: ../registration.php");
    }
} else {
    $_SESSION['registration_error'] = "Все поля должны быть заполнены";
    header("Location: ../registration.php");
}