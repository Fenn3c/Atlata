<?php
require_once('../utils/sessionManager.php');
require_once('../utils/database.php');
require_once('../utils/imageProcessing.php');

const THUMBNAILS_FOLDER = '../data/thumbnails';

if (isset($_SESSION['UPLOADING_VIDEO'])) {
    $id_video = $_SESSION['UPLOADING_VIDEO'];
    if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['category'])) {
        $db = new DB();
        $title = strip_tags($_POST['title']);
        $description = strip_tags($_POST['description']);
        $category = strip_tags($_POST['category']);
        $thumbnail = null;
        if ($category == 'no-category')
            $category = null;

        if (isset($_FILES['thumbnail']))
            $thumbnail = $_FILES['thumbnail'];

        if($thumbnail){
            $check_img = can_upload($thumbnail);
            if ($check_img === true) {
                $video = $db->getVideoById($id_video);
                if($video){
                    $old_thumbnail = $video['thumbnail'];
                    $upload = upload_image($thumbnail, THUMBNAILS_FOLDER);
                    $db->editThumbnail($id_video, $upload);
                    delete_image($old_thumbnail, THUMBNAILS_FOLDER);
                }
            }
        }

        $db->completeUploading($id_video, $title, $description, $category);
        header("Location: ../index.php");

    }
} else {
    header('Location: ../index.php');
}
