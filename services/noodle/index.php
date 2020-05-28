<?php
	require_once("config.php");
	require_once("..\..\core\init.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Noodle</title>

	<meta name="description" content="Search the web for sites and images.">
	<meta name="keywords" content="Search engine, noodle, websites">
	<meta name="author" content="Hau T. Nguyen">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="<?php echo SERVICES_NOODLE.'assets/css/style.css'; ?>">

</head>
<body>
	
	<div class="wrapper indexPage">
		<div id="topMenu">
			<div class="account">
				<ul>
					<?php 
						if ($user->loggedIn()){
						$userID = $_SESSION['user_id'];
						$userInfo = $user->getUserInfo($userID);
						echo '<li>
								<a class="nav-link" href="'.BASE_URL.'console-application">
									<img src="'.BASE_URL.$userInfo->profileuser.'" alt="User Profile"/>
								</a>
							</li>';
						}
					?>
					<li>
						<a href="<?php echo BASE_URL.'login';?>">Login</a>
					</li>
					<li>
						<a href="<?php echo BASE_URL.'sign-up';?>">Sign up</a>
					</li>
				</ul>
			</div>
			<div class="products">
				<ul class="topMenuProduct">
					<li>
						<a href="<?php echo BASE_URL.'services/videotube';?>">Video Network</a>
					</li>
					<li>
						<a href="<?php echo BASE_URL.'services/friendbook';?>">Social Network</a>
					</li>
					<li>
						<a href="#">AI Solution</a>
					</li>
					<li>
						<a href="#">More Product</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="mainSection">
			<div class="logoContainer">
				<img src="<?php echo SERVICES_NOODLE.'assets/images/logo.png'; ?>" title="Logo of our site" alt="Site logo">
			</div>
			<div class="searchContainer">
				<form action="<?php echo SERVICES_NOODLE.'search' ;?>" method="GET">
					<input class="searchBox" type="text" name="term" autocomplete="off">
					<input class="searchButton" type="submit" value="Search">
				</form>

			</div>


		</div>


	</div>

</body>
</html>