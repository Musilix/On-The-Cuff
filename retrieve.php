<!DOCTYPE html>
<html>
<head>
	<title>Retrieve Password</title>
	<meta charset="utf-8">
	<meta name="author" content="Kareem Shehab">
	<meta name="description" content="A place to view and take your exams">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- styles -->
	<link href="https://fonts.googleapis.com/css?family=Karla|Roboto" rel="stylesheet">
	

	<!-- fonts -->

</head>

<style type="text/css">
	html, body{
		font-family: "Karla";

		padding: 0;
		margin: 0;
		
		height: 100%;
		width: 100%;

		background-color: #f1f2f6;
	}

	#welcome-text{
		font-family: "Roboto";
		text-align: center;
	}

	#total-wrapper{
		height: 100%;

		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
	}

	#sign-in-wrap{
		border: .5px solid #576574;
	}

	.form-group{
		display: flex;
		flex-direction: column;

		justify-content: center;
		align-items: center;

		margin: 15px 0px;
	}

	.form-group input{
		font-family: "Karla";
		padding: 10px;
		width: 350px;
		height: 30px;

		border-radius: 2.5px;
		border: .5px solid #a4b0be;

		transition: border-color .35s;
	}

	.form-group input:focus{
		border-color: #5f27cd;
		outline:none;
	}

	.form-group #signin-submit{
		font-family: "Roboto";
		color: white;

		box-sizing: content-box;

		background-color: #5352ed;
		border: none;
		text-align: center;

		font-weight: bold;

		transition: background-color .25s;
	}

	.form-group #signin-submit:hover{
		background-color: #341f97;

		cursor: pointer;
	}

	#sign-in-ref{
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
	}

	#sign-in-ref a{
		text-decoration: none;
	}

	.error{
		font-family: "Roboto";
		color: red;
	}

	#retrieve-pass{
		padding: 0;
		transition: border .4s;
	}

	#retrieve-pass:hover{
		cursor: pointer;

		border: .5px solid #4cd137;


	}

	#retrieval-form{
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
	}

</style>



<body>
	<?php 
		session_start();
		include("connect.php");

		$username = (isset($_POST['username'])) ? $_POST['username'] : ((isset($_GET['username'])) ? $_GET['username'] : "");

		// $statement = $conn->prepare("SELECT `sec-quest` FROM `Users2` WHERE `username` = ?");
		// $statement->bind_param("s", $username);
		// $statement->execute();
	       
	 //    $result = $statement->get_result();
	    
	 //    $statement->close();

		$que = "'" . $username . "'";

		$stmt = $conn->query("SELECT `sec-quest` FROM `Users2` WHERE `username` LIKE " . $que);

		$question = $stmt->fetch_assoc();


		if($stmt->num_rows == 0 && !isset($_SESSION['error'])){
			header("Location: http://codd.cs.gsu.edu/~kshehab1/On-The-Cuff-Master/forgot.php?error=invalid-username");
			exit();
		}

	?>
	<div id="total-wrapper">
		<div id="form-wrap">
			<div id="welcome-text">
				<h2>Answer the following security question in order to recover your password.</h2>
			</div>

			<div id="retrieval-form"> 
				<form method="post" id="recover" action= <?php echo "./check.php?user=" . $username ?>>
					<div class="form-group">
						<p><?php echo $question['sec-quest'] ?></p>
					</div>
					<div class="form-group">
						<input id="sec-answer" type="text" name="sec-answer" placeholder="Answer"/>
					</div>
					<div class="form-group">
						<input id="retrieve-pass" type="submit" name="retrieve-pass" value="Check"/>
					</div>
				</form>
				<?php
					if(isset($_SESSION['error'])){
						if($_SESSION['error'] == "wrong-sec-answer"){
							echo "<div class='error'>Your answer was wrong. Try once more</div>";
							unset($_SESSION['error']);
						}
					}

				?>
			</div>
		</div>
	</div>

</body>
</html>