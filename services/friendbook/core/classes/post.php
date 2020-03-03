<?php 
	class Post extends User{
		protected $pdo;
		function __construct($pdo){
			$this->pdo = $pdo;
		}
		
		public function isImage($path){
			$supportedImage = array(
				'gif',
				'jpg',
				'jpeg',
				'png',
				'tiff',
				'bmp'
			);
			$fileName = $path;
			$ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
			if (in_array($ext, $supportedImage)) {
				return true;
			} else {
				return false;
			}
			
		}

		public function getInfoFile($link){
			$ext = pathinfo($link, PATHINFO_BASENAME);
			
			echo '<a href="#">'.$ext.'</a>';
		}
		# Post, repost in homepage
		public function post($userID, $limits){
			// SELECT * from `post` WHERE `postBy` = `user_id`
			// SELECT * from `post`, `user` WHERE `postBy` = `user_id` => trả về hết user
			// $smtp = $this->pdo->prepare('SELECT * from `post` LEFT JOIN `user` ON `postBy` = `user_id` WHERE `postBy` =:user_id AND `repostID` = 0 OR `postBy` = `user_id` AND `repostBy` != :user_id');
			// $smtp = $this->pdo->prepare('SELECT * from `post`,`user` WHERE `postBy` = `user_id` LIMIT :limits');
			$smtp = $this->pdo->prepare('SELECT * from `post` LEFT JOIN `user` ON `postBy` = `user_id` 
											WHERE `postBy` =:user_id OR `postBy` = `user_id` AND `repostBy` != :user_id AND `postBy` IN(SELECT `receiver` FROM `follow` WHERE `sender`=:user_id) ORDER BY `postID` DESC LIMIT :limits');
			$smtp->bindParam(':user_id', $userID, PDO::PARAM_INT);
			$smtp->bindParam(':limits', $limits, PDO::PARAM_INT);
			$smtp->execute();
			$posts = $smtp->fetchAll(PDO::FETCH_OBJ); 
			foreach($posts as $post){
				$like 	= $this->likes($userID, $post->postID);
				$repost = $this->checkRepost($post->postID, $userID);
				$user   = $this->userData($post->repostBy);
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
												<span>'.$this->timeAgo($repost['postedOn']).'</span>
											</div>
											<div class="t-h-c-dis">
												'.$this->getPostLink($post->repostMgs).'
											</div>
										</div>
									</div>
									<div class="t-s-b-inner">
										<div class="t-s-b-inner-in">
											<div class="retweet-t-s-b-inner">
												'.((!empty($post->postImage)) ? '
												<div class="retweet-t-s-b-inner-left">
												'.($this->isImage(BASE_URL.$post->postImage) ? '<span class="photo"><img class="img" src="'.BASE_URL.$post->postImage.'" class="imagePopup" data-post="'.$post->postID.'"/></span>' 
												: '<img class="imagePopup"  width="50" src="'.BASE_URL."users/media1.png".'"> <a href="'.BASE_URL.$post->postImage.'">'.substr($post->postImage, 6).'</a>').'
													
													
												</div>' : '').'
												<div>
													<div class="t-h-c-name">
														<span><a href="'.BASE_URL.$post->username.'">'.$post->screen_name.'</a></span>
														<span>@'.$post->username.'</span>
														<span>'.$this->timeAgo($post->postedOn).'</span>
													</div>
													<div class="retweet-t-s-b-inner-right-text">		
														'.$this->getPostLink($post->status).'
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
												<span>'.$this->timeAgo($post->postedOn).'</span>
											</div>
											<div class="t-h-c-dis">
												'.$this->getPostLink($post->status).'
											</div>
										</div>
								</div>'.((!empty($post->postImage)) ? 
										   '<div class="t-show-body">
												<div class="t-s-b-inner">
													<div class="t-s-b-inner-in">
													'.($this->isImage(BASE_URL.$post->postImage) ? '<span class="photo"><img class="img" src="'.BASE_URL.$post->postImage.'" class="imagePopup" data-post="'.$post->postID.'"/></span>' 
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
		}

		public function repost($postID, $userID, $getID, $comment){
			global $pdo;
			$smtp = $this->pdo->prepare("UPDATE `post` SET `repostCount` = `repostCount` + 1 WHERE `postID` = :postID");
			$smtp->bindParam(':postID', $postID, PDO::PARAM_INT);
			$smtp->execute();
			$smtp = $this->pdo->prepare("INSERT INTO `post` (`status`, `postBy`, `postImage`, `repostID`, `repostBy`, `postedOn`, `likeCount`, `repostCount`, `repostMgs`) 
													  SELECT `status`, `postBy`, `postImage`, `postID`, :user_id, `postedOn`, `likeCount`, `repostCount`, :repostMgs
													  FROM `post`
													  WHERE `postID` = :postID");
			$smtp->bindParam(':user_id', $userID, PDO::PARAM_INT);
			$smtp->bindParam(':repostMgs', $comment, PDO::PARAM_STR);
			$smtp->bindParam(':postID', $postID, PDO::PARAM_INT);
			$smtp->execute();
			(new Message($pdo))->sendNotification($getID, $userID, $postID, 'repost');
			return $smtp->fetch(PDO::FETCH_ASSOC);
		}
		public function checkRepost($postID, $userID){
			$smtp = $this->pdo->prepare("SELECT * FROM `post` WHERE `repostID` = :postID AND `repostBy` = :userID 
													OR `postID` = :postID AND `repostBy` = :userID");
			$smtp->bindParam(':userID', $userID, PDO::PARAM_INT);
			$smtp->bindParam(':postID', $postID, PDO::PARAM_INT);
			$smtp->execute();
			return $smtp->fetch(PDO::FETCH_ASSOC);
		} 
		public function comments($postID){
			$smtp = $this->pdo->prepare("SELECT * FROM `comments` LEFT JOIN `user` ON `commentBy` = `user_id` WHERE `commentOn` = :postID");
			$smtp->bindParam(':postID', $postID, PDO::PARAM_INT);
			$smtp->execute();
			return $smtp->fetchAll(PDO::FETCH_OBJ);
		}

		public function countPost($userID){
			$smtp = $this->pdo->prepare("SELECT COUNT(`postID`) AS `totalPost` FROM `post` WHERE `postBy` =:userID AND `repostID` = 0 OR `repostBy` =:userID");
			$smtp->bindParam(':userID', $userID, PDO::PARAM_INT);
			$smtp->execute();
			$count = $smtp->fetch(PDO::FETCH_OBJ);
			echo $count->totalPost;
		}
		#
		public function countLike($userID){
			$smtp = $this->pdo->prepare("SELECT COUNT(`likeID`) AS `totalLike` FROM `likes` WHERE `likeBy` =:userID");
			$smtp->bindParam(':userID', $userID, PDO::PARAM_INT);
			$smtp->execute();
			$count = $smtp->fetch(PDO::FETCH_OBJ);
			echo $count->totalLike;
		}
		public function getTrendByHash($hashTag){
			$smtp = $this->pdo->prepare("SELECT * from `trend` WHERE `hashtag` LIKE :hashtag LIMIT 5");
			$smtp->bindValue(":hashtag", $hashTag.'%');
			$smtp->execute();
			return $smtp->fetchAll(PDO::FETCH_OBJ);
		}
		public function getMention($mention){
			$smtp = $this->pdo->prepare("SELECT `user_id`, `username`, `screen_name`, `profile_image` from `user` WHERE `username` LIKE :mention OR `screen_name` LIKE :mention LIMIT 5");
			$smtp->bindValue(":mention", $mention.'%');
			$smtp->execute();
			return $smtp->fetchAll(PDO::FETCH_OBJ);
		}
		public function addTrend($hashTag){
			$result = array();
			preg_match_all("/#+([A-Za-z0-9_]+)/i", $hashTag, $matches);
			if ($matches){
				$result = array_values($matches[1]);
			}
			$sql = "INSERT INTO `trend` (`hashtag`, `createdOn`) VALUES(:hashtag, CURRENT_TIMESTAMP)";
			foreach($result as $trend)
			{
				if ($smtp = $this->pdo->prepare($sql)){
					$smtp->execute(array(':hashtag' => $trend));
				}
			}
		}
		public function addMention($status, $userID, $postID){
			global $pdo;
			$result = array();
			preg_match_all("/@+([A-Za-z0-9_]+)/i", $status, $matches);
			if ($matches){
				$result = array_values($matches[1]);
			}
			$sql = "SELECT * FROM `user` WHERE `username` = :mention";
			foreach($result as $trend)
			{
				if ($smtp = $this->pdo->prepare($sql)){
					$smtp->execute(array(':mention' => $trend));
					$data = $smtp->fetch(PDO::FETCH_OBJ);
					if ($data->user_id != $userID)
						(new Message($pdo))->sendNotification($data->user_id, $userID, $postID, 'mention');
				}
			}
			
		}
		# Post links clickable
		public function getPostLink($post){
			$post = preg_replace("/(https?:\/\/)([\w]+.)([\w\.]+)/", '<a href="$0" target="_blank">$0</a>', $post);
			$post = preg_replace("/#([\w]*)/", '<a href="'.BASE_URL.'hashtag/$1" target="_blank">$0</a>', $post);
			$post = preg_replace("/@([\w]+)/", '<a href="'.BASE_URL.'$1" target="_blank">$0</a>', $post);
			return $post;
		}

		public function getPopupPost($postID){
			$smtp = $this->pdo->prepare("SELECT * FROM `post`,`user` WHERE `postID` = :postID AND `postBy` = `user_id`");
			$smtp->bindParam(':postID', $postID, PDO::PARAM_INT);
			$smtp->execute();
			return $smtp->fetch(PDO::FETCH_OBJ);
		}
		public function addLike($userID, $postID, $getID){
			global $pdo;
			$message = new Message($this);
			$smtp = $this->pdo->prepare("UPDATE `post` SET `likeCount` = `likeCount` + 1 WHERE `postID` = :postID");
			$smtp->bindParam(':postID', $postID, PDO::PARAM_INT);
			$smtp->execute();
			$this->create('likes', array('likeBy' => $userID, 'likeOn' => $postID));
			if ($getID != $userID){
				(new Message($pdo))->sendNotification($getID, $userID, $postID, 'like');
			}
		}
		public function getUserPosts($userID){
			$smtp = $this->pdo->prepare("SELECT * from `post` LEFT JOIN `user` ON `postBy` = `user_id` WHERE `postBy` =:user_id AND `repostID` = 0 OR `postBy` = `user_id` AND `repostBy` = :user_id ORDER BY `postID` DESC");
			$smtp->bindParam(':user_id', $userID, PDO::PARAM_INT);
			$smtp->execute();
			return $smtp->fetchAll(PDO::FETCH_OBJ);
		}
		public function unlike($userID, $postID, $getID){
			$smtp = $this->pdo->prepare("UPDATE `post` SET `likeCount` = `likeCount` - 1 WHERE `postID` = :postID");
			$smtp->bindParam(':postID', $postID, PDO::PARAM_INT);
			$smtp->execute();
			$smtp = $this->pdo->prepare("DELETE FROM `likes` WHERE `likeBy` = :userID AND `likeOn`=:postID");
			$smtp->bindParam(':userID', $userID, PDO::PARAM_INT);
			$smtp->bindParam(':postID', $postID, PDO::PARAM_INT);
			$smtp->execute();
		}
		public function likes($userID, $postID){
			$smtp = $this->pdo->prepare("SELECT * FROM `likes` WHERE `likeBy`=:userID AND `likeOn`=:postID");
			$smtp->bindParam(':userID', $userID, PDO::PARAM_INT);
			$smtp->bindParam(':postID', $postID, PDO::PARAM_INT);
			$smtp->execute();
			return $smtp->fetch(PDO::FETCH_ASSOC);
		}
		public function trends(){
			$smtp = $this->pdo->prepare("SELECT *, COUNT(`postID`) AS `post_count` FROM `trend` INNER JOIN `post` ON `status` LIKE CONCAT('%#', `hashtag`,'%') OR `repostMgs` LIKE CONCAT('%#', `hashtag`,'%') GROUP BY `hashtag` ORDER BY `postID`");
			$smtp->execute();
			$trends = $smtp->fetchAll(PDO::FETCH_OBJ);
			echo '<div class="trend-wrapper"><div class="trend-inner"><div class="trend-title"><h3>Trends</h3></div>';
			foreach($trends as $trend)
			{
				echo '<div class="trend-body">
						<div class="trend-body-content">
							<div class="trend-link">
								<a href="'.BASE_URL.'hashtag/'.$trend->hashtag.'">#'.$trend->hashtag.'</a>
							</div>
							<div class="trend-tweets">
								'.$trend->post_count.' <span>Post</span>
							</div>
						</div>
					 </div>';
			}
			echo '</div></div>';
		}

		public function getPostByHash($hashTag){
			$smtp = $this->pdo->prepare("SELECT * FROM `post` LEFT JOIN `user` ON `postBy` = `user_id` WHERE `status` LIKE :hashtag OR `repostMgs` LIKE :hashtag");
			$smtp->bindValue(":hashtag", '%#'.$hashTag.'%', PDO::PARAM_STR);
			$smtp->execute();
			return $smtp->fetchAll(PDO::FETCH_OBJ);
		}
		public function getUserByHash($hashTag){
			$smtp = $this->pdo->prepare("SELECT DISTINCT * FROM `post` INNER JOIN `user` ON `postBy` = `user_id` WHERE `status` LIKE :hashtag OR `repostMgs` LIKE :hashtag GROUP BY `user_id`");
			$smtp->bindValue(":hashtag", '%#'.$hashTag.'%', PDO::PARAM_STR);
			$smtp->execute();
			return $smtp->fetchAll(PDO::FETCH_OBJ);
		}
	}
?>