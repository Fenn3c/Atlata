<?php
require_once('../utils/sessionManager.php');
require_once('../utils/database.php');
require_once('../utils/videoProcessing.php');
loginIsRequried();

if (isset($_FILES['video'])) {
    $video = $_FILES['video'];
    $can_upload = can_upload_video($video);
    if ($can_upload === true) {
        $name = upload_video($video, '../data/video/');
        $duration = getVideoDuration('../data/video/'.$name);
        $thumbnail =getThumbnail('../data/video/'.$name); 
        echo $thumbnail;
        $db = new DB();
        $id_video = $db->saveRawVideo($_SESSION['id_user'],$duration,$thumbnail, $name);
        $_SESSION['UPLOADING_VIDEO'] = $id_video;
    } else {
        echo $can_upload;
        header('HTTP/1.1 500 Internal Server Error');
    }
}
