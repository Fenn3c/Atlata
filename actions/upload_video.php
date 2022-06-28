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
        $duration = getVideoDuration('../data/video/' . $name);
        if ($duration == '00:00') {
            delete_video($name, '../data/video/');
            echo 'Длительность видео должна составлять не менее 1 секунды.';
            header('HTTP/1.1 500 Internal Server Error');
        } else{

            $thumbnail = getThumbnail('../data/video/' . $name);
            $db = new DB();
            $id_video = $db->saveRawVideo($_SESSION['id_user'], $duration, $thumbnail, $name);
            $_SESSION['UPLOADING_VIDEO'] = $id_video;
        }
    } else {
        echo $can_upload;
        header('HTTP/1.1 500 Internal Server Error');
    }
}
