<?php 
	$ds = DIRECTORY_SEPARATOR;
	$base_dir = realpath(dirname(__FILE__)) . $ds;
	require_once("{$base_dir}core{$ds}init.php");
	
	$user_id = $_SESSION['user_id'];
	$user    = $getFromUser->userData($user_id);
	$notify  = $getFromMessage->getNotificationCount($user_id);
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
				$postID = $getFromUser->create('post', array('status' => $status, 'postBy' => $user->user_id, 'postImage' => $postImage, 'postedOn' => date('Y-m-d H:i:s')));
				preg_match_all("/#+([A-Za-z0-9_]+)/i", $status, $hashtag);
				if (!empty($hashtag)){
					$getFromPost->addTrend($status);
				}
				$getFromPost->addMention($status, $user_id, $postID);
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
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>assets/css/style-complete.css"/>
   		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>assets/css/font/css/font-awesome.css"/>  
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
										echo '<span class="span-i">'.$notify->totalMessage.'</span>';
									}
								?>
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
							<input type="text" placeholder="Search" class="search"/>
							<i class="fa fa-search" aria-hidden="true"></i>
							<div class="search-result"></div>
						</li>
						<li class="hover">
							<label class="drop-label" for="drop-wrap1"><img src="<?php echo BASE_URL.$user->profile_image;?>"/></label>
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
									<img src="<?php echo BASE_URL.$user->profile_cover;?>"/>
								</div>
								<div class="info-in-body">
									<div class="in-b-box">
										<div class="in-b-img">
											<img src="<?php echo BASE_URL.$user->profile_image;?>"/>
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
											<?php $getFromPost->countPost($user_id);?>
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
					<div class="in-center-head" style="margin: auto auto;width: 80%">
						<h1>Create a unique and beautiful page</h1>
					</div>
					<div class="in-center-body">
						<div class="page">
							<div class="pageType">
								<img width="145" src="<?php echo BASE_URL;?>assets/images/personal.jpg"/>
							</div>
							<div class="pageTypeName">
								<h3>Personal</h3>
							</div>
							<div class="pageTypeDescription">
								<h5>Showcase your products and services, spotlight your brand and reach more customers on Friendbook.</h5>
							</div>
							<div class="pageCreateLink">
								<h5><a href="pagecreator.php">Create your page</a></</h5>
							</div>
						</div>
						<div class="page">
							<div class="pageType">
								<img width="145" src="<?php echo BASE_URL;?>assets/images/ecommerce.png"/>
							</div>
							<div class="pageTypeName">
								<h3>Ecommerce</h3>
							</div>
							<div class="pageTypeDescription">
								<h5>Showcase your products and services, spotlight your brand and reach more customers on Friendbook.</h5>
							</div>
							<div class="pageCreateLink">
								<h5><a href="pagecreator.php">Create your page</a></</h5>
							</div>
						</div>
						<div class="page">
							<div class="pageType">
								<img width="145" src="<?php echo BASE_URL;?>assets/images/share.png"/>
							</div>
							<div class="pageTypeName">
								<h3>Share</h3>
							</div>
							<div class="pageTypeDescription">
								<h5>Showcase your products and services, spotlight your brand and reach more customers on Friendbook.</h5>
							</div>
							<div class="pageCreateLink">
								<h5><a href="pagecreator.php">Create your page</a></</h5>
							</div>
						</div>
						<div class="page">
							<div class="pageType">
								<img width="145" src="<?php echo BASE_URL;?>assets/images/education.png"/>
							</div>
							<div class="pageTypeName">
								<h3>Education</h3>
							</div>
							<div class="pageTypeDescription">
								<h5>Showcase your products and services, spotlight your brand and reach more customers on Friendbook.</h5>
							</div>
							<div class="pageCreateLink">
								<h5><a href="pagecreator.php">Create your page</a></</h5>
							</div>
						</div>
					</div>
                </div>
			</div>
			<div class="in-right">
				<div class="in-right-wrap">
                    <?php $getFromFollow->whoToFollow($user_id, $user_id)?>
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
	<script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/like.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/repost.js"></script>
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
	<script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/mouth-min.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/eye-min.js"></script>
<?php } ?>
</html>