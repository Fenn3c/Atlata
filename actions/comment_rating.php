<?php
require_once('../utils/sessionManager.php');
require_once('../utils/database.php');
loginIsRequried();

if (isset($_POST['rating']) && isset($_POST['video']) && isset($_POST['comment'])) {
    $id_video = $_POST['video'];
    $id_comment = $_POST['comment'];
    $id_user = $_SESSION['id_user'];
    $db = new DB();
    $rating = $db->getCommentRating($id_user, $id_comment);
    if($rating){
        if($rating['rating'] == 0){
            $db->updateCommentRating($rating['id_comment_rating'], $id_user, $id_comment, 1);
        } else{
            $db->updateCommentRating($rating['id_comment_rating'], $id_user, $id_comment, 0);
        }
    } else {
        $db->setCommentRating($id_user, $id_comment, 1);
    }
    header('Location: ../video.php?video=' . $id_video);
} else {

    header('Location: ../index.php');
}

