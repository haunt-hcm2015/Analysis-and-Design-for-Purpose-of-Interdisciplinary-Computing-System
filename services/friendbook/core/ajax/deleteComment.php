<?php 
    include '../init.php';
    $getFromUser->preventAccess($_SERVER['REQUEST_METHOD'], realpath(__FILE__), realpath($_SERVER['SCRIPT_FILENAME']));
    if (isset($_POST['deleteTweet']) && !empty($_POST['deleteComment'])){
        $userID   = $_SESSION['user_id'];
        $commentID   = $_POST['deleteComment'];
        $getFromUser->delete('friendbook_comments', array("commentID" => $commentID, "commentBy" => $userID));
    }
?>