<!DOCTYPE html>
<html>
<head>
	<title>Post a Challenge</title>
	<meta charset="utf-8">
	<meta name="author" content="Kareem Shehab">
	<meta name="description" content="Seen any cool eating challenges around? Post them here for others to see!">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" href="./assets/icons/burger-icon.ico">
	<meta property="og:image" content="./assets/images/burger-preview.png" />

	<!-- styles -->
	<link href="./assets/hamburgers-master/dist/hamburgers.min.css?v=1.1" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./post_challenge_styles.css?v=1.1">

	<!-- fonts -->
	<link href="https://fonts.googleapis.com/css?family=Asap|Inconsolata|Anton|Karla" rel="stylesheet">

	<!-- scripts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/jquery-ui.min.js"></script>
</head>


<body>
	<div id="total-page-wrap">
		<div id="placeholder"></div>
		<div id="nav-wrap">
			<div id="logo">
				<a href="./index.php"><img src="./assets/images/logo2.svg" width="190px" height="70px"></a>
			</div>
			<div id="nav-bar">
				<button id="nav-button" class="hamburger hamburger--collapse" type="button">
				  	<span class="hamburger-box"><span class="hamburger-inner"></span></span>
				</button>
				<div id="nav-links">
					<nav id="user-choices">
						<?php
              				session_start();
              				if(isset($_SESSION['user'])){
                				echo "<p id='username'>" . strtoupper($_SESSION['user']) . "</p>" .
									 "<p id='saved'><a href='./savedChallenges.php'>SAVED CHALLENGES</a></p>" .
									 "<p id='log'><a href='./signOutUser.php'>LOG OUT</a></p>";
							}else{
								echo "<p><a href='./sign_in_page.php'>LOG IN</a></p>";
							}
						?>
					</nav>
				</div>
			</div>
		</div>

		<div id="success-message">
			<div id="success-content">
				<!-- success mess or error -->
				
			</div>
		</div>

		<div id="submission-wrap">
			<div id="">
				<h2>Seen anything around?</h2>
				<p>Well, let us know about it below!</p>
			</div>
			<div id="form-wrap">
				<form id="food-challenge-sub">
					<div class="form-group">
						<input type="text" name="rest_name" placeholder="Restaurant Name" required/>
					</div>

					<div class="form-group">
						<input type="text" name="state" placeholder="State" required/>
					</div>

					<div class="form-group">
						<input type="text" name="city" placeholder="City" required/>
					</div>

					<div class="form-group">
						<input type="text" name="address" placeholder="Address" />
					</div>

					<div class="form-group">
						<input type="text" name="challenge_name" placeholder="Whats the name of the challenge?" required/>
					</div>

					<div class="form-group">
						<textarea name="challenge_desc" form="food-challenge-sub" id ="chall-desc" align="top" type="text" name="challenge_desc">Give a description of the challenge... (255 chars)</textarea>
					</div>

					<div class="form-group">
						<input type=submit id="sub-button" name="challenge-submission" value="POST">
					</div>
				</form>
			</div>
		</div>
	</div>

<script type="text/javascript">
	$(window).on('load', function(){

		scrollInForm();


		$("#food-challenge-sub").on("submit", function(e){
			e.preventDefault();
			scrollOutForm();

			$.ajax({
				url: "./sendSubmission.php",
			    type: "POST",
			    data: $("#food-challenge-sub").serialize(),
			    success: function(data){
			      if(data === "true"){
			        displaySuccess();
			      }else{
			        displayError();
			      }
			    },
			    error: function(e){
			      console.log("ERROR" + e);
			      alert("ERROR: No Data Was Able to be Obtained")
			    }
			});
		});


		//handle hamburger collapse animation
		$("#nav-button").click(function(){
			let button = $("#nav-button");
	
			if(button[0]['className'] == "hamburger hamburger--collapse"){
				$(this).addClass("is-active");
				showNavOptions();
			}else if(button[0]['className'] == "hamburger hamburger--collapse is-active"){
				$(this).removeClass("is-active");
				hideNavOptions();
			}
		});

		function showNavOptions(){
			$("#nav-links").show();

			$("#nav-links").animate({
				padding: "300px",
				opacity: "1"
			});
		}

		function hideNavOptions(){
			$("#nav-links").animate({
				padding: "0px",
				opacity: "0"
			}, () => $("#nav-links").hide());

			// $("#nav-links").hide();
		}

		function displaySuccess(){
			let grandparent = $("#success-message");
			let parent = $("#success-content");

			let content = $([
				"<div id='success'>",
					"<p>Your submission was submitted succesfully!</p>",
				"</div>",
				"<p>Thanks for submitting a challenge! We appreciate your participation!</p>",
				"<button id='submit-again>GOT ANOTHER?</button>"
				].join("\n"));

			content.appendTo(parent);

			$(parent).show("slow");
			
		}

		function displayError(){
			let grandparent = $("#success-message");
			let parent = $("#success-content");

			let content = $([
				"<div id='error'>",
					"<p>Your submission wasn't able to be submitted succesfully! most likely because it has already been submitted by another person.</p>",
				"</div>",
				"<p>We appreciate you taking the time to submit a challenge, but someones already got it handled. Make sure to come back if you find any others out there!</p>",
				"<button id='submit-again>GOT ANOTHER?</button>"
				].join("\n"));

			content.appendTo(parent);

			$(parent).show("slow");
			
		}

		function scrollInForm(){
			$("#submission-wrap").animate({
				marginTop: "0%"
			}, 400);
		}

		function scrollOutForm(){
			$("#submission-wrap").animate({
				marginTop: "200%"
			}, 400);
		}

	});

</script>
</body>
</html>