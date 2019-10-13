<!DOCTYPE html>
<html>
<head>
	<title>Password Recovery</title>
	<meta charset="utf-8">
	<meta name="author" content="Kareem Shehab">
	<meta name="description" content="register here and gain access to all the good good">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- styles -->
	<link href="https://fonts.googleapis.com/css?family=Karla|Roboto" rel="stylesheet">
	

	<!-- fonts -->

</head>

<style type="text/css">
	html,body{
		padding: 0;
		margin: 0;

		width: 100%;
		height: 100%;
	}
	#prompt{
		font-family: "Roboto";
		font-size: 35px;
		width: 100%;
		text-align: center;
	}

	#wrap{
		height: 50%;

		display: flex;
		justify-content: center;
		align-items: center;
	}

	#total-wrap{
		height: 100%;

		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
	}

	input{
		width: 100px;
		height: 50px;

		font-family: "Karla";
		font-size: 18px;
	}
</style>

	<?php
		session_start();
		include("connect.php");

		$username = $_GET['user'];

		$statement = $conn->prepare("SELECT `sec-answer` FROM `Users2` WHERE `username` = ?");
		$statement->bind_param("s", $username);
		$statement->execute();
	       
	    $result = $statement->get_result();
	    
	    $statement->close();

		$answer = $result->fetch_assoc();

		$userAnswer = $_POST['sec-answer'];
		$realAnswer = $answer['sec-answer'];
	?>


<body>
	<div id="total-wrap">
		<?php
			if($userAnswer == $realAnswer){
				$statement = $conn->prepare("SELECT `password` FROM `Users2` WHERE `username` = ?");
				$statement->bind_param("s", $username);
				$statement->execute();
			       
			    $result = $statement->get_result();
			    
			    $statement->close();

				$userpass = $result->fetch_assoc();

				$password = $userpass['password'];

				echo "<div id='prompt'>Your password is: <b>" . $password . "</b>. Click the button below to go back to the login page.</div>";
				// unset($_SESSION['error']);
			}else{
				$_SESSION['error'] = "wrong-sec-answer";
				header("Location: http://codd.cs.gsu.edu/~kshehab1/On-The-Cuff-Master/retrieve.php?username=" . $username);
				exit();
			}
		?>
		<div id="wrap">
			<form action="./index.php">
				<input type="submit" name="go-back-home" value="Redirect">
			</form>
		</div>
	</div>

</body>
</html>