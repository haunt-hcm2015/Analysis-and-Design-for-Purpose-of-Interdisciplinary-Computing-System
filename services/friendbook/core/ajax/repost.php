<?php 
    include '../init.php';
    $getFromUser->preventAccess($_SERVER['REQUEST_METHOD'], realpath(__FILE__), realpath($_SERVER['SCRIPT_FILENAME']));
    if (isset($_POST['repost']) && !empty($_POST['repost'])){
        $userID = $_SESSION['user_id'];
        $postID = $_POST['repost'];
        $getID  = $_POST['userID'];
        $comment = $getFromUser->checkInput($_POST['comment']);
        #Method to repost a post
        $getFromPost->repost($postID, $userID, $getID, $comment);
    }
    if (isset($_POST['showPopup']) && !empty($_POST['showPopup'])){
        $postID = $_POST['showPopup'];
        $getID  = $_POST['userID'];
        $post = $getFromPost->getPopupPost($postID);

?>

<div class="retweet-popup">
    <div class="wrap5">
        <div class="retweet-popup-body-wrap">
            <div class="retweet-popup-heading">
                <h3>Repost this to followers?</h3>
                <span><button class="close-retweet-popup"><i class="fa fa-times" aria-hidden="true"></i></button></span>
            </div>
            <div class="retweet-popup-input">
                <div class="retweet-popup-input-inner">
                    <input type="text" class="retweetMsg" placeholder="Add a comment.."/>
                </div>
            </div>
            <div class="retweet-popup-inner-body">
                <div class="retweet-popup-inner-body-inner">
                    <div class="retweet-popup-comment-wrap">
                        <div class="retweet-popup-comment-head">
                            <img src="<?php echo BASE_URL.$post->profile_image;?>"/>
                        </div>
                        <div class="retweet-popup-comment-right-wrap">
                            <div class="retweet-popup-comment-headline">
                                <a><?php echo $post->screen_name;?></a><span>‏@<?php echo $post->username;?> - <?php echo $post->postedOn;?></span>
                            </div>
                            <div class="retweet-popup-comment-body">
                                <?php echo $getFromPost->getPostLink($post->status);?> - <img src="<?php echo BASE_URL.$post->postImage;?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="retweet-popup-footer"> 
                <div class="retweet-popup-footer-right">
                    <button class="retweet-it" type="submit"><i class="fa fa-retweet" aria-hidden="true"></i>Repost</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

    }

    
?>