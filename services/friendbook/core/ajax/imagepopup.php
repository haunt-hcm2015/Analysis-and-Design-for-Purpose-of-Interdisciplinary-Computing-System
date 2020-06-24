<?php 
    include '../init.php';
    $getFromUser->preventAccess($_SERVER['REQUEST_METHOD'], realpath(__FILE__), realpath($_SERVER['SCRIPT_FILENAME']));
    if (isset($_POST['showImage']) && !empty($_POST['showImage'])){
        $postID = $_POST['showImage'];
        $userID = @$_SESSION['user_id'];
        $post   = $getFromPost->getPopupPost($postID);
        $likes  = $getFromPost->likes($userID, $postID);
        $repost = $getFromPost->checkRepost($postID, $userID);
?>
<div class="img-popup">
    <div class="wrap6">
        <span class="colose">
            <button class="close-imagePopup"><i class="fa fa-times" aria-hidden="true"></i></button>
        </span>
        <div class="img-popup-wrap">
            <div class="img-popup-body">
                <span id="photo"><img id="img" src="<?php echo BASE_URL.$post->postImage;?>" onclick="tagDetection();"/></span>
            </div>
            <div class="img-popup-footer">
                <div class="img-popup-tweet-wrap">
                    <div class="img-popup-tweet-wrap-inner">
                        <div class="img-popup-tweet-left">
                            <img src="<?php echo BASE_URL.$post->profile_image;?>"/>
                        </div>
                        <div class="img-popup-tweet-right">
                            <div class="img-popup-tweet-right-headline">
                                <a href="<?php echo BASE_URL.$post->username;?>"><?php echo $post->screen_name;?></a><span>@<?php echo $post->username.' - '.$post->postedOn;?></span>
                            </div>
                            <div class="img-popup-tweet-right-body">
                                <?php echo $getFromPost->getPostLink($post->status);?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="img-popup-tweet-menu">
                    <div class="img-popup-tweet-menu-inner">
                        <ul> 
                            <?php 
                                if ($getFromUser->loggedIn() === true){
                                    echo '<li><button><a href="#"><i class="fa fa-share" aria-hidden="true"></i></a></button></li>	
                                          <li>'.(($post->postID === $repost['repostID']) ? 
                                                '<button class="retweeted" data-post="'.$post->postID.'" data-user="'.$post->postBy.'"><i class="fa fa-retweet" aria-hidden="true"></i><span class="rePostsCount">'.$post->repostCount.'</span></button>' : 
                                                '<button class="retweet" data-post="'.$post->postID.'" data-user="'.$post->postBy.'"><i class="fa fa-retweet" aria-hidden="true"></i><span class="rePostsCount">'.(($post->repostCount > 0) ? $post->repostCount : '').'</span></button>').'</li>
                                           <li>'.(($likes['likeOn'] === $post->postID) ? 
                                                '<button class="unlike-btn" data-post="'.$post->postID.'" data-user="'.$post->postBy.'"><i class="fa fa-heart-o" aria-hidden="true"></i><span class="likesCount">'.(($post->likeCount > 0) ? $post->likeCount : '').'</span></button>' : 
                                                '<button class="like-btn" data-post="'.$post->postID.'" data-user="'.$post->postBy.'"><i class="fa fa-heart-o" aria-hidden="true"></i><span class="likesCount"></span></button>').'
                                           </li>
                                           '.(($post->postBy  === $userID) ? '
                                            <li>
                                                <label for="img-popup-menu"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></label>
                                                <input id="img-popup-menu" type="checkbox"/>
                                                <div class="img-popup-footer-menu">
                                                    <ul>
                                                        <li><label class="deleteTweet" data-post="'.$post->postID.'">Delete Post</label></li>
                                                    </ul>
                                                </div>
                                            </li>':'');
                                }else{
                                    echo '<li><button><i class="fa fa-share" aria-hidden="true"></i></button></li>	
                                          <li><button class="retweet"><i class="fa fa-retweet" aria-hidden="true"></i><span class="retweetsCount"></span></button></li>
                                          <li><button class="like-btn"><i class="fa fa-heart-o" aria-hidden="true"></i><span class="likesCounter"></span></button></li>';
                                } 
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    }
?>