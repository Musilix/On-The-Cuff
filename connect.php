<?php
	// establish connection to DB
	$host = "localhost";
	$user = "kshehab1";
	$pass = "kshehab1";
	$dbName = "kshehab1";

	$conn = new mysqli($host, $user, $pass, $dbName);

	if($conn->connect_error){
		die("connection failed: " . $conn->connect_error);
	}
?>