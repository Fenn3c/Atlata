<?php
require_once('../utils/sessionManager.php');
loginIsRequried();
if (isset($_POST['exit'])) {
    $_SESSION = array();
    session_destroy();
    header("Location: ../login.php");
}