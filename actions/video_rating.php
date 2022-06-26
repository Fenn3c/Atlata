<?php
require_once('../utils/sessionManager.php');
require_once('../utils/database.php');
loginIsRequried();

if (isset($_POST['rating']) && isset($_POST['video'])) {
    $id_video = $_POST['video'];
    $id_user = $_SESSION['id_user'];
    $db = new DB();
    $rating = $db->getRating($id_user, $id_video);
    if($rating){
        if($rating['rating'] == 0){
            $db->updateRating($rating['id_video_rating'], $id_user, $id_video, 1);
        } else{

            $db->updateRating($rating['id_video_rating'], $id_user, $id_video, 0);
        }
    } else {
        $db->setRating($id_user, $id_video, 1);
    }
    header('Location: ../video.php?video=' . $id_video);
} else {

    header('Location: ../index.php');
}
