<?php
require_once('../utils/sessionManager.php');
require_once('../utils/database.php');
require_once('../utils/logging.php');

if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    if ($login != "" && $password != "") {
        $db = new DB();
        $user = $db->getUserByLogin($login);
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['id_user'] = $user['id_user'];
                emitEvent("ENTER_TO_SITE");
                header("Location: ../index.php");
            } else {
                $_SESSION['login_error'] = "Неверный логин или пароль.";
                header("Location: ../login.php");
            }
        } else {
            $_SESSION['login_error'] = "Неверный логин или пароль.";
            header("Location: ../login.php");
        }
    } else {
        $_SESSION['login_error'] = "Поля не должны быть пустыми.";
        header("Location: ../login.php");
    }
} else {
    $_SESSION['login_error'] = "Все поля должны быть заполнены.";
    header("Location: ../login.php");
}