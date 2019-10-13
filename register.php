<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">
	<meta name="author" content="Kareem Shehab">
	<meta name="description" content="register here and gain access to all the good good">
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

	#form-wrap{
		padding: 50px 30px;

		background-color: #dcdde1;
		border-radius: 2px;

		box-shadow: 0px 15px 16.83px 0.17px rgba(0, 0, 0, 0.05);

	}

	#sign-in-wrap{
		border: .5px solid #576574;
	}

	#topics{
		display: flex;
		flex-direction: row;
	}

	/*#topics-group{
		border: .5px solid black;
	}*/

	#topics input{
		width: 15px;
		height: 15px;
	}

	.topic-name{
		padding: 0px 5px;
	}

	#topics-group{
		margin-bottom: 30px;
	}

	#sec-quest{
		box-sizing: content-box;
	}

	.form-group{
		display: flex;
		flex-direction: column;

		justify-content: center;
		align-items: center;

		margin: 15px 0px;
	}

	.form-group input, #sec-quest{
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
			display: none;
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
			<h2>We welcome and applaud you for taking the steps to register with us. You wont regret it.</h2>
		</div>

		<div id="form-wrap">
			<div id="register-form">
				<form method="post" id="register" action="./registerUser.php">
					<div class="form-group">
						<input class="text-input" id="name" type="name" name="name" placeholder="name" required/>
					</div>

					<div class="form-group">
						<input class="text-input" id="username" autocomplete="off" type="text" name="username" placeholder="Username" required/>
						<?php if(isset($_GET['error'])){ 
							  	if($_GET['error'] == "username-taken"){
							  		echo "<div class='error'>That username is already taken!</div>";
							  	}
							  }
						?>
					</div>
					<div class="form-group">
						<input class="text-input" id="password" type="password" name="password" placeholder="Password" required/>
					</div>
					<div class="form-group">
						<input class="text-input" id="retype-password" type="password" name="retype-password" placeholder="Retype password" required/>
					</div>

					<div class="form-group">
						<select id="sec-quest" name="security-quest" required>
							 <option value="When were you born?">When were you born?</option>
							 <option value="Favorite food?">Favorite food?</option>
							 <option value="First pets name?">First pets name?</option>
							 <option value="Moms maiden name?">Moms maiden name?</option>
						</select>
					</div>
					<div class="form-group">
						<input class="text-input" id="sec-quest-answer" type="text" name="sec-quest-answer" placeholder="Answer to question" required/>
					</div>


					<div class="form-group">
						<input id="signin-submit" type="submit" name="user-credentials" value="Register"/>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

</html>