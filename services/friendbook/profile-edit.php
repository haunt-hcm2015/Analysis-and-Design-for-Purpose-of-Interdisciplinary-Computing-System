<?php 
    include 'core/init.php';
    $userID = $_SESSION['user_id'];
    $user   = $getFromUser->userData($userID);
    $notify = $getFromMessage->getNotificationCount($userID);
    if ($getFromUser->loggedIn() === false)
        header("Location: index.php");
    if (isset($_POST['screenName'])){
        if (!empty($_POST['screenName'])){
            $screenName = $getFromUser->checkInput($_POST['screenName']);
            $profileBio = $getFromUser->checkInput($_POST['bio']);
            $country = $getFromUser->checkInput($_POST['country']);
            $website = $getFromUser->checkInput($_POST['website']);
            if (strlen($screenName) > 20)
                $error = "Name must be between 6-20 characters";
            else if (strlen($profileBio) > 120)
                $error = "Description is too long";
            else if (strlen($country) > 80)
                $error = "Country name is too long";
            else{
                $getFromUser->update('user', $userID, array("screen_name" => $screenName, 
                                "bio" => $profileBio, "country" => $country, "website" => $website));
                header('Location: '.$user->username);
            }
        }else
            $error = 'Name field can\'t blank';
    }

    if (isset($_FILES['profileImage'])){
        if (!empty($_FILES['profileImage']['name'][0])){
            $fileRoot = $getFromUser->uploadImage($_FILES['profileImage']);
            $getFromUser->update('user', $userID, array("profile_image" => $fileRoot));
            header('Location: '.$user->username);
        }
    }
    if (isset($_FILES['profileCover'])){
        if (!empty($_FILES['profileCover']['name'][0])){
            $fileRoot = $getFromUser->uploadImage($_FILES['profileCover']);
            $getFromUser->update('user', $userID, array("profile_cover" => $fileRoot));
            header('Location: '.$user->username);
        }
    }
