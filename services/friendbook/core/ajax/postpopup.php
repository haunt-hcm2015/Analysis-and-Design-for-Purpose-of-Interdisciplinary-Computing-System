<?php 
    include '../init.php';
    $getFromUser->preventAccess($_SERVER['REQUEST_METHOD'], realpath(__FILE__), realpath($_SERVER['SCRIPT_FILENAME']));
    if (isset($_POST['showPopup']) && !empty($_POST['showPopup'])){
        $userID   = @$_SESSION['user_id'];
        $postID   = $_POST['showPopup'];
        $post     = $getFromPost->getPopupPost($postID);
        $user     = $getFromUser->userData($userID);
        $like     = $getFromPost->likes($userID, $postID);
        $comments = $getFromPost->comments($postID);
        $repost   = $getFromPost->checkRepost($postID, $userID);
?>
        <div class="tweet-show-popup-wrap">
            <input type="checkbox" id="tweet-show-popup-wrap">
            <div class="wrap4">
                <label for="tweet-show-popup-wrap">
                    <div class="tweet-show-popup-box-cut">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </div>
                </label>
                <div class="tweet-show-popup-box">
                <div class="tweet-show-popup-inner">
                    <div class="tweet-show-popup-head">
                        <div class="tweet-show-popup-head-left">
                            <div class="tweet-show-popup-img">
                                <img src="<?php echo BASE_URL.$post->profile_image;?>"/>
                            </div>
                            <div class="tweet-show-popup-name">
                                <div class="t-s-p-n">
                                    <a href="<?php echo BASE_URL.$post->username;?>">
                                        <?php echo $post->screen_name;?>
                                    </a>
                                </div>
                                <div class="t-s-p-n-b">
                                    <a href="<?php echo BASE_URL.$post->username;?>">
                                        @<?php echo $post->username;?>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="tweet-show-popup-head-right">
                            <button class="f-btn"><i class="fa fa-user-plus"></i> Follow </button>
                        </div>
                    </div>
                    <div class="tweet-show-popup-tweet-wrap">
                        <div class="tweet-show-popup-tweet">
                            <?php echo $getFromPost->getPostLink($post->status);?>
                        </div>
                        <div class="tweet-show-popup-tweet-ifram">
                            <?php if (!empty($post->postImage)){?>
                                
                                <?php 
                                    if ($getFromPost->isImage(BASE_URL.$post->postImage) === true) 
                                        echo '<span class="photo"><img class="img" src="'.BASE_URL.$post->postImage.'"/></span>';
                                    else
                                        echo '<img class="imagePopup" src="'.BASE_URL."users/media1.png".'"> <a href="'.BASE_URL.$post->postImage.'">'.substr($post->postImage, 6).'</a>';
                                ?> 
                            <?php }?>
                        </div>
                    </div>
                    <div class="tweet-show-popup-footer-wrap">
                        <div class="tweet-show-popup-retweet-like">
                            <div class="tweet-show-popup-retweet-left">
                                <div class="tweet-retweet-count-wrap">
                                    <div class="tweet-retweet-count-head">
                                        RETWEET
                                    </div>
                                    <div class="tweet-retweet-count-body">
                                        <?php echo $post->repostCount;?>
                                    </div>
                                </div>
                                <div class="tweet-like-count-wrap">
                                    <div class="tweet-like-count-head">
                                        LIKES
                                    </div>
                                    <div class="tweet-like-count-body">
                                        <?php echo $post->likeCount;?>
                                    </div>
                                </div>
                            </div>
                            <div class="tweet-show-popup-retweet-right">
                            
                            </div>
                        </div>
                        <div class="tweet-show-popup-time">
                            <span><?php echo $getFromUser->timeAgo($post->postedOn);?></span>
                        </div>
                        <div class="tweet-show-popup-footer-menu">
                            <ul>
                                <?php 
                                    if ($getFromUser->loggedIn() === true){
                                        echo '<li><button><a href="#"><i class="fa fa-share" aria-hidden="true"></i></a></button></li>	
                                              <li>'.(($post->postID === $repost['repostID']) ? 
                                                    '<button class="retweeted" data-post="'.$post->postID.'" data-user="'.$post->postBy.'"><i class="fa fa-retweet" aria-hidden="true"></i><span class="rePostsCount">'.$post->repostCount.'</span></button>' : 
                                                    '<button class="retweet" data-post="'.$post->postID.'" data-user="'.$post->postBy.'"><i class="fa fa-retweet" aria-hidden="true"></i><span class="rePostsCount">'.(($post->repostCount > 0) ? $post->repostCount : '').'</span></button>').'</li>
                                               <li>'.(($like['likeOn'] === $post->postID) ? 
                                                    '<button class="unlike-btn" data-post="'.$post->postID.'" data-user="'.$post->postBy.'"><i class="fa fa-heart-o" aria-hidden="true"></i><span class="likesCount">'.(($post->likeCount > 0) ? $post->likeCount : '').'</span></button>' : 
                                                    '<button class="like-btn" data-post="'.$post->postID.'" data-user="'.$post->postBy.'"><i class="fa fa-heart-o" aria-hidden="true"></i><span class="likesCount"></span></button>').'
                                              </li>
                                              '.(($post->postBy === $userID) ? '
                                                <li><a href="#" class="more"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                                                        <ul> 
                                                            <li><label class="deleteTweet" data-post="'.$post->postID.'">Delete Post</label></li>
                                                        </ul>
                                                </li>' : '');
                                    }else{
                                        echo '<li><button type="buttton"><i class="fa fa-share" aria-hidden="true"></i></button></li>
                                              <li><button type="button"><i class="fa fa-retweet" aria-hidden="true"></i><span class="retweetsCount"><?php echo $post->repostCount;?></span></button></li>
                                              <li><button type="button"><i class="fa fa-heart" aria-hidden="true"></i><span class="likesCount"><?php echo $post->likeCount;?></span></button></button></li>';
                                    }
                                ?>
                                
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <?php if ($getFromUser->loggedIn() === true){ ?>
                    <div class="tweet-show-popup-footer-input-wrap">
                        <div class="tweet-show-popup-footer-input-inner">
                            <div class="tweet-show-popup-footer-input-left">
                                <img src="<?php echo BASE_URL.$post->profile_image;?>"/>
                            </div>
                            <div class="tweet-show-popup-footer-input-right">
                                <input id="commentField" type="text" data-post="<?php echo $post->postID;?>" name="comment"  placeholder="Reply to @<?php echo $post->username;?>">
                            </div>
                        </div>
                        <div class="tweet-footer">
                            <div class="t-fo-left">
                                <ul>
                                    <li>
                                        <!-- <label for="t-show-file"><i class="fa fa-camera" aria-hidden="true"></i></label>
                                        <input type="file" id="t-show-file"> -->
                                    </li>
                                    <li class="error-li">
                                    </li> 
                                </ul>
                            </div>
                            <div class="t-fo-right">
                                <input type="submit" id="postComment">
                                <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/follow.js"></script>
                            </div>
                        </div>
                    </div>
                <?php }?>
            <div class="tweet-show-popup-comment-wrap">
                <div id="comments">
                    <?php 
                        foreach($comments as $comment){
                            echo '<div class="tweet-show-popup-comment-box">
                                    <div class="tweet-show-popup-comment-inner">
                                        <div class="tweet-show-popup-comment-head">
                                            <div class="tweet-show-popup-comment-head-left">
                                                <div class="tweet-show-popup-comment-img">
                                                    <img src="'.BASE_URL.$comment->profile_image.'">
                                                </div>
                                            </div>
                                            <div class="tweet-show-popup-comment-head-right">
                                                <div class="tweet-show-popup-comment-name-box">
                                                    <div class="tweet-show-popup-comment-name-box-name"> 
                                                        <a href="'.BASE_URL.$comment->username.'">'.$comment->screen_name.'</a>
                                                    </div>
                                                    <div class="tweet-show-popup-comment-name-box-tname">
                                                        <a href="'.BASE_URL.$comment->username.'">@'.$comment->username.' - '.$comment->commentAt.'</a>
                                                    </div>
                                                </div>
                                                <div class="tweet-show-popup-comment-right-tweet">
                                                        <p><a href="'.BASE_URL.$post->username.'">@'.$post->username.'</a> '.$comment->comment.'</p>
                                                </div>
                                                <div class="tweet-show-popup-footer-menu">
                                                    <ul>
                                                        <li><button><i class="fa fa-share" aria-hidden="true"></i></button></li>
                                                        <li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                                            '.(($comment->commentBy === $userID) ? '
                                                                <li><a href="#" class="more"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                                                                    <ul> 
                                                                        <li><label class="deleteComment" data-post="'.$post->postID.'" data-comment="'.$comment->commentID.'">Delete Comment</label></li>
                                                                    </ul>
                                                                </li>' : '').'
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 </div>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

        <?php
    }
?>