<?php
	session_start();
	include("connect.php");

	$currentUser = $_POST['username'];

	$statement = $conn->prepare("SELECT * FROM Users2 WHERE username = ?");
	$statement->bind_param("s", $currentUser);
	$statement->execute();
       
    $result = $statement->get_result();
    
    $statement->close();

	$givenPassword = $_POST['password'];

	if($result->num_rows > 0){
		$user = $result->fetch_assoc();
		if($givenPassword == $user['password']){
			$_SESSION['user'] = $currentUser;
			header("Location: http://codd.cs.gsu.edu/~kshehab1/On-The-Cuff-Master/index.php");
			exit();
		}else{
			header("Location: http://codd.cs.gsu.edu/~kshehab1/On-The-Cuff-Master/sign_in_page.php?error=invalid-password");
			exit();
		}
	}else{
		header("Location: http://codd.cs.gsu.edu/~kshehab1/On-The-Cuff-Master/sign_in_page.php?error=invalid-username");
		exit();
	}
?>