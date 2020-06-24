<?php 
    $directorySeparator = DIRECTORY_SEPARATOR;
	$baseDir = realpath(dirname(__FILE__).$directorySeparator.'..') . $directorySeparator;
    require_once("{$baseDir}{$directorySeparator}init.php");
    
    if ($user->loggedIn() === false)
		header("Location: index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Console Application">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="AI Console Application">
    <title>Console Application</title>
    <link href="<?php echo BASE_URL.'assets/css/font-face.css';?>" rel="stylesheet" media="all">
    <link href="<?php echo BASE_URL.'assets/css/font-awesome.min.css';?>" rel="stylesheet" media="all">
    <link href="<?php echo BASE_URL.'assets/css/fontawesome-all.min.css';?>" rel="stylesheet" media="all">
    <link href="<?php echo BASE_URL.'assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css';?>" rel="stylesheet" media="all">
    <link href="<?php echo BASE_URL.'assets/css/bootstrap.min.css';?>" rel="stylesheet" media="all">
    <link href="<?php echo BASE_URL.'assets/css/console-application.css';?>" rel="stylesheet" media="all">
</head>
<body class="animsition">
    <div class="page-wrapper">
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="<?php echo BASE_URL;?>">
                            <img src="assets/images/icon/logo.png"  />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="<?php echo BASE_URL.'console-application';?>">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL.'console/noodle';?>">
                                <i class="fas fa-chart-bar"></i>Search Engine Console
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL.'console/blog';?>">
                                <i class="fas fa-chart-bar"></i>Blogger
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL.'console/image-processing';?>">
                                <i class="fas fa-chart-bar"></i>Image Processing
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL.'console/video-processing';?>">
                                <i class="fas fa-table"></i>Video Processing
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL.'console/discrete-mathematics';?>">
                                <i class="far fa-check-square"></i>Discrete Mathematics
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL.'console/data-conversion';?>">
                                <i class="fas fa-database"></i>Data Conversion 
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL.'console/content-management-system';?>">
                                <i class="fas fa-map-marker-alt"></i>Content Management System
                            </a>
                        </li>
                       
                        <li>
                            <a href="<?php echo BASE_URL.'console/container';?>">
                                <i class="fas fa-desktop"></i>Container
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL.'console/computer-science';?>">
                                <i class="far fa-check-square"></i>Computer Science
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL.'console/devops';?>">
                                <i class="far fa-check-square"></i>DevOps
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL.'console/erp';?>">
                                <i class="far fa-check-square"></i>ERP
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL.'console/geographic-information-system';?>">
                                <i class="far fa-check-square"></i>Geographic Information System
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL.'console/natural-language-processing';?>">
                                <i class="far fa-check-square"></i>Natural Language Processing
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL.'console/testing';?>">
                                <i class="far fa-check-square"></i>Testing System
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL.'console/translate';?>">
                                <i class="far fa-check-square"></i>Translate Services
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="<?php echo BASE_URL;?>">
                    <img src="assets/images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                            <a class="js-arrow" href="<?php echo BASE_URL.'console-application';?>">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL.'console/noodle';?>">
                                <i class="fas fa-chart-bar"></i>Search Engine Console
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL.'console/blog';?>">
                                <i class="fas fa-chart-bar"></i>Blogger
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL.'console/image-processing';?>">
                                <i class="fas fa-chart-bar"></i>Image Processing
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL.'console/video-processing';?>">
                                <i class="fas fa-table"></i>Video Processing
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL.'console/discrete-mathematics';?>">
                                <i class="far fa-check-square"></i>Discrete Mathematics
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL.'console/data-conversion';?>">
                                <i class="fas fa-database"></i>Data Conversion 
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL.'console/content-management-system';?>">
                                <i class="fas fa-map-marker-alt"></i>Content Management System
                            </a>
                        </li>
                       
                        <li>
                            <a href="<?php echo BASE_URL.'console/container';?>">
                                <i class="fas fa-desktop"></i>Container
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL.'console/computer-science';?>">
                                <i class="far fa-check-square"></i>Computer Science
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL.'console/devops';?>">
                                <i class="far fa-check-square"></i>DevOps
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL.'console/erp';?>">
                                <i class="far fa-check-square"></i>ERP
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL.'console/geographic-information-system';?>">
                                <i class="far fa-check-square"></i>Geographic Information System
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL.'console/natural-language-processing';?>">
                                <i class="far fa-check-square"></i>Natural Language Processing
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL.'console/testing';?>">
                                <i class="far fa-check-square"></i>Testing System
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL.'console/translate';?>">
                                <i class="far fa-check-square"></i>Translate Services
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="page-container">
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <?php
                                                $userID = $_SESSION['user_id'];
                                                $userInfo = $user->getUserInfo($userID);
                                                echo '<img src="'.BASE_URL.$userInfo->profile_image.'" alt="'.$userInfo->username.'" />';
                                            ?>
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">
                                                <?php 
                                                    $userID = $_SESSION['user_id'];
                                                    $userInfo = $user->getUserInfo($userID);
                                                    echo $userInfo->username;
                                                ?>
                                            </a>
                                        </div>
                                
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div>
                                        <div class="logout">
                                            <a class="js-acc-btn" 
                                                href="<?php echo BASE_URL;?>core/auth/logout.php">Log Out
                                            </a>
                                        </div>
                                
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
          
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">overview</h2>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                           
                                            <div class="text">
                                                <h2>Project Info</h2>
                                             
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                           
                                            <div class="text">
                                                <h2>APIs</h2>
                                               
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                           
                                            <div class="text">
                                                <h2>AI Platform Status</h2>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                          
                                            <div class="text">
                                                <h2>News</h2>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="au-card recent-report">
                                    <div class="au-card-inner">
                                        <h3 class="title-2">recent reports</h3>
                                        <div class="chart-info">
                                            <div class="chart-info__left">
                                                <div class="chart-note">
                                                    <span class="dot dot--blue"></span>
                                                    <span>products</span>
                                                </div>
                                                <div class="chart-note mr-0">
                                                    <span class="dot dot--green"></span>
                                                    <span>services</span>
                                                </div>
                                            </div>
                                            <div class="chart-info__right">
                                                <div class="chart-statis">
                                                    <span class="index incre">
                                                        <i class="zmdi zmdi-long-arrow-up"></i>25%</span>
                                                    <span class="label">products</span>
                                                </div>
                                                <div class="chart-statis mr-0">
                                                    <span class="index decre">
                                                        <i class="zmdi zmdi-long-arrow-down"></i>10%</span>
                                                    <span class="label">services</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="recent-report__chart">
                                            <canvas id="recent-rep-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="au-card chart-percent-card">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 tm-b-5">Your Application</h3>
                                        <div class="row no-gutters">
                                            <div class="col-xl-6">
                                                <div class="chart-note-wrap">
                                                    <div class="chart-note mr-0 d-block">
                                                        <span class="dot dot--blue"></span>
                                                        <span>products</span>
                                                    </div>
                                                    <div class="chart-note mr-0 d-block">
                                                        <span class="dot dot--red"></span>
                                                        <span>services</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="percent-chart">
                                                    <canvas id="percent-chart"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 AI Solution. All rights reserved. Template by <a href="<?php echo BASE_URL;?>">AI Solution</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

