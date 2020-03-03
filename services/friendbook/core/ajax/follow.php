<?php 
    include '../init.php';
    $getFromUser->preventAccess($_SERVER['REQUEST_METHOD'], realpath(__FILE__), realpath($_SERVER['SCRIPT_FILENAME']));
    if (isset($_POST['unfollow']) && !empty($_POST['unfollow'])){
        $followID = $_POST['unfollow'];
        $userID  = $_SESSION['user_id'];
        $profileID  = $_POST['profile'];
        $getFromFollow->unfollow($followID, $userID, $profileID);
    }
    if (isset($_POST['follow']) && !empty($_POST['follow'])){
        $followID = $_POST['follow'];
        $userID  = $_SESSION['user_id'];
        $profileID  = $_POST['profile'];
        $getFromFollow->follow($followID, $userID, $profileID);
    }
?>