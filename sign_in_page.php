<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
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



	@media only screen and (max-width: 530px){

		#welcome-text{
			/*display: none;*/
		}

		#form-wrap{
		  width: 100%;
		  height: 100%;
		}

		form,.text-input, select{
			width: 100% !important;
		}

		.text-input, select{
			text-align: center;
		}

		select{
			padding-left: 75% !important;
		}
	}


</style>

<body>
	<div id="total-wrapper">
		<div id="welcome-text">
			<h2>What is up bruv</h2>
		</div>

		<div id="form-wrap">
			<div id="sign-in-form">
				<form method="post" id="signin" action="./signInUser.php">
					<div class="form-group">
						<input id="username" autocomplete="off" type="text" name="username" placeholder="Username" required/>
						<?php if(isset($_GET['error'])){ 
							  	if($_GET['error'] == "invalid-username"){
							  		echo "<div class='error'>Username was incorrect or nonexistent</div>";
							  	}
							  }
						?>
					</div>
					<div class="form-group">
						<input id="password" type="password" name="password" placeholder="Password" required/>
						<?php if(isset($_GET['error'])){ 
							  	if($_GET['error'] == "invalid-password"){
							  		echo "<div class='error'>Password was incorrect</div>";
							  	}
							  }
						?>
					</div>
					<div class="form-group">
						<input id="signin-submit" type="submit" name="user-credentials" value="Login"/>
					</div>
				</form>
			</div>
			<div id="sign-in-ref">
				<a href="./forgot.php"><p>Forgot password?</p></a>
				<p>New here?<a href="./register.php"> Join now</a></p>
			</div>
		</div>
	</div>

</body>
</html>