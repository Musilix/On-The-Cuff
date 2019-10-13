<?php

	session_start();
	include("connect.php");

	if(isset($_SESSION['user'])){
		$user = $_SESSION['user'];

		if(isset($_POST['rest_name'])){
			$rest_name = $_POST['rest_name'];

			$state =  $_POST['state'];
			$city =  $_POST['city'];
			$address = (isset($_POST['address'])) ?  $_POST['address'] : "";

			$challenge_name =   $_POST['challenge_name'];
			$challenge_desc =  $_POST['challenge_desc'];

			$id = $_POST['ID'];

			$stmt = $conn->prepare("INSERT INTO savedChallenges (restaurant_name, state, city, address, challenge_name, challenge_desc, username, ID) VALUES (?,?,?,?,?,?,?,?)");
			$stmt->bind_param("ssssssss", $rest_name, $state, $city, $address, $challenge_name, $challenge_desc, $user, $id);
			if($stmt->execute()){
				$stmt->close();
				echo "true";
			}else{
				echo "fail";
			}
		}
	}
?>