?>
<!doctype html>
<html>
    <head>
        <title><?php echo $profileData->screen_name.' (@'.$profileData->username.') edit page';?></title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/style-complete.css"/>
        <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/font/css/font-awesome.css"/>  
        <script src="<?php echo BASE_URL;?>assets/js/jquery.min.js"></script> 
        <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/search.js"></script>
    </head>
    <body>
        <div class="wrapper">
            <div class="header-wrapper">
                <div class="nav-container">
                    <div class="nav">
                        <div class="nav-left">
                            <ul>
                                <li><a href="home.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
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
                                                
                                </div></li>
                                <li class="hover"><label class="drop-label" for="drop-wrap1"><img src="<?php echo $user->profile_image;?>"/></label>
                                <input type="checkbox" id="drop-wrap1">
                                <div class="drop-wrap">
                                    <div class="drop-inner">
                                        <ul>
                                            <li><a href="<?php echo $user->username;?>"><?php echo $user->username;?></a></li>
                                            <li><a href="settings/account">Settings</a></li>
                                            <li><a href="includes/logout.php">Log out</a></li>
                                        </ul>
                                    </div>
                                </div>
                                </li>
                                <li><label for="pop-up-tweet" class="addTweetBtn">Post</label></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-cover-wrap"> 
                <div class="profile-cover-inner">
                    <div class="profile-cover-img">
                        <img src="<?php echo $user->profile_cover;?>"/>
                
                        <div class="img-upload-button-wrap">
                            <div class="img-upload-button1">
                                <label for="cover-upload-btn">
                                    <i class="fa fa-camera" aria-hidden="true"></i>
                                </label>
                                <span class="span-text1">
                                    Change your profile photo
                                </span>
                                <input id="cover-upload-btn" type="checkbox"/>
                                <div class="img-upload-menu1">
                                    <span class="img-upload-arrow"></span>
                                    <form method="post" enctype="multipart/form-data">
                                        <ul>
                                            <li>
                                                <label for="file-up">
                                                    Upload photo
                                                </label>
                                                <input type="file" name="profileCover" onchange="this.form.submit();" id="file-up" />
                                            </li>
                                                <li>
                                                <label for="cover-upload-btn">
                                                    Cancel
                                                </label>
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile-nav">
                    <div class="profile-navigation">
                        <ul>
                            <li>
                                <a href="#">
                                    <div class="n-head">
                                        POST
                                    </div>
                                    <div class="n-bottom">
                                        <?php $getFromPost->countPost($userID);?>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo BASE_URL.$user->username.'/following';?>">
                                    <div class="n-head">
                                        FOLLOWINGS
                                    </div>
                                    <div class="n-bottom">
                                        <?php echo $user->following;?>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo BASE_URL.$user->username.'/followers';?>">
                                    <div class="n-head">
                                        FOLLOWERS
                                    </div>
                                    <div class="n-bottom">
                                        <?php echo $user->follower;?>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="n-head">
                                        LIKES
                                    </div>
                                    <div class="n-bottom">
                                        <?php $getFromPost->countPost($userID);?>
                                    </div>
                                </a>
                            </li>
                            
                        </ul>
                        <div class="edit-button">
                            <span>
                                <button class="f-btn" type="button" onclick="window.location.href='<?php echo $user->username; ?>'" value="Cancel">Cancel</button>
                            </span>
                            <span>
                                <input type="submit" id="save" value="Save Changes">
                            </span>
                        
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
                                            <img src="<?php echo $user->profile_image;?>"/>
                                        <div class="img-upload-button-wrap1">
                                            <div class="img-upload-button">
                                                <label for="img-upload-btn">
                                                    <i class="fa fa-camera" aria-hidden="true"></i>
                                                </label>
                                                <span class="span-text">
                                                    Change your profile photo
                                                </span>
                                                <input id="img-upload-btn" type="checkbox"/>
                                                <div class="img-upload-menu">
                                                <span class="img-upload-arrow"></span>
                                                    <form method="post" enctype="multipart/form-data">
                                                        <ul>
                                                            <li>
                                                                <label for="profileImage">
                                                                    Upload photo
                                                                </label>
                                                                <input id="profileImage" type="file"  onchange="this.form.submit();" name="profileImage"/>   
                                                            </li>
                                                            <li><a href="#">Remove</a></li>
                                                            <li>
                                                                <label for="img-upload-btn">
                                                                    Cancel
                                                                </label>
                                                            </li>
                                                        </ul>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <form id="editForm" method="post" enctype="multipart/Form-data">	
                                        <div class="profile-name-wrap">
                                            <?php 
                                                if (isset($imageError)){
                                                    echo '<ul>
                                                            <li class="error-li">
                                                                <div class="span-pe-error">'.$imageError.'</div>
                                                            </li>
                                                        </ul> ';
                                                }
                                            ?> 
                                            <div class="profile-name">
                                                <input type="text" name="screenName" value="<?php echo $user->screen_name;?>"/>
                                            </div>
                                            <div class="profile-tname">
                                                @<?php echo $user->username;?>
                                            </div>
                                        </div>
                                        <div class="profile-bio-wrap">
                                            <div class="profile-bio-inner">
                                                <textarea class="status" name="bio"><?php echo $user->bio;?></textarea>
                                                <div class="hash-box">
                                                    <ul>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="profile-extra-info">
                                            <div class="profile-extra-inner">
                                                <ul>
                                                    <li>
                                                        <div class="profile-ex-location">
                                                            <input id="cn" type="text" name="country" placeholder="Country" value="<?php echo $user->country;?>" />
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="profile-ex-location">
                                                            <input type="text" name="website" placeholder="Website" value="<?php echo $user->website;?>"/>
                                                        </div>
                                                    </li>
                                                    <?php 
                                                        if (isset($error)){
                                                            echo '<ul>
                                                                    <li class="error-li">
                                                                        <div class="span-pe-error">'.$error.'</div>
                                                                    </li>
                                                                </ul> ';
                                                        }
                                                    ?> 
                                    </form>
                                        <script type="text/javascript">
                                            $('#save').click(function(){
                                                $('#editForm').submit();
                                            })
                                        </script>
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
                                                <ul></ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="in-center">
                            <div class="in-center-wrap">
                                <?php 
                                    $posts = $getFromPost->getUserPosts($userID);
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
                            <?php 
                                $getFromFollow->whoToFollow($userID, $userID);
                                $getFromPost->trends();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
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
    <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/message.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/postmessage.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/notification.js"></script>
    
</html>