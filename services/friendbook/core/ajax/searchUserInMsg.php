<?php 
    include '../init.php';
    $getFromUser->preventAccess($_SERVER['REQUEST_METHOD'], realpath(__FILE__), realpath($_SERVER['SCRIPT_FILENAME']));
    if (isset($_POST['search']) && !empty($_POST['search'])){
        $userID  = $_SESSION['user_id'];
        $search = $getFromUser->checkInput($_POST['search']);
        $result = $getFromUser->search($search);
        echo '<h4>People</h4><div class="message-recent"> ';
        foreach($result as $user){
            if ($user->user_id != $userID){
                echo '<div class="people-message" data-user="'.$user->user_id.'">
                        <div class="people-inner">
                            <div class="people-img">
                                <img src="'.BASE_URL.$user->profile_image.'"/>
                            </div>
                            <div class="name-right">
                                <span><a>'.$user->screen_name.'</a></span><span>@'.$user->username.'</span>
                            </div>
                        </div>
                    </div>';
            }
        }
        echo '</div>';
    }
?>