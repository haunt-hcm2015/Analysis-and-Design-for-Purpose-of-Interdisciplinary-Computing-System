<?php 
    if (isset($_GET['hashtag']) && !empty($_GET['hashtag'])){
        include 'core/init.php';
        $hashtag  = $getFromUser->checkInput($_GET['hashtag']);
        $userID   = @$_SESSION['user_id'];
        $user     = $getFromUser->userData($userID);
        $posts    = $getFromPost->getPostByHash($hashtag);
        $accounts = $getFromPost->getUserByHash($hashtag);
        $notify   = $getFromMessage->getNotificationCount($userID);
    }else{
        header('Location: '.BASE_URL.'index.php');
    }
?>
<!doctype html>
<html>
    <head>
        <title><?php echo '#'.$hashtag.' Hashtag on Post'?></title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/style-complete.css" />
        <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/font/css/font-awesome.css" />
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
                                <li>
                                    <input type="text" placeholder="Search" class="search" /><i class="fa fa-search" aria-hidden="true"></i>
                                    <div class="search-result">
                                    </div>
                                </li>
                                <?php  if ($getFromUser->loggedIn() === true){ ?>
                                    <li class="hover">
                                        <label class="drop-label" for="drop-wrap1"><img src="<?php echo BASE_URL.$user->profile_image;?>" /></label>
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
                                    <li>
                                        <label for="pop-up-tweet" class="addTweetBtn">Post</label>
                                    </li>
                                    <?php }else {
                                echo '<li><a href="'.BASE_URL.'index.php">Have an account? Login!</a></li>';
                            }?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hash-header">
                <div class="hash-inner">
                    <h1>#<?php echo $hashtag;?></h1>
                </div>
            </div>
            <div class="hash-menu">
                <div class="hash-menu-inner">
                    <ul>
                        <li><a href="<?php echo BASE_URL.'hashtag/'.$hashtag.'';?>">Latest</a></li>
                        <li><a href="<?php echo BASE_URL.'hashtag/'.$hashtag.'?f=users';?>">Accounts</a></li>
                        <li><a href="<?php echo BASE_URL.'hashtag/'.$hashtag.'?f=photos';?>">Photos</a></li>
                    </ul>
                </div>
            </div>
            <div class="in-wrapper">
                <div class="in-full-wrap">
                    <div class="in-left">
                        <div class="in-left-wrap">
                            <?php $getFromFollow->whoToFollow($userID, $userID);?>
                                <?php $getFromPost->trends();?>
                        </div>
                    </div>
                    <?php if (strpos($_SERVER['REQUEST_URI'], '?f=photos')) :?>
                        <div class="hash-img-wrapper">
                            <div class="hash-img-inner">
                                <?php 
                                    foreach($posts as $post){
                                        $like 	= $getFromPost->likes($userID, $post->postID);
                                        $repost = $getFromPost->checkRepost($post->postID, $userID);
                                        $user   = $getFromUser->userData($post->repostBy);
                                        if (!empty($post->postImage)){
                                            echo '<div class="hash-img-flex">
                                                    <img src="'.BASE_URL.$post->postImage.'" data-post="'.$post->postID.'"/>
                                                    <div class="hash-img-flex-footer">
                                                        <ul>
                                                            <li><i class="fa fa-share" aria-hidden="true"></i></li>
                                                            <li><i class="fa fa-retweet" aria-hidden="true"></i></li>
                                                            <li><i class="fa fa-heart" aria-hidden="true"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>';
                                        }
                                    }
                                ?> 
                            </div>
                        </div>
                        <?php elseif(strpos($_SERVER['REQUEST_URI'], '?f=users')) :?>
                            <div class="wrapper-following">
                                <div class="wrap-follow-inner">
                                    <?php foreach($accounts as $users) :?>
                                        <div class="follow-unfollow-box">
                                            <div class="follow-unfollow-inner">
                                                <div class="follow-background">
                                                    <img src="<?php echo BASE_URL.$users->profile_cover;?>" />
                                                </div>
                                                <div class="follow-person-button-img">
                                                    <div class="follow-person-img">
                                                        <img src="<?php echo BASE_URL.$users->profile_image;?>" />
                                                    </div>
                                                    <div class="follow-person-button">
                                                        <?php $getFromFollow->followBtn($users->user_id, $userID, $userID);?>
                                                    </div>
                                                </div>
                                                <div class="follow-person-bio">
                                                    <div class="follow-person-name">
                                                        <a href="<?php echo BASE_URL.$users->username;?>"><?php $users->screen_name;?></a>
                                                    </div>
                                                    <div class="follow-person-tname">
                                                        <a href="<?php echo BASE_URL.$users->username;?>">@<?php echo $users->username;?></a>
                                                    </div>
                                                    <div class="follow-person-dis">
                                                        <?php echo $getFromPost->getPostLink($users->bio);?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        <?php else:?>
                            <div class="in-center">
                                <div class="in-center-wrap">
                                    <?php 
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
                                                                                <img src="'.BASE_URL.$post->postImage.'" class="imagePopup" data-post="'.$post->postID.'"/>	
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
                                                                                    <img src="'.BASE_URL.$post->postImage.'" class="imagePopup" data-post="'.$post->postID.'"/>
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
                            </div>
                        <?php endif;?>
                </div>
            </div>
        </div>
    </body>
    <?php if ($getFromUser->loggedIn() === true){  ?>
        <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/search.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/hashtag.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/like.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/services.js"></script>
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