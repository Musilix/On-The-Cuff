<?php
    session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>On The Cuff</title>
	<meta charset="utf-8">
	<meta name="author" content="Kareem Shehab">
	<meta name="description" content="Ever feeling hungry? Don't feel like spending any more money? Well, On the Cuff is here to provide you with a means to FREE food around you! Search through events happening near you hosting free food to get a free bite and maybe even learn abouta new interesting subject!">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" href="./assets/icons/burger-icon.ico">
	<meta property="og:image" content="./assets/images/burger-preview.png" />

	<!-- styles -->
	<link href="./assets/hamburgers-master/dist/hamburgers.min.css?v=1.1" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./styles.css?v=1.1">

	<!-- fonts -->
	<link href="https://fonts.googleapis.com/css?family=Asap|Inconsolata|Anton" rel="stylesheet">

	<!-- scripts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/jquery-ui.min.js"></script>

</head>

<body>
	<div id="total-page-wrap">

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
              				if(isset($_SESSION['user'])){
                				echo "<p id='username'>" . $_SESSION['user'] . "</p>" .
									 "<p id='saved'><a href='./savedChallenges.php'>SAVED CHALLENGES</a></p>" .
									 "<p id='post'><a href='./postChallenge.php'>POST A CHALLENGE</a></p>" .
									 "<p id='log'><a href='./signOutUser.php'>LOG OUT</a></p>";
							}else{
								echo "<p><a href='./sign_in_page.php'>LOG IN</a></p>";
							}
						?>
					</nav>
				</div>
			</div>
		</div>

		<div id="content-wrap">
			<div id="content-left">
				<p id="slogan">DO YOU LOVE EATING? WHY NOT PUT YOUR SKILLS TO THE TEST?</p>
			</div>

			<div id="content-right">
				<div id="form-wrap">
					<p>Find food eating challenges & competitions near you.</p>
					<!-- <h2>we need to know where you are to find that sustenance</h2> -->
					<form id="search-near-you" method="post" action="./searchAround.php">
						<div id="full-search-bar">
							<div id="search-bar">
								<div id="location-pin">
									<img src="./assets/images/location-ping.svg">
								</div>

								<div id="full-real-search-bar">
									<div id="search-conent">
										<div id="text-input">
											<input id="location" type="text" name="location" autocomplete="off" placeholder="Enter your address..." required/>
										</div>
										<div id="geo-suggestions">
											<ul id="geo-suggest-list"></ul>
										</div>
									</div>

									<!-- <div class="clear-search-button">
										<img src="./assets/images/clear-search.svg">
									</div> -->
								</div>
							</div>

							<button id="use-button" type="submit" style="width:fit-content">
								<div id="search-button" class="search-around-button">
									<img src="./assets/images/submit-icon.svg">
								</div>
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>


		<!-- <div class="utensil">
			<img id="fork" src="./assets/images/fork2.png">
		</div> -->
	</div>

<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvwZM2vImppwpT1DK0Z5BQWwla_yJVdbQ&sensor=false&libraries=places"
  type="text/javascript"></script> -->
  <script type="text/javascript" async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvwZM2vImppwpT1DK0Z5BQWwla_yJVdbQ&libraries=places"></script>
</body>

<script type="text/javascript">
	$(window).on('load', function(){

		animateSlogan();
		setTimeout(() => {animateIntro();}, 700);


		//setting up google autocomplete API
		let defaultBounds = new google.maps.LatLngBounds(
		new google.maps.LatLng(34.958247, -85.590014),
		new google.maps.LatLng(30.919937, -80.668089));

		let input = document.getElementById("location");
		let options = {
		  bounds: defaultBounds,
		  types: ['address']
		};

		autocomplete = new google.maps.places.Autocomplete(input, options);

		function geolocate() {
		  if (navigator.geolocation) {
		    navigator.geolocation.getCurrentPosition(function(position) {
		      let geolocation = {
		        lat: position.coords.latitude,
		        lng: position.coords.longitude
		      };

		      let circle = new google.maps.Circle({
		      	center: geolocation, radius: position.coords.accuracy
		      });
		      
		      autocomplete.setBounds(circle.getBounds());
		    });
		  }
		}

		//handle hamburger collapse animation
		$("#nav-button").click(function(){
			let button = $("#nav-button");
			console.log(button[0]['className']);
			if(button[0]['className'] == "hamburger hamburger--collapse"){
				$(this).addClass("is-active");
				showNavOptions();
			}else if(button[0]['className'] == "hamburger hamburger--collapse is-active"){
				$(this).removeClass("is-active");
				hideNavOptions();
			}
		});

		//initial slide in animations on page load
		function animateSlogan(){
			$("#slogan").animate({
				opacity: "1"
			}, 500);
		}

		function animateIntro(){
			$("html, body").animate({
				'background-position-x': "-100%",
				'background-position-y': "0"
			}, 750).delay(10000);

			$("#slogan").animate({
				color: "#F4D35E"
			},500).delay(10000);

			$("#nav-wrap").animate({
				opacity: "1"
			}, 500).delay(10000);
		}

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

		// AIzaSyCvwZM2vImppwpT1DK0Z5BQWwla_yJVdbQ



	});

</script>

</html>