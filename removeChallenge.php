<?php
	session_start();

	include("connect.php");

	if(isset($_SESSION['user'])){
		$user = $_SESSION['user'];
		if(isset($_POST['challenge_name'])){
			$chall_name = $_POST['challenge_name'];
			$rest_name = $_POST['restaurant_name'];

			$stmt = $conn->prepare("DELETE FROM savedChallenges WHERE username = ? AND challenge_name = ? AND restaurant_name = ?");
			$stmt->bind_param("sss", $user, $chall_name, $rest_name);
			if($stmt->execute()){
				$stmt->close();
				echo "true";
				header("Location: http://codd.cs.gsu.edu/~kshehab1/On-The-Cuff-Master/savedChallenges.php");
				exit();
			}else{
				echo "fail";
			}
		}
	}
?>