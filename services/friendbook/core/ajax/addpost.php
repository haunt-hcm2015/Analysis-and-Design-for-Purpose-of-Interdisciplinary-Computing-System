<?php 
    include '../init.php';
    $getFromUser->preventAccess($_SERVER['REQUEST_METHOD'], realpath(__FILE__), realpath($_SERVER['SCRIPT_FILENAME']));
    if (isset($_POST) && !empty($_POST)){
        $status = $getFromUser->checkInput($_POST['status']);
        $userID  = $_SESSION['user_id'];
        $postImage = '';
        if (!empty($status) or !empty($_FILES['file']['name'][0])){
			if (strlen($status) > 140){
				$error = "The text of your post is too long";
			}
			else{
				if (!empty($_FILES['file']['name'][0])){
					$postImage = $getFromUser->uploadImage($_FILES['file']);
				}
				$getFromUser->create('friendbook_post', array('status' => $status, 'postBy' => $userID, 'postImage' => $postImage, 'postedOn' => date('Y-m-d H:i:s')));
				preg_match_all("/#+([A-Za-z0-9_]+)/i", $status, $hashtag);
				if (!empty($hashtag)){
					$getFromPost->addTrend($status);
                }
                $result['success'] = 'Your status has been posted';
                echo json_encode($result);
			}
		}else{
			$error = "Type or Choose Image to Post";
        }
        if (isset($error)){
            $result['error'] = $error;
            echo json_encode($result);
        }
    }
?>