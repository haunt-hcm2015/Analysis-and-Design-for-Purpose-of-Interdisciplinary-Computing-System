<?php 
    include 'core/init.php';
	$userID       = $_SESSION['user_id'];
    $user         = $getFromUser->userData($userID);
    $posts = $getFromPost->getUserPosts($profileId);
    $notify       = $getFromMessage->getNotificationCount($userID);
    $notification = $getFromMessage->notification($userID);
    $getFromMessage->notificationViewed($userID);
	if ($getFromUser->loggedIn() === false)
		header("Location: index.php");
	if (isset($_POST['tweet'])){
		$status = $getFromUser->checkInput($_POST['status']);
		$postImage = '';
		if (!empty($status) or !empty($_FILES['file']['name'][0])){
			if (strlen($status) > 140){
				$error = "The text of your post is too long";
			}
			else{
				if (!empty($_FILES['file']['name'][0])){
					$postImage = $getFromUser->uploadImage($_FILES['file']);
				}
				$getFromUser->create('post', array('status' => $status, 'postBy' => $user->user_id, 'postImage' => $postImage, 'postedOn' => date('Y-m-d H:i:s')));
				preg_match_all("/#+([A-Za-z0-9_]+)/i", $status, $hashtag);
				if (!empty($hashtag)){
					$getFromPost->addTrend($status);
				}
			}
		}else{
			$error = "Type or Choose Image to Post";
		}
	}
