<?php 
     include '../init.php';
     $getFromUser->preventAccess($_SERVER['REQUEST_METHOD'], realpath(__FILE__), realpath($_SERVER['SCRIPT_FILENAME']));
     if (isset($_POST['deletePost']) && !empty($_POST['deletePost'])){
        $postID   = $_POST['deletePost'];
        $userID   = $_SESSION['user_id'];
        $getFromUser->delete('friendbook_post', array('postID' => $postID, 'postBy' => $userID));
     }
     if (isset($_POST['showPopup']) && !empty($_POST['showPopup'])){
         $userID   = $_SESSION['user_id'];
         $postID   = $_POST['showPopup'];
         $post = $getFromPost->getPopupPost($postID);
?>
    <div class="retweet-popup">
    <div class="wrap5">
        <div class="retweet-popup-body-wrap">
        <div class="retweet-popup-heading">
            <h3>Are you sure you want to delete this Post?</h3>
            <span><button class="close-retweet-popup"><i class="fa fa-times" aria-hidden="true"></i></button></span>
        </div>
        <div class="retweet-popup-inner-body">
            <div class="retweet-popup-inner-body-inner">
            <div class="retweet-popup-comment-wrap">
                <div class="retweet-popup-comment-head">
                <img src="<?php echo BASE_URL.$post->profile_image;?>"/>
                </div>
                <div class="retweet-popup-comment-right-wrap">
                <div class="retweet-popup-comment-headline">
                    <a><?php echo $post->screen_name;?> </a><span>‏@<?php echo $post->username.' - '.$post->postedOn;?></span>
                </div>
                <div class="retweet-popup-comment-body">
                    <?php echo $post->status;?> <img src="<?php echo $post->postImage;?>">   
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="retweet-popup-footer"> 
            <div class="retweet-popup-footer-right">
            <button class="cancel-it f-btn">Cancel</button><button class="delete-it" type="submit">Delete</button>
            </div>
        </div>
        </div>
    </div>
    </div>

<?php
    }
?>