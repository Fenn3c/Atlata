<?php
require('../utils/sessionManager.php');
require('../utils/database.php');
require('../utils/imageProcessing.php');

const BANNER_FOLDER = '../data/banner';

if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    if (isset($_FILES['banner'])) {
        $img = $_FILES['banner'];
        $check_img = can_upload($img);
        if ($check_img === true) {
            $db = new DB();
            $user = $db->getUserById($id_user);
            if ($user) {
                $old_banner = $user['banner'];
                $upload = upload_image($img, BANNER_FOLDER);
                $db->editBanner($id_user, $upload);
                delete_image($old_banner, BANNER_FOLDER);
                header("Location: ../profile.php");
            } else {
                header("Location: ../profile.php");
            }
        } else {
            header("Location: ../profile.php");
            $_SESSION['edit_banner_error'] = $check_img;
        }
    }
} else {
    header('Location: ../login.php');
}

