<?php

	session_start();
	include("connect.php");

	if(isset($_SESSION['user'])){
		$user = $_SESSION['user'];

		if(isset($_POST['rest_name'])){
			$rest_name = str_replace("'", "",$_POST['rest_name']);

			$state =  str_replace("'", "", $_POST['state']);
			$city =  str_replace("'", "", $_POST['city']);
			$address = (isset($_POST['address'])) ?  $_POST['address'] : "";

			$challenge_name =  str_replace("'", "",$_POST['challenge_name']);
			$challenge_desc = str_replace("'", "",$_POST['challenge_desc']);

			$stmt = $conn->prepare("INSERT INTO Challenges (restaurant_name, state, city, address, challenge_name, challenge_desc, poster) VALUES (?,?,?,?,?,?,?)");
			$stmt->bind_param("sssssss", $rest_name, $state, $city, $address, $challenge_name, $challenge_desc, $user);
			if($stmt->execute()){
				$stmt->close();
				echo "true";
			}else{
				echo "fail";
			}
		}
	}
?>