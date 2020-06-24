<?php 
    include '../init.php';
    if (isset($_POST['text']) && !empty($_POST['text'])){
        $getFromMessage->getQuestion($_POST['text']);
    }
    
?>