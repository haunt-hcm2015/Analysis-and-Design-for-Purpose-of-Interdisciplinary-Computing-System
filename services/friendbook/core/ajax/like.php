<?php 
    include '../init.php';
    $getFromUser->preventAccess($_SERVER['REQUEST_METHOD'], realpath(__FILE__), realpath($_SERVER['SCRIPT_FILENAME']));
    if (isset($_POST['like']) && !empty($_POST['like'])){
        $userID = $_SESSION['user_id'];
        $postID = $_POST['like'];
        $getID  = $_POST['userID'];
        $getFromPost->addLike($userID, $postID, $getID);
    }

    if (isset($_POST['unlike']) && !empty($_POST['unlike'])){
        $userID = $_SESSION['user_id'];
        $postID = $_POST['unlike'];
        $getID  = $_POST['userID'];
        $getFromPost->unlike($userID, $postID, $getID);
    }
?>