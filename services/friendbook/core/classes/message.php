<?php 
	class Message extends User{
		protected $pdo;
		function __construct($pdo){
			$this->pdo = $pdo;
        }
        public function recentMessages($userID){
            $smtp = $this->pdo->prepare("SELECT * FROM `message` LEFT JOIN `user` ON `messageFrom` = `user_id` WHERE `messageTo` =:userID");
			$smtp->bindParam(':userID', $userID, PDO::PARAM_INT);
            $smtp->execute();
            return $smtp->fetchAll(PDO::FETCH_OBJ);
        }
        public function getMessages($messageFrom, $userID){
            $smtp = $this->pdo->prepare("SELECT * FROM `message` LEFT JOIN `user` 
                                            ON `messageFrom` = `user_id` 
                                            WHERE `messageFrom` =:messageFrom AND `messageTo` =:userID OR `messageTo` =:messageFrom AND `messageFrom` = :userID");
            $smtp->bindParam(':userID', $userID, PDO::PARAM_INT);
            $smtp->bindParam(':messageFrom', $messageFrom, PDO::PARAM_INT);
            $smtp->execute();
            $messages = $smtp->fetchAll(PDO::FETCH_OBJ);
            foreach($messages as $message){
                if ($message->messageFrom === $userID){
                    echo '<div class="main-msg-body-right">
                            <div class="main-msg">
                                <div class="msg-img">
                                    <a href="'.BASE_URL.$message->username.'"><img src="'.BASE_URL.$message->profile_image.'" /></a>
                                </div>
                                <div class="msg">'.$message->message.'
                                    <div class="msg-time">
                                        '.$this->timeAgo($message->messageOn).'
                                    </div>
                                </div>
                                <div class="msg-btn">
                                    <a><i class="fa fa-ban" aria-hidden="true"></i></a>
                                    <a class="deleteMsg" data-message="'.$message->messageID.'"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>';
                }else{
                    echo '<div class="main-msg-body-left">
                            <div class="main-msg-l">
                                <div class="msg-img-l">
                                    <a href="'.BASE_URL.$message->username.'"><img src="'.BASE_URL.$message->profile_image.'" /></a>
                                </div>
                                <div class="msg-l">'.$message->message.'
                                    <div class="msg-time-l">
                                        '.$this->timeAgo($message->messageOn).'
                                    </div>	
                                </div>
                                <div class="msg-btn-l">	
                                    <a><i class="fa fa-ban" aria-hidden="true"></i></a>
                                    <a class="deleteMsg" data-message="'.$message->messageID.'"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div> ';
                }
            }
        }

        public function delete($messageID, $userID){
            $smtp = $this->pdo->prepare("DELETE FROM `message` 
                                            WHERE `messageID` =:messageID AND `messageFrom` =:userID 
                                                OR `messageID` =:messageID AND `messageTo` =:userID");
            $smtp->bindParam(':messageID', $messageID, PDO::PARAM_INT);
            $smtp->bindParam(':userID', $userID, PDO::PARAM_INT);
            $smtp->execute();
        }
        public function getNotificationCount($userID){
            $smtp = $this->pdo->prepare("SELECT COUNT(`messageID`) AS `totalMessage`,(SELECT COUNT(`ID`) FROM `notification` WHERE `notificationFor` =:userID AND `status` = 0) AS `totalNotification` FROM `message` WHERE `messageTo` =:userID AND `status` = 0");
            $smtp->bindParam(':userID', $userID, PDO::PARAM_INT);
            $smtp->execute();
            return $smtp->fetch(PDO::FETCH_OBJ);
        }
        public function getChatbot($userID){
            $smtp = $this->pdo->prepare("SELECT * FROM `chatbot` C, `user` U WHERE :userID = U.`user_id` ORDER by C.`date` DESC");
            $smtp->bindParam(':userID', $userID, PDO::PARAM_INT);
            $smtp->execute();
            return $smtp->fetch(PDO::FETCH_OBJ);
        }
        public function getQuestion($userID, $msg){
            $server_time = date("Y-m-d H:i:s");
            $smtp = $this->pdo->prepare("SELECT * FROM `question` WHERE `question` like %:msg%"); 
            $smtp->execute(array('msg' => $msg));
            $result = $smtp->rowCount();
            if($count == 0){
                $data = "I am Sorry but I am not exactly clear how to help you";
                $sql  = "INSERT INTO `chatbot`(`user_id`,`user_message`,`chatbot`,`date`) VALUES('$userID','$msg','$data','$server_time')";
            }else{
                while($row = $smtp->fetch(PDO::FETCH_BOTH)){
                    $data = $row['answer'];
                    $sql = "INSERT INTO `chatbot`(`user_message`,`chatbot`,`date`) VALUES('$userID','$msg','$data','$server_time')";
                }
            }
            $smtp = $this->pdo->prepare($sql);
            $smtp->execute();
        }
        public function messageViewed($userID){
            $smtp = $this->pdo->prepare("UPDATE `message` SET `status` = 1 WHERE `messageTo` =:userID AND `status` = 0");
            $smtp->bindParam(':userID', $userID, PDO::PARAM_INT);
            $smtp->execute();
        }
        public function notificationViewed($userID){
            $smtp = $this->pdo->prepare("UPDATE `notification` SET `status` = 1 WHERE `notificationFor` =:userID");
            $smtp->bindParam(':userID', $userID, PDO::PARAM_INT);
            $smtp->execute();
        }
        public function sendNotification($getID, $userID, $target, $type){
            $this->create('notification', array('notificationFor' => $getID, 'notificationFrom' => $userID, 'target' => $target, 'type' => $type, 'notificationAt' => date('Y-m-d H:i:s')));
        }
        public function notification($userID){
            $smtp = $this->pdo->prepare("SELECT * FROM `notification` N 
                                                  LEFT JOIN `user` U ON N.`notificationFrom` = U.`user_id` 
                                                  LEFT JOIN `post` P ON N.`target` = P.`postID`
                                                  LEFT JOIN `likes` L ON N.`target` = L.`likeOn`
                                                  LEFT JOIN `follow` F ON N.`notificationFrom` = F.`sender` AND N.`notificationFor` = F.`receiver` 
                                                  WHERE N.`notificationFor` =:userID AND N.`notificationFrom` !=:userID ");
            $smtp->execute(array('userID' => $userID));
            return $smtp->fetchAll(PDO::FETCH_OBJ);
        }
	}
?>