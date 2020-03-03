<?php
    include '../init.php';
    $getFromUser->preventAccess($_SERVER['REQUEST_METHOD'], realpath(__FILE__), realpath($_SERVER['SCRIPT_FILENAME']));
    if (isset($_POST['hashtag'])){
        $hashTag = $getFromUser->checkInput($_POST['hashtag']);
        $mention = $getFromUser->checkInput($_POST['hashtag']);
        if (substr($hashTag,0,1) === '#'){
            $trend = str_replace('#', '', $hashTag);
            $trend = $getFromPost->getTrendByHash($trend);
            foreach($trend as $hashtag){
                echo '<li><a href="#"><span class="getValue">'.'#'.$hashtag->hashtag.'</span></a></li>';
            }
        }

        if (substr($mention,0,1) === '@'){
            $mention = str_replace('@', '', $mention);
            $mentions = $getFromPost->getMention($mention);
            foreach($mentions as $mention){
                echo '<li>
                        <div class="nav-right-down-inner">
                            <div class="nav-right-down-left">
                                <span><img src="'.BASE_URL.$mention->profile_image.'"></span>
                            </div>
                            <div class="nav-right-down-right">
                                <div class="nav-right-down-right-headline">
                                    <a>'.$mention->screen_name.'</a><span class="getValue">@'.$mention->username.'</span>
                                </div>
                            </div>
                        </div>
                    </li>';
            }
        }
    }
?>