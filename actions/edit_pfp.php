<?php
require('../utils/sessionManager.php');
require('../utils/database.php');
require('../utils/imageProcessing.php');

const PFP_FOLDER = '../data/pfp';

if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    if (isset($_FILES['pfp'])) {
        $img = $_FILES['pfp'];
        $check_img = can_upload($img);
        if ($check_img === true) {
            $db = new DB();
            $user = $db->getUserById($id_user);
            if ($user) {
                $old_pfp = $user['pfp'];
                $upload = upload_image($img, PFP_FOLDER);
                $db->editPfp($id_user, $upload);
                delete_image($old_pfp, PFP_FOLDER);
                header("Location: ../profile.php");
            } else {
                header("Location: ../profile.php");
            }
        } else {
            header("Location: ../profile.php");
            $_SESSION['edit_pfp_error'] = $check_img;
        }
    }
} else {
    header('Location: ../login.php');
}
