<?php 
	include 'database/connection.php';
	include 'classes/user.php';
	include 'classes/post.php';
	include 'classes/follow.php';
	include 'classes/add-friend.php';
	include 'classes/friend.php';
	include 'classes/message.php';

	global $pdo;
	if (!isset($_SESSION)) {
		session_start();
	}
	$getFromUser = new User($pdo);
	$getFromPost = new Post($pdo);
	$getFromFollow = new Follow($pdo);
	$getFromAddFriend = new AddFriend($pdo);
	$getFromFriend = new Friend($pdo);
	$getFromMessage = new Message($pdo);

	define("BASE_URL", "http://localhost:81/ai-solution/services/friendbook/");

?>