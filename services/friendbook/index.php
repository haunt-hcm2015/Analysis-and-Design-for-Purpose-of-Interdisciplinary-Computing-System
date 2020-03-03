<?php 
	$ds = DIRECTORY_SEPARATOR;
	$base_dir = realpath(dirname(__FILE__)) . $ds;
	require_once("{$base_dir}core{$ds}init.php");
	if (isset($_SESSION['user_id']))
		header("Location: ".BASE_URL."home.php");
?>
<html>
	<head>
		<title>Friendbook</title>
		<meta charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>assets/css/style-complete.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>assets/css/font/css/font-awesome.css" />
	</head>
<body>
	<div class="front-img">
		<img src="assets/images/background.jpg">
	<div class="wrapper">
		<div class="header-wrapper">
			<div class="nav-container">
				<div class="nav">		
					<div class="nav-left">
						<ul>
							<li><i class="fa fa-users" aria-hidden="true"></i><a href="#">Home</a></li>
							<li><a href="#">About</a></li>
						</ul>
					</div>
					<div class="nav-right">
						<ul>
							<li><a href="#">Language</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="inner-wrapper">
			<div class="main-container">
				<div class="content-left">
					<h1>Welcome to Friendbook</h1>
					<br/>
					<p>A place to connect with your friends — get updates from the people you love, get the updates from the world and things that interest you.</p>
				</div>

				<div class="content-right">
					<div class="login-wrapper">
						<?php include 'includes/login.php';?>
					</div>
					<div class="signup-wrapper">
						<?php include 'includes/signup-form.php';?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
