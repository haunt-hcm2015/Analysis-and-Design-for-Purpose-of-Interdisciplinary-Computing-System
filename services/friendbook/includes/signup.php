<?php 

    $ds = DIRECTORY_SEPARATOR;
    $base_dir = realpath(dirname(__FILE__).$ds.'..') . $ds;
    require_once("{$base_dir}core{$ds}init.php"); 
    
    if ($_SERVER['REQUEST_METHOD'] == "GET" && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])){
		header("Location: ".BASE_URL."index.php");
    }
    
    $user_id = $_SESSION['user_id'];
    $user = $getFromUser->userData($user_id);
    if (isset($_POST['confirm'])){
        $confirmCode = $_POST['confirm'];
        $activeCode = $getFromUser->confirmCode($user_id);
        if (intval($confirmCode) == intval($activeCode))
        {
            header('Location: ../home.php');
        }
        else
        {
            header('Location: http://localhost:81/friendbook/includes/signup.php?step=2');
        }
    }
    if (isset($_GET['step']) === true && empty($_GET['step']) === false){
        if (isset($_POST['next'])){
            $userName = $getFromUser->checkInput($_POST['username']);
            if (!empty($userName)){
                if (strlen($userName) > 20)
				    $error = "User name must be between 6-20 characters";
                else if ($getFromUser->checkUserName($userName) === true)
                    $error = "Username has already taken";
                else{
                    $getFromUser->update('user', $user_id, array('username' => $userName));
                    header('Location: signup.php?step=2');
                }
            }else{
                $error = 'Please enter your username to choose';
            }
        }
        

?>
        <!doctype html>
        <html>
            <head>
                <title>Friendbook</title>
                <meta charset="UTF-8" />
                <link rel="stylesheet" href="../assets/css/font/css/font-awesome.css"/>
                <link rel="stylesheet" href="../assets/css/style-complete.css"/>
            </head>
        <body>
            <div class="wrapper">
                <div class="nav-wrapper">
                    <div class="nav-container">	
                        <div class="nav-second">
                            <ul>
                                <li><a href="#"><i class="fa fa-users" aria-hidden="true"></i></a></li>							
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="inner-wrapper">
                    <div class="main-container">
                        <?php if ($_GET['step'] == '1'){ ?>
                            <div class="step-wrapper">
                                <div class="step-container">
                                    <form method="post">
                                        <h2>Choose a Username</h2>
                                        <h4>Don't worry, you can always change it later.</h4>
                                        <div>
                                            <input type="text" name="username" placeholder="Username"/>
                                        </div>
                                        <div>
                                            <ul>
                                            <li><?php if (isset($error)) echo $error; ?></li>
                                            </ul>
                                        </div>
                                        <div>
                                            <input type="submit" name="next" value="Next"/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php }?>    

                        <?php if ($_GET['step'] == '2'){ ?>  
                            <div class='lets-wrapper'>
                                <div class='step-letsgo'>
                                    <h2>We're glad you're here, <?php echo $user->username; ?></h2>
                                    <p>Friendbook is a constantly updating stream of the coolest, most important news, media, sports, TV, conversations and more--all tailored just for you.</p>
                                    <br/>
                                    <p>
                                        Tell us about all the stuff you love and we'll help you get set up.
                                    </p><br/><br/>
                                    <span>
                                        <!--<a href="../home.php" class='backButton'>Let's go!</a>-->
                                        <form method="post">
                                        <div>
                                            <input type="text" name="confirm" placeholder="# # # # # # # #"/>
                                        </div>
                                        <div>
                                            <input type="submit" name="confirm_code" value="Confirm Code"/>
                                            <p>Code confirm sent your email. Please enter 8 digit number to get more interest</p>
                                        </div>
                                    </form>
                                    </span>
                                </div>
                            </div>
                        <?php }?>           
                    </div>
                </div>
            </div>
        </body>
        </html>
<?php
    }
?>
