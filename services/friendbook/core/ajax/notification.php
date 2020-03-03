<?php 
    include '../init.php';
    $getFromUser->preventAccess($_SERVER['REQUEST_METHOD'], realpath(__FILE__), realpath($_SERVER['SCRIPT_FILENAME']));
    if (isset($_GET['showNotification']) && !empty($_GET['showNotification'])){
        $userID = $_SESSION['user_id'];
        $data   = $getFromMessage->getNotificationCount($userID);
        echo json_encode(array('notification' => $data->totalNotification, 'messages' => $data->totalMessage));
    }else{
        header("Location: ".BASE_URL."index.php");
    }
?>