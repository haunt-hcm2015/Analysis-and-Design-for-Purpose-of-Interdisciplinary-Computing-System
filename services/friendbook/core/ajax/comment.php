<?php 
    include '../init.php';
    $getFromUser->preventAccess($_SERVER['REQUEST_METHOD'], realpath(__FILE__), realpath($_SERVER['SCRIPT_FILENAME']));
    if (isset($_POST['comment']) && !empty($_POST['comment'])){
        $userID  = $_SESSION['user_id'];
        $comment = $getFromUser->checkInput($_POST['comment']);
        $postID  = $_POST['postID'];
        if (!empty($comment)){
            $getFromUser->create('friendbook_comments', array('comment' => $comment, 'commentOn' => $postID, 'commentBy' => $userID, 'commentAt' => date('Y:m:d H:i:s')));
            $comments = $getFromPost->comments($postID);
            $post     = $getFromPost->getPopupPost($postID);

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
        }
    }
?>