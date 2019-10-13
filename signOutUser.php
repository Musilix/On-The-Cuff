<?php

	session_start();

	session_destroy();

	header("Location: http://codd.cs.gsu.edu/~kshehab1/On-The-Cuff-Master/index.php");
	// header("Location: http://localhost/New%20Folder/BBTransit/BBTransit/index.php");
	exit();
?>