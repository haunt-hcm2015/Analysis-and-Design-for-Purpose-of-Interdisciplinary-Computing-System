<?php 
    #http://localhost:81/friends/profile.php?username=[username]
    if (isset($_GET['username']) === true && empty($_GET['username']) === false){
        include 'core/init.php';
        $userID      = @$_SESSION['user_id'];
        $user        = $getFromUser->userData($userID);
        $username    = $getFromUser->checkInput($_GET['username']);
        $profileId   = $getFromUser->userIDByUsername($username);
        $profileData = $getFromUser->userData($profileId);
        $notify      = $getFromMessage->getNotificationCount($userID);
        if (!$profileId)
            header('Location: '.BASE_URL.'index.php');
    }
?>
<!doctype html>
<html>
	<head>
		<title><?php echo $profileData->screen_name.' (@'.$profileData->username.')';?></title>
		<meta charset="UTF-8" />
        <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/style-complete.css"/>
   		<link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/font/css/font-awesome.css"/>  
        <script src="<?php echo BASE_URL;?>assets/js/jquery.min.js"></script>  
        <style type="text/css">
			    .photo:hover .rect {
					opacity: .75;
					transition: opacity .75s ease-out;
				}
				.rect:hover * {
					opacity: 1;
				}
				.rect {
					border-radius: 2px;
					border: 3px solid #a64ceb;
					box-shadow: 0 16px 28px 0 rgba(0, 0, 0, 0.3);
					cursor: pointer;
					left: -1000px;
					opacity: 0;
					position: absolute;
					top: -1000px;
				}
				.arrow {
					border-bottom: 10px solid white;
					border-left: 10px solid transparent;
					border-right: 10px solid transparent;
					height: 0;
					width: 0;
					position: absolute;
					left: 50%;
					margin-left: -5px;
					bottom: -12px;
					opacity: 0;
				}
        </style> 	 
    </head>
    <body>
        <div class="wrapper">
            <div class="header-wrapper">	
                <div class="nav-container">
                    <div class="nav">
                        <div class="nav-left">
                            <ul>
                                <li><a href="<?php echo BASE_URL;?>home.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                                <?php  
                                    if ($getFromUser->loggedIn() === true){ ?>
                                        <li><a href="<?php echo BASE_URL;?>i/notifications"><i class="fa fa-bell" aria-hidden="true"></i>Notification</a></li>
                                        <li id="messagePopup"><i class="fa fa-envelope" aria-hidden="true"></i>Messages</li>
                                        <li><a href="<?php echo BASE_URL;?>news.php"><i class="fa fa-info" aria-hidden="true"></i>News</a></li>
                                        <li><a href="<?php echo BASE_URL;?>blog.php"><i class="fa fa-newspaper-o" aria-hidden="true"></i>Blog</a></li>
                                        <li><a href="<?php echo BASE_URL;?>page.php"><i class="fa fa-globe" aria-hidden="true"></i>Page</a></li>
                                        <li><a id="group"><i class="fa fa-users" aria-hidden="true"></i>Group</a></li>
                                        
                                <?php }?>
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
                            <li><input type="text" placeholder="Search" class="search"/><i class="fa fa-search" aria-hidden="true"></i>
                                <div class="search-result"> 			
                                </div>
                            </li>
                            <?php  if ($getFromUser->loggedIn() === true){ ?>            
                                <li class="hover"><label class="drop-label" for="drop-wrap1"><img src="<?php echo BASE_URL.$user->profile_image;?>"/></label>
                                <input type="checkbox" id="drop-wrap1">
                                <div class="drop-wrap">
                                    <div class="drop-inner">
                                        <ul>
                                            <li><a href="<?php echo BASE_URL.$user->username;?>"><?php echo $user->username;?></a></li>
                                            <li><a href="<?php echo BASE_URL;?>settings/account">Settings</a></li>
                                            <li><a href="<?php echo BASE_URL;?>includes/logout.php">Log out</a></li>
                                        </ul>
                                    </div>
                                </div>
                                </li>
                                <li><label for="pop-up-tweet" class="addTweetBtn">Post</label></li>
                            <?php }else {
                                echo '<li><a href="'.BASE_URL.'index.php">Have an account? Login!</a></li>';
                            }?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="profile-cover-wrap"> 
            <div class="profile-cover-inner">
                <div class="profile-cover-img">
                    <img src="<?php echo BASE_URL.$profileData->profile_cover;?>"/>
                </div>
            </div>
            <div class="profile-nav">
                <div class="profile-navigation">
                    <ul>
                        <li>
                        <div class="n-head">
                            POST
                        </div>
                        <div class="n-bottom">
                            <?php $getFromPost->countPost($profileId);?>
                        </div>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL.$profileData->username;?>/following">
                                <div class="n-head">
                                    <a href="<?php echo BASE_URL.$profileData->username;?>/following">FOLLOWING</a>
                                </div>
                                <div class="n-bottom">
                                    <span class="count-following"><?php echo $profileData->following;?></span>
                                </div>
                            </a>
                        </li>
                        <li> 
                        <a href="<?php echo BASE_URL.$profileData->username;?>/followers">
                                <div class="n-head">
                                    FOLLOWERS
                                </div>
                                <div class="n-bottom">
                                    <span class="count-followers"><?php echo $profileData->follower;?></span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="n-head">
                                    LIKES
                                </div>
                                <div class="n-bottom">
                                    <?php $getFromPost->countLike($profileId);?>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="n-head">
                                    <a href="<?php echo BASE_URL;?>product.php">PRODUCT</a>
                                </div>
                                <div class="n-bottom">
                                    
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="edit-button">
                        <?php echo $getFromFollow->followBtn($profileId, $userID, $profileData->user_id);?>
                    </div>
                    </div>
                </div>
            </div>

            <div class="in-wrapper">
                <div class="in-full-wrap">
                    <div class="in-left">
                        <div class="in-left-wrap">
                            <div class="profile-info-wrap">
                                <div class="profile-info-inner">
                                    <div class="profile-img">
                                        <img src="<?php echo BASE_URL.$profileData->profile_image;?>"/>
                                    </div>	
                                    <div class="profile-name-wrap">
                                        <div class="profile-name">
                                            <a href="<?php echo BASE_URL.$profileData->username;?>"><?php echo $profileData->screen_name;?></a>
                                        </div>
                                        <div class="profile-tname">
                                            <a href="<?php echo BASE_URL.$profileData->username;?>"><?php echo '@'.$profileData->username;?></a>
                                        </div>
                                    </div>
                                    <div class="profile-bio-wrap">
                                        <div class="profile-bio-inner">
                                            <?php echo $profileData->bio;?>
                                        </div>
                                    </div>
                                    <div class="profile-extra-info">
                                        <div class="profile-extra-inner">
                                            <ul>
                                                <?php if (!empty($profileData->country)){?>
                                                    <li>
                                                        <div class="profile-ex-location-i">
                                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                        </div>
                                                        <div class="profile-ex-location">
                                                            <?php echo $profileData->country;?>
                                                        </div>
                                                    </li>
                                                <?php }?>
                                                <?php if (!empty($profileData->website)){?>
                                                    <li>
                                                        <div class="profile-ex-location-i">
                                                            <i class="fa fa-link" aria-hidden="true"></i>
                                                        </div>
                                                        <div class="profile-ex-location">
                                                            <a href="<?php echo BASE_URL.$profileData->website;?>" target="_blank"><?php echo $profileData->website;?></a>
                                                        </div>
                                                    </li>
                                                <?php }?>
                                                    <li>
                                                        <div class="profile-ex-location-i">
                                                            <!-- <i class="fa fa-calendar-o" aria-hidden="true"></i> -->
                                                        </div>
                                                        <div class="profile-ex-location">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="profile-ex-location-i">
                                                            <!-- <i class="fa fa-tint" aria-hidden="true"></i> -->
                                                        </div>
                                                        <div class="profile-ex-location">
                                                        </div>
                                                    </li>
                                            </ul>						
                                        </div>
                                    </div>

                                    <div class="profile-extra-footer">
                                        <div class="profile-extra-footer-head">
                                            <div class="profile-extra-info">
                                                <ul>
                                                    <li>
                                                        <div class="profile-ex-location-i">
                                                            <i class="fa fa-camera" aria-hidden="true"></i>
                                                        </div>
                                                        <div class="profile-ex-location">
                                                            <a href="#">0 Photos and videos </a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="profile-extra-footer-body">
                                            <ul>
                                                <!-- <li><img src="#"/></li> -->
                                            </ul>		
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="in-center">
                        <div class="in-center-wrap">
                           <?php 
                                $posts = $getFromPost->getUserPosts($profileId);
                                foreach($posts as $post){
                                    $like 	= $getFromPost->likes($userID, $post->postID);
                                    $repost = $getFromPost->checkRepost($post->postID, $userID);
                                    $user   = $getFromUser->userData($post->repostBy);
                                    echo '
                                    <div class="all-tweet">
                                        <div class="t-show-wrap">	
                                            <div class="t-show-inner">
                                                '.((($repost['repostID'] === $post->repostID) OR $post->repostID > 0) ? '
                                                    <div class="t-show-banner">
                                                        <div class="t-show-banner-inner">
                                                            <span><i class="fa fa-retweet" aria-hidden="true"></i></span><span>'.$user->username.' reposted</span>
                                                        </div>
                                                    </div>' : '').'
                                                
                                                '.((!empty($post->repostMgs) && $post->postID === $repost['postID'] OR $post->repostID > 0) ? '
                                                    <div class="t-show-popup" data-post="'.$post->postID.'">
                                                        <div class="t-show-head">
                                                            <div class="t-show-img">
                                                                <img src="'.BASE_URL.$user->profile_image.'"/>
                                                            </div>
                                                            <div class="t-s-head-content">
                                                                <div class="t-h-c-name">
                                                                    <span><a href="'.BASE_URL.$user->username.'">'.$user->screen_name.'</a></span>
                                                                    <span>@'.$user->username.'</span>
                                                                    <span>'.$getFromUser->timeAgo($repost['postedOn']).'</span>
                                                                </div>
                                                                <div class="t-h-c-dis">
                                                                    '.$getFromPost->getPostLink($post->repostMgs).'
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="t-s-b-inner">
                                                            <div class="t-s-b-inner-in">
                                                                <div class="retweet-t-s-b-inner">
                                                                    '.((!empty($post->postImage)) ? '
                                                                    <div class="retweet-t-s-b-inner-left">
                                                                    '.($getFromPost->isImage(BASE_URL.$post->postImage) ? '<span class="photo"><img class="img" src="'.BASE_URL.$post->postImage.'" class="imagePopup" data-post="'.$post->postID.'"/></span>' 
                                                                    : '<img class="imagePopup"  width="50" src="'.BASE_URL."users/media1.png".'"> <a href="'.BASE_URL.$post->postImage.'">'.substr($post->postImage, 6).'</a>').'
                                                                    </div>' : '').'
                                                                    <div>
                                                                        <div class="t-h-c-name">
                                                                            <span><a href="'.BASE_URL.$post->username.'">'.$post->screen_name.'</a></span>
                                                                            <span>@'.$post->username.'</span>
                                                                            <span>'.$getFromUser->timeAgo($post->postedOn).'</span>
                                                                        </div>
                                                                        <div class="retweet-t-s-b-inner-right-text">		
                                                                            '.$getFromPost->getPostLink($post->status).'
                                                                            '.(($post->postImage) != null ? '<img src="'.BASE_URL.$post->postImage.'">' : '').'
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>' : 
                                                    '<div class="t-show-popup" data-post="'.$post->postID.'">
                                                        <div class="t-show-head">
                                                            <div class="t-show-img">
                                                                <img src="'.BASE_URL.$post->profile_image.'"/>
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
                                                    </div>'.((!empty($post->postImage)) ? 
                                                            '<div class="t-show-body">
                                                                    <div class="t-s-b-inner">
                                                                        <div class="t-s-b-inner-in">
                                                                        '.($getFromPost->isImage(BASE_URL.$post->postImage) ? '<span class="photo"><img class="img" src="'.BASE_URL.$post->postImage.'" class="imagePopup" data-post="'.$post->postID.'"/></span>' 
                                                                        : '<img class="imagePopup"  width="50" src="'.BASE_URL."users/media1.png".'"> <a href="'.BASE_URL.$post->postImage.'">'.substr($post->postImage, 6).'</a>').'
                                                                        </div>
                                                                    </div>
                                                            </div>' : '').'
                                                    </div>').'
                                                    <div class="t-show-footer">
                                                        <div class="t-s-f-right">
                                                            <ul> 
                                                                '.(($getFromUser->loggedIn() === true) ? '
                                                                    <li><button><a href="#"><i class="fa fa-share" aria-hidden="true"></i></a></button></li>	
                                                                    <li>'.(($post->postID === $repost['repostID']) ? 
                                                                            '<button class="retweeted" data-post="'.$post->postID.'" data-user="'.$post->postBy.'"><i class="fa fa-retweet" aria-hidden="true"></i><span class="rePostsCount">'.$post->repostCount.'</span></button>' : 
                                                                            '<button class="retweet" data-post="'.$post->postID.'" data-user="'.$post->postBy.'"><i class="fa fa-retweet" aria-hidden="true"></i><span class="rePostsCount">'.(($post->repostCount > 0) ? $post->repostCount : '').'</span></button>').'</li>
                                                                    <li>'.(($like['likeOn'] === $post->postID) ? 
                                                                            '<button class="unlike-btn" data-post="'.$post->postID.'" data-user="'.$post->postBy.'"><i class="fa fa-heart-o" aria-hidden="true"></i><span class="likesCount">'.(($post->likeCount > 0) ? $post->likeCount : '').'</span></button>' : 
                                                                            '<button class="like-btn" data-post="'.$post->postID.'" data-user="'.$post->postBy.'"><i class="fa fa-heart-o" aria-hidden="true"></i><span class="likesCount"></span></button>').'
                                                                    </li>
                                                                    '.(($post->postBy === $userID ? '
                                                                        <li><a href="#" class="more"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                                                                            <ul> 
                                                                                <li><label class="deleteTweet" data-post="'.$post->postID.'">Delete Post</label></li>
                                                                            </ul>
                                                                        </li>' : '')).'
                                                                ' : '<li><button><a href="#"><i class="fa fa-share" aria-hidden="true"></i></a></button></li>
                                                                     <li><button><a href="#"><i class="fa fa-retweet" aria-hidden="true"></i></a></button></li>
                                                                     <li><button><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></button></li>
                                                                     ').'
                                                            </ul>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>';
                                }
                            ?>
                        </div>
                        <div class="popupTweet"></div>
                    </div>
                    <div class="in-right">
                        <div class="in-right-wrap">      
                            <?php $getFromFollow->whoToFollow($userID, $userID);?>
                            <?php $getFromPost->trends();?>   
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
        <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/tracking-min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/face-min.js"></script>
        <script>
            var img = document.getElementsByClassName('img');
			var photo = document.getElementsByClassName('photo');
			var tracker = new tracking.ObjectTracker(['face']);
			// var tracker = new tracking.ObjectTracker(['face', 'eye', 'mouth']);
			tracking.track(img[0], tracker);
			tracker.on('track', function(event) {
				event.data.forEach(function(rect) {
					plotRectangle(rect.x, rect.y, rect.width, rect.height);
				});
			});
			var plotRectangle = function(x, y, w, h) {
				var rect = document.createElement('div');
				var arrow = document.createElement('div');
				arrow.classList.add('arrow');
				rect.classList.add('rect');
				rect.appendChild(arrow);
				photo[0].appendChild(rect);
				rect.style.width = w + 'px';
				rect.style.height = h + 'px';
				rect.style.left = (img[0].offsetLeft + x) + 'px';
				rect.style.top = (img[0].offsetTop + y) + 'px';
			};
        </script>
    <?php }?> 
</html>