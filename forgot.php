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
		transition: border .35s, background-color .5s, box-shadow .25s;
	}

	#retrieve-pass:hover{
		cursor: pointer;

		box-shadow: 1px 1px 50px #fbc531;
		border: .5px solid #fbc531;
		background-color: #e1b12c;
	}


</style>

<body>
	<div id="total-wrapper">
		<div id="form-wrap">
			<div id="welcome-text">
				<h2>Please enter your username to retrieve your password.</h2>
			</div>

			<div id="retrieval-form"> <!-- //// -->
				<form method="post" id="recover" action="./retrieve.php">
					<div class="form-group">
						<input id="username" autocomplete="off" type="text" name="username" placeholder="Username" required/>
						<?php if(isset($_GET['error'])){ 
							  	if($_GET['error'] == "invalid-username"){
							  		echo "<div class='error'>We could not find an account with that username</div>";
							  	}
							  }
						?>
					</div>
					<div class="form-group">
						<input id="retrieve-pass" type="submit" name="retrieve-pass" value="Retrieve"/>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>