<?php 
    # Displaying new posts on scroll
    include '../init.php';
    $getFromUser->preventAccess($_SERVER['REQUEST_METHOD'], realpath(__FILE__), realpath($_SERVER['SCRIPT_FILENAME']));
    if (isset($_POST['fetchPost']) && !empty($_POST['fetchPost'])){
       $userID = $_SESSION['user_id'];
       $limits = (int) trim($_POST['fetchPost']); 
       $getFromPost->post($userID, $limits);
    }
?>