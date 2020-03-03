<?php 
	class Follow extends User{
		protected $pdo;
		function __construct($pdo){
			$this->pdo = $pdo;
		}
		public function checkFollow($followerID, $userID){
			$smtp = $this->pdo->prepare("SELECT * FROM `follow` WHERE `sender` = :userID AND `receiver` =:followerID");
			$smtp->bindParam(':userID', $userID, PDO::PARAM_INT);
			$smtp->bindParam(':followerID', $followerID, PDO::PARAM_INT);
			$smtp->execute();
			return $smtp->fetch(PDO::FETCH_ASSOC);
		}
		public function followBtn($profileID, $userID, $followID){
			$data = $this->checkFollow($profileID, $userID);
			if ($this->loggedIn() === true){
				if ($profileID != $userID){
					if ($data['receiver'] == $profileID)
						return "<button class='f-btn following-btn follow-btn' data-follow='".$profileID."' data-profile='".$followID."'>Following</button>";
					else
						return "<button class='f-btn follow-btn' data-follow='".$profileID."' data-profile='".$followID."'><i class='fa fa-user-plus'></i>Follow</button>";
				}
				else
					return "<button class='f-btn' onclick=location.href='".BASE_URL."profile-edit.php'>Edit Profile</button>";
			}else{
				return "<button class='f-btn' onclick=location.href='".BASE_URL."index.php'><i class='fa fa-user-plus'></i> Follow</button>";
			}
		}

		public function follow($followID, $userID, $profileID){
			global $pdo;
			$this->create('follow', array("sender" => $userID, "receiver" => $followID, 'followOn' => date("Y-M-D H:i:s")));
			$this->addFollowCount($followID, $userID);
			$smtp = $this->pdo->prepare("SELECT `user_id`, `following`, `follower` FROM `user` LEFT JOIN `follow` ON `sender` =:userID AND CASE WHEN `receiver` =:userID THEN `sender` = `user_id` END WHERE `user_id` =:profileID");
			$smtp->execute(array("userID" => $userID, "profileID" => $profileID));
			$data = $smtp->fetch(PDO::FETCH_ASSOC);
			echo json_encode($data);
			(new Message($pdo))->sendNotification($followID, $userID, $followID, 'follow');
		}
		public function unfollow($followID, $userID, $profileID){
			$this->delete('follow', array("sender" => $userID, "receiver" => $followID));
			$this->removeFollowCount($followID, $userID);
			$smtp = $this->pdo->prepare("SELECT `user_id`, `following`, `follower` FROM `user` LEFT JOIN `follow` ON `sender` =:userID AND CASE WHEN `receiver` =:userID THEN `sender` = `user_id` END WHERE `user_id` =:profileID");
			$smtp->execute(array("userID" => $userID, "profileID" => $profileID));
			$data = $smtp->fetch(PDO::FETCH_ASSOC);
			echo json_encode($data);
		}
		public function addFollowCount($followID, $userID){
			$smtp = $this->pdo->prepare("UPDATE `user` SET `following` = `following` + 1 WHERE `user_id` =:userID;
										 UPDATE `user` SET `follower` =  `follower` + 1 WHERE `user_id` =:follow_id");
			$smtp->execute(array("userID" => $userID, "follow_id" => $followID));
		}
		public function removeFollowCount($followID, $userID){
			$smtp = $this->pdo->prepare("UPDATE `user` SET `following` = `following` - 1 WHERE `user_id` =:userID;
										 UPDATE `user` SET `follower` =  `follower` - 1 WHERE `user_id` =:follow_id");
			$smtp->execute(array("userID" => $userID, "follow_id" => $followID));
		}
		public function followingList($profileID, $userID, $followID){
			global $pdo;
			$smtp = $this->pdo->prepare("SELECT * FROM `user` LEFT JOIN `follow` ON `receiver` = `user_id`
										AND CASE WHEN `sender` = :userID THEN `receiver` = `user_id` 
										END WHERE `sender` IS NOT NULL");
			$smtp->bindParam(":userID", $profileID, PDO::PARAM_INT);
			$smtp->execute();
			$followings = $smtp->fetchAll(PDO::FETCH_OBJ);
			foreach($followings as $following){
				echo '<div class="follow-unfollow-box">
						<div class="follow-unfollow-inner">
							<div class="follow-background">
								<img src="'.BASE_URL.$following->profile_cover.'"/>
							</div>
							<div class="follow-person-button-img">
								<div class="follow-person-img"> 
									<img src="'.BASE_URL.$following->profile_image.'"/>
								</div>
								<div class="follow-person-button">
									'.$this->followBtn($following->user_id, $userID, $followID).'
								</div>
							</div>
							<div class="follow-person-bio">
								<div class="follow-person-name">
									<a href="'.BASE_URL.$following->username.'">'.$following->screen_name.'</a>
								</div>
								<div class="follow-person-tname">
								<a href="'.BASE_URL.$following->username.'">'.$following->username.'</a>
								</div>
								<div class="follow-person-dis">
									'.(new Post($pdo))->getPostLink($following->bio).'
								</div>
							</div>
						</div>
					</div>';
			}
		}
		public function followerList($profileID, $userID, $followID){
			global $pdo;
			$smtp = $this->pdo->prepare("SELECT * FROM `user` LEFT JOIN `follow` ON `sender` = `user_id`
										AND CASE WHEN `receiver` = :userID THEN `sender` = `user_id` 
										END WHERE `receiver` IS NOT NULL");
			$smtp->bindParam(":userID", $profileID, PDO::PARAM_INT);
			$smtp->execute();
			$followings = $smtp->fetchAll(PDO::FETCH_OBJ);
			foreach($followings as $following){
				echo '<div class="follow-unfollow-box">
						<div class="follow-unfollow-inner">
							<div class="follow-background">
								<img src="'.BASE_URL.$following->profile_cover.'"/>
							</div>
							<div class="follow-person-button-img">
								<div class="follow-person-img"> 
									<img src="'.BASE_URL.$following->profile_image.'"/>
								</div>
								<div class="follow-person-button">
									'.$this->followBtn($following->user_id, $userID, $followID).'
								</div>
							</div>
							<div class="follow-person-bio">
								<div class="follow-person-name">
									<a href="'.BASE_URL.$following->username.'">'.$following->screen_name.'</a>
								</div>
								<div class="follow-person-tname">
								<a href="'.BASE_URL.$following->username.'">'.$following->username.'</a>
								</div>
								<div class="follow-person-dis">
									'.(new Post($pdo))->getPostLink($following->bio).'
								</div>
							</div>
						</div>
					</div>';
			}
		}

		public function whoToFollow($userID, $profileID){
			$smtp = $this->pdo->prepare("SELECT * FROM `user` WHERE `user_id` != :userID AND `user_id` NOT IN(SELECT `receiver` FROM `follow` WHERE `sender` =:userID) ORDER BY rand() LIMIT 5");
			$smtp->bindParam(":userID", $userID, PDO::PARAM_INT);
			$smtp->execute();
			$data = $smtp->fetchAll(PDO::FETCH_OBJ);
			echo '<div class="follow-wrap"><div class="follow-inner"><div class="follow-title"><h3>Who to follow</h3></div>';
			foreach($data as $user){
				echo '<div class="follow-body">
					  	<div class="follow-img">
							<img src="'.BASE_URL.$user->profile_image.'"/>
						</div>
						<div class="follow-content">
							<div class="fo-co-head">
								<a href="'.BASE_URL.$user->username.'">'.$user->screen_name.'</a><span>@'.$user->username.'</span>
							</div>
							'.$this->followBtn($user->user_id, $userID, $profileID).'
						</div>
					   </div>';
			}
			echo '</div></div>';
		}
	}
?>