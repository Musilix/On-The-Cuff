<?php
	session_start();
	include("connect.php");

	$username = $_POST['username'];
	$password = $_POST['password'];
	$name = $_POST['name'];

	$sec_quest = $_POST['security-quest'];
	$sec_answer = $_POST['sec-quest-answer'];

	$check_query = "SELECT * FROM Users2 WHERE username LIKE '$username'";
	$data = $conn->query($check_query);

	if($data->num_rows > 0){
		header("Location: http://codd.cs.gsu.edu/~kshehab1/On-The-Cuff-Master/register.php?error=username-taken");
		exit();
	}else{
		// I wanted to use foreign keys, but I didn't have a strong idea of the concept, so for the sake of time, I just made 3 attrbiutes being topic1, topic2, and topic3 which can either be specified as the topic the user chose or just none...
		$req = "INSERT INTO `kshehab1`.`Users2` (`username`, `password`, `name`, `sec-quest`, `sec-answer`, `topic1`, `topic2`, `topic3`) VALUES ('$username', '$password', '$name', '$sec_quest', '$sec_answer','$topic1', '$topic2', '$topic3')";
		$conn->query($req);
		header("Location: http://codd.cs.gsu.edu/~kshehab1/On-The-Cuff-Master/sign_in_page.php");
		exit();
	}
	
	$conn->close();
?>