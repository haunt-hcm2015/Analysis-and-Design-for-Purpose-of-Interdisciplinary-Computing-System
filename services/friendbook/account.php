<?php 
    include 'core/init.php';
    $userId = $_SESSION['user_id'];
    $user   = $getFromUser->userData($userId);
    $notify = $getFromMessage->getNotificationCount($userID);
    if ($getFromUser->loggedIn() === false)
        header('Location: '.BASE_URL.'index.php');
    if (isset($_POST['submit'])){
        $userName    = $getFromUser->checkInput($_POST['username']);
        $email       = $getFromUser->checkInput($_POST['email']);
        $phoneNumber = $getFromUser->checkInput($_POST['phone']);
        $error       = array();
        if (!empty($userName) and !empty($email)){
            if ($user->username != $userName and $getFromUser->checkUserName($userName) === true){
                $error['username'] = "The username is not available"; 
            }else if (preg_match("/[^a-zA-Z0-9\!]", $userName)){
                $error['username'] = "Only numbers and characters are allowed"; 
            }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error['email'] = "Invalid email format"; 
            }else if ($user->email != $email and $getFromUser->checkEmail($email) === true){
                $error['email'] = "Email already in use"; 
            }else if ($user->phone_number != $phoneNumber and $getFromUser->checkPhoneNumber($phoneNumber) === true){
                $error['phone_number'] = "Phone number already in use"; 
            }else {
                $getFromUser->update('user', $userId, array('username' => $userName, 'email' => $email, 'phone_number' => $phoneNumber));
                header("Location: ".BASE_URL."settings/account");
            }
        } else{
            $error['fields'] = "All fields are required"; 
        }
    }
?>
<html>
	<head>
		<title>Account settings page</title>
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
                                <li><input type="text" placeholder="Search" class="search"/><i class="fa fa-search" aria-hidden="true"></i></li>
                                <div class="nav-right-down-wrap">
                                    <ul class="search-result">
                                    
                                    </ul>
                                </div>
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
                            </ul>
                        </div>
                    </div>
                </div>
            </div>	
            <div class="container-wrap">
                <div class="lefter">
                    <div class="inner-lefter">
                        <div class="acc-info-wrap">
                            <div class="acc-info-bg">
                                <img src="<?php echo BASE_URL.$user->profile_cover;?>"/>  
                            </div>
                            <div class="acc-info-img">
                                <img src="<?php echo BASE_URL.$user->profile_image;?>"/>
                            </div>
                            <div class="acc-info-name">
                                <h3><?php echo $user->screen_name;?></h3>
                                <span><a href="<?php echo BASE_URL.$user->username;?>">@<?php echo $user->username;?></a></span>
                            </div>
                        </div>

                        <div class="option-box">
                            <ul> 
                                <li>
                                    <a href="<?php echo BASE_URL;?>settings/account" class="bold">
                                    <div>
                                        Account
                                        <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                    </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo BASE_URL;?>settings/password">
                                    <div>
                                        Password
                                        <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                    </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="righter">
                    <div class="inner-righter">
                        <div class="acc">
                            <div class="acc-heading">
                                <h2>Account</h2>
                                <h3>Change your basic account settings.</h3>
                            </div>
                            <div class="acc-content">
                                <form method="POST">
                                    <div class="acc-wrap">
                                        <div class="acc-left">
                                            Username
                                        </div>
                                        <div class="acc-right">
                                            <input type="text" name="username" value="<?php echo $user->username;?>"/>
                                            <span>
                                                <?php if (isset($error['username'])) echo $error['username'];?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="acc-wrap">
                                        <div class="acc-left">
                                            Email
                                        </div>
                                        <div class="acc-right">
                                            <input type="text" name="email" value="<?php echo $user->email;?>"/>
                                            <span>
                                                <?php if (isset($error['email'])) echo $error['email'];?>
                                            </span>
                                            <a href="#">Verify</a>
                                        </div>
                                    </div>
                                    <div class="acc-wrap">
                                        <div class="acc-left">
                                            Phone Number
                                        </div>
                                        <div class="acc-right">
                                            <input type="text" name="phone" value="<?php echo $user->phone_number;?>"/>
                                            <span>
                                                <?php if (isset($error['phone_number'])) echo $error['phone_number'];?>
                                            </span>
                                            <a href="#">Verify</a>
                                        </div>
                                    </div>
                                    <div class="acc-wrap">
                                        <div class="acc-left">
                                            
                                        </div>
                                        <div class="acc-right">
                                            <input type="Submit" name="submit" value="Save changes"/>
                                        </div>
                                        <div class="settings-error">
                                            <?php if (isset($error['fields'])) echo $error['fields'];?>
                                        </div>	
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="popupTweet"></div>
                        <div class="content-setting">
                            <div class="content-heading">
                                
                            </div>
                            <div class="content-content">
                                <div class="content-left">
                                    
                                </div>
                                <div class="content-right">
                                    
                                </div>
                            </div>
                        </div>
                    </div>	
                </div>
            </div>
        </div>
    </body>
    <?php if ($getFromUser->loggedIn() === true){  ?>
        <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/search.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/services.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/hashtag.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/popupform.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/message.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/postmessage.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/delete.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/notification.js"></script>
    <?php }?> 
</html>