?>
    <!DOCTYPE HTML>
    <html>
    <head>
        <title>Friendbook</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>assets/css/style-complete.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>assets/css/font/css/font-awesome.css" />
        <script src="<?php echo BASE_URL;?>assets/js/jquery.min.js"></script>
    </head>

    <body>
        <div class="wrapper">
            <div class="header-wrapper">
                <div class="nav-container">
                    <div class="nav">
                        <div class="nav-left">
                            <ul>
                                <li><a href="<?php echo BASE_URL;?>home.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                                <li><a href="<?php echo BASE_URL;?>i/notifications"><i class="fa fa-bell" aria-hidden="true"></i>Notification
							<span id="notification">
								<?php 
									if ($notify->totalNotification > 0){
										echo '<span class="span-i">'.$notify->totalNotification.'</span>';
									}
								?>
							</span></a>
                                </li>
                                <li id="messagePopup"><i class="fa fa-envelope" aria-hidden="true"></i>Messages
                                    <span id="messages">
								<?php 
									if ($notify->totalMessage > 0){
										echo '<span class="span-i">'.$notify->totalMessage.'</span>'; } ?>
                                    </span>
                                </li>
                                <li><a href="<?php echo BASE_URL;?>news.php"><i class="fa fa-info" aria-hidden="true"></i>News</a></li>
                                <li><a href="<?php echo BASE_URL;?>blog.php"><i class="fa fa-newspaper-o" aria-hidden="true"></i>Blog</a></li>
                                <li><a href="<?php echo BASE_URL;?>page.php"><i class="fa fa-globe" aria-hidden="true"></i>Page</a></li>
                                <li><a id="group"><i class="fa fa-users" aria-hidden="true"></i>Group</a></li>   
                            </ul>
                        </div>
                        <div id="groupService" class="services">
                            <div class="service-content">
                                <div class="service-header">
                                    <span class="close">&times;</span>
                                    <h2>Create new group</h2>
                                    <div class="description">
                                        <img src="<?php echo BASE_URL;?>assets/images/group.jpg" width="200" height="100"/>
                                        <p>Groups are great for getting things done and staying in touch with just the people you want. Share photos and videos, have conversations, make plans and more.</p>
                                    </div>
                                </div>
                                <form action="#" class="form">
                                    <div class="service-body">
                                        <div>
                                            <label for="gname">Name your group</label>
                                            <input type="text" name="gname" placeholder="Name your group ...">
                                        </div>
                                        <div>
                                            <label for="addsomeone">Add some people</label>
                                            <input type="text" name="addsomeone" placeholder="Enter names or email addresses ..">
                                        </div>
                                        <div>
                                            <label for="groupType">Group Type</label>
                                            <select id="groupType" name="groupType">
                                                <option value="business">Business or brand</option>
                                                <option value="community">Community or public figure</option>
                                                <option value="personal">Personal</option>
                                                <option value="affiliate">Affiliate</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="service-footer">
                                        <h3><input type="submit" value="Create new group"></h3>
                                    </div>
                                </form>
                            </div>
                        </div>                
                        <div class="nav-right">
                            <ul>
                                <li>
                                    <input type="text" placeholder="Search" class="search" />
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    <div class="search-result"></div>
                                </li>
                                <li class="hover">
                                    <label class="drop-label" for="drop-wrap1"><img src="<?php echo BASE_URL.$user->profile_image;?>" /></label>
                                    <input type="checkbox" id="drop-wrap1">
                                    <div class="drop-wrap">
                                        <div class="drop-inner">
                                            <ul>
                                                <li><a href="<?php echo $user->username; ?>"><?php echo $user->username;?></a></li>
                                                <li><a href="<?php echo BASE_URL;?>settings/account">Account</a></li>
                                                <li><a href="<?php echo BASE_URL;?>includes/logout.php">Log out</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <label class="addTweetBtn">Post</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="inner-wrapper">
                <div class="in-wrapper">
                    <div class="in-full-wrap">
                        <div class="in-left">
                            <div class="in-left-wrap">
                                <div class="info-box">
                                    <div class="info-inner">
                                        <div class="info-in-head">
                                            <img src="<?php echo BASE_URL.$user->profile_cover;?>" />
                                        </div>
                                        <div class="info-in-body">
                                            <div class="in-b-box">
                                                <div class="in-b-img">
                                                    <img src="<?php echo BASE_URL.$user->profile_image;?>" />
                                                </div>
                                            </div>
                                            <div class="info-body-name">
                                                <div class="in-b-name">
                                                    <div><a href="<?php echo BASE_URL.$user->username;?>"><?php echo $user->screen_name;?></a></div>
                                                    <span><small><a href="<?php echo BASE_URL.$user->username;?>"><?php echo '@'.$user->username;?></a></small></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="info-in-footer">
                                            <div class="number-wrapper">
                                                <div class="num-box">
                                                    <div class="num-head">
                                                        POST
                                                    </div>
                                                    <div class="num-body">
                                                        <?php $getFromPost->countPost($userID);?>
                                                    </div>
                                                </div>
                                                <div class="num-box">
                                                    <div class="num-head">
                                                        FOLLOWING
                                                    </div>
                                                    <div class="num-body">
                                                        <span class="count-following"><?php echo $user->following;?></span>
                                                    </div>
                                                </div>
                                                <div class="num-box">
                                                    <div class="num-head">
                                                        FOLLOWERS
                                                    </div>
                                                    <div class="num-body">
                                                        <span class="count-followers"><?php echo $user->follower;?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $getFromPost->trends();?>
                            </div>
                        </div>
                        <div class="in-center">
                            <div class="in-center-wrap">
                                <div class="notification-full-wrapper">
                                    <div class="notification-full-head">
                                        <div>
                                            <a href="#">All</a>
                                        </div>
                                        <div>
                                            <a href="#">Mention</a>
                                        </div>
                                        <div>
                                            <a href="#">settings</a>
                                        </div>
                                    </div>
                                    <?php foreach($notification as $data):?>
                                        <?php if ($data->type == 'follow'):?>
                                            <div class="notification-wrapper">
                                                <div class="notification-inner">
                                                    <div class="notification-header">
                                                        <div class="notification-img">
                                                            <span class="follow-logo">
                                                                <i class="fa fa-child" aria-hidden="true"></i>
                                                            </span>
                                                        </div>
                                                        <div class="notification-name">
                                                            <div>
                                                                <img src="<?php echo BASE_URL.$data->profile_image;?>" />
                                                            </div>
                                                        </div>
                                                        <div class="notification-tweet">
                                                            <a href="<?php echo BASE_URL.$data->username;?>" class="notifi-name">
                                                                <?php echo $data->screen_name;?>
                                                            </a>
                                                            <span> Followed you - <?php echo $getFromUser->timeAgo($data->notificationAt);?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif;?>
                                        <?php if ($data->type == 'like'):?>
                                            <div class="notification-wrapper">
                                                <div class="notification-inner">
                                                    <div class="notification-header">
                                                        <div class="notification-img">
                                                            <span class="heart-logo">
                                                                <i class="fa fa-heart" aria-hidden="true"></i>
                                                            </span>
                                                        </div>
                                                        <div class="notification-name">
                                                            <div>
                                                                <img src="<?php echo BASE_URL.$data->profile_image;?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="notification-tweet">
                                                        <a href="<?php echo BASE_URL.$data->username;?>" class="notifi-name">
                                                            <?php echo $data->screen_name;?>
                                                        </a>
                                                        <span> liked your <?php if ($data->postBy == $userID) {echo 'Post';} else{ echo 'Repost';}?> - 
                                                            <?php echo $getFromUser->timeAgo($data->notificationAt);?>
                                                        </span>
                                                    </div>
                                                    <div class="notification-footer">
                                                        <div class="noti-footer-inner">
                                                            <div class="noti-footer-inner-left">
                                                                <div class="t-h-c-name">
                                                                    <span><a href="<?php echo BASE_URL.$user->username;?>"><?php echo $user->screen_name;?></a></span>
                                                                    <span>@<?php echo $data->username;?></span>
                                                                    <span><?php echo $getFromUser->timeAgo($data->postedOn);?></span>
                                                                </div>
                                                                <div class="noti-footer-inner-right-text">
                                                                    <?php echo $getFromPost->getPostLink($data->status);?>
                                                                </div>
                                                            </div>
                                                            <?php if (!empty($data->postImage)):?>
                                                                <div class="noti-footer-inner-right">
                                                                    <img src="<?php echo BASE_URL.$data->postImage;?>"/>
                                                                </div>
                                                            <?php endif;?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif;?>
                                        <?php if ($data->type == 'repost'):?>
                                            <div class="notification-wrapper">
                                                <div class="notification-inner">
                                                    <div class="notification-header">
                                                        <div class="notification-img">
                                                            <span class="retweet-logo">
                                                                <i class="fa fa-retweet" aria-hidden="true"></i>
                                                            </span>
                                                        </div>
                                                        <div class="notification-tweet">
                                                            <a href="<?php echo BASE_URL.$data->username;?>" class="notifi-name"><?php echo $data->screen_name;?></a>
                                                            <span> repost your 
                                                                <?php if ($data->postBy == $userID or $data->postBy != $userID) {echo 'Post';} ?> - 
                                                                <?php echo $getFromUser->timeAgo($data->notificationAt);?>
                                                            </span>
                                                        </div>
                                                        <div class="notification-footer">
                                                            <div class="noti-footer-inner">
                                                                <div class="noti-footer-inner-left">
                                                                    <div class="t-h-c-name">
                                                                        <span><a href="<?php echo BASE_URL.$user->username;?>"><?php echo $user->screen_name;?></a></span>
                                                                        <span>@<?php echo $data->username;?></span>
                                                                        <span><?php echo $getFromUser->timeAgo($data->postedOn);?></span>
                                                                    </div>
                                                                    <div class="noti-footer-inner-right-text">
                                                                        <?php echo $getFromPost->getPostLink($data->status);?>
                                                                    </div>
                                                                </div>
                                                                <?php if (!empty($data->postImage)):?>
                                                                    <div class="noti-footer-inner-right">
                                                                    <?php 
                                                                        if ($getFromPost->isImage(BASE_URL.$data->postImage) )
                                                                            echo '<img src="'.BASE_URL.$data->postImage.'" class="imagePopup" data-post="'.$data->postID.'"/>' ;
                                                                        else
                                                                            echo '<img class="imagePopup"  width="50" src="'.BASE_URL."users/media1.png".'"> <a href="'.BASE_URL.$data->postImage.'">'.substr($data->postImage, 6).'</a>';
                                                                    ?>
                                                                    </div>
                                                                <?php endif;?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif;?>
                                        <?php if ($data->type == 'mention'):?>
                                            <?php 
                                                $like 	= $getFromPost->likes($userID, $post->postID);
                                                $repost = $getFromPost->checkRepost($post->postID, $userID);
                                                $post   = $data;
                                                echo   '<div class="all-tweet-inner">
                                                            <div class="t-show-wrap">
                                                                <div class="t-show-inner">
                                                                    <div class="t-show-popup" data-post="'.$post->postID.'">
                                                                        <div class="t-show-head">
                                                                            <div class="t-show-img">
                                                                                <img src="'.BASE_URL.$post->profile_image.'" />
                                                                            </div>
                                                                            <div class="t-s-head-content">
                                                                                <div class="t-h-c-name">
                                                                                    <span><a href="'.BASE_URL.$post->username.'">'.$post->screen_name.'</a></span>
                                                                                    <span>@'.$post->username.'</span>
                                                                                    <span>'.$getFromUser->timeAgo($post->postedOn).'</span>
                                                                                </div>
                                                                                <div class="t-h-c-dis">
                                                                                    '.$getFromPost->getPostLink($post->status).'
                                                                                </div>
                                                                            </div>
                                                                        </div>'.((!empty($post->postImage)) ? '
                                                                        <div class="t-show-body">
                                                                            <div class="t-s-b-inner">
                                                                                <div class="t-s-b-inner-in">
                                                                                    <img src="'.BASE_URL.$post->postImage.'" class="imagePopup" data-post="'.$post->postID.'" />
                                                                                </div>
                                                                            </div>
                                                                        </div>' : '').'
                                                                    </div>
                                                                    <div class="t-show-footer">
                                                                        <div class="t-s-f-right">
                                                                            <ul>
                                                                                '.(($getFromUser->loggedIn() === true) ? '
                                                                                <li>
                                                                                    <button><a href="#"><i class="fa fa-share" aria-hidden="true"></i></a></button>
                                                                                </li>
                                                                                <li>'.(($post->postID === $repost['repostID']) ? '
                                                                                    <button class="retweeted" data-post="'.$post->postID.'" data-user="'.$post->postBy.'"><i class="fa fa-retweet" aria-hidden="true"></i><span class="rePostsCount">'.$post->repostCount.'</span></button>' : '
                                                                                    <button class="retweet" data-post="'.$post->postID.'" data-user="'.$post->postBy.'"><i class="fa fa-retweet" aria-hidden="true"></i><span class="rePostsCount">'.(($post->repostCount > 0) ? $post->repostCount : '').'</span></button>').'</li>
                                                                                <li>'.(($like['likeOn'] === $post->postID) ? '
                                                                                    <button class="unlike-btn" data-post="'.$post->postID.'" data-user="'.$post->postBy.'"><i class="fa fa-heart-o" aria-hidden="true"></i><span class="likesCount">'.(($post->likeCount > 0) ? $post->likeCount : '').'</span></button>' : '
                                                                                    <button class="like-btn" data-post="'.$post->postID.'" data-user="'.$post->postBy.'"><i class="fa fa-heart-o" aria-hidden="true"></i><span class="likesCount"></span></button>').'
                                                                                </li>
                                                                                '.(($post->postBy === $userID ? '
                                                                                <li><a href="#" class="more"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                                                                                    <ul>
                                                                                        <li>
                                                                                            <label class="deleteTweet" data-post="'.$post->postID.'">Delete Post</label>
                                                                                        </li>
                                                                                    </ul>
                                                                                </li>' : '')).' ' : '
                                                                                <li>
                                                                                    <button><a href="#"><i class="fa fa-share" aria-hidden="true"></i></a></button>
                                                                                </li>
                                                                                <li>
                                                                                    <button><a href="#"><i class="fa fa-retweet" aria-hidden="true"></i></a></button>
                                                                                </li>
                                                                                <li>
                                                                                    <button><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></button>
                                                                                </li>
                                                                                ').'
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>';
                                            ?>
                                        <?php endif;?>
                                        <?php if ($data->type == 'add_friend'):?>

                                        <?php endif;?>
                                    <?php endforeach;?>
                                </div>
                                
                                <div class="loading-div">
                                    <img id="loader" src="<?php echo BASE_URL;?>assets/images/loading.svg" style="display: none;" />
                                </div>
                                <div class="popupTweet"></div>
                            </div>
                        </div>
                        <div class="in-right">
                            <div class="in-right-wrap">
                                <?php $getFromFollow->whoToFollow($userID, $userID)?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <?php if ($getFromUser->loggedIn() === true){  ?>
        <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/search.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/hashtag.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/services.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/like.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/repost.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/menu.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/popuppost.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/comment.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/delete.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/popupform.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/fetch.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/follow.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/message.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/postmessage.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/notification.js"></script>
        <?php } ?>

    </html>