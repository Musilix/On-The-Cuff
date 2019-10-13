<?php
	session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Saved Challenges</title>
	<meta charset="utf-8">
	<meta name="author" content="Kareem Shehab">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" href="./assets/icons/burger-icon.ico">
	<meta property="og:image" content="./assets/images/burger-preview.png" />

	<!-- styles -->
	<link href="./assets/hamburgers-master/dist/hamburgers.min.css?v=1.1" rel="stylesheet">
	<!-- <link rel="stylesheet" type="text/css" href="./styles.css?v=1.1"> -->

	<!-- fonts -->
	<link href="https://fonts.googleapis.com/css?family=Asap|Inconsolata|Karla" rel="stylesheet">

	<!-- scripts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/jquery-ui.min.js"></script>
</head>

<style type="text/css">
	html, body{
		padding: 0;
		margin: 0;

		width: 100%;
		height: 100%;

		background-color: #EBEBD3;
	}



	#total-page-wrap{
		height: 100%;
		width: 100%;

		position: relative;
		overflow: hidden;
		z-index: 1;
	}

	 @font-face{
        font-family:"Bebas Neue W01 Regular";
        src:url("./assets/webfonts/Fonts/1444649/3d9ec9a9-76a2-4cfe-b376-76e7340c3b50.eot?#iefix");
        src:url("./assets/webfonts/Fonts/1444649/3d9ec9a9-76a2-4cfe-b376-76e7340c3b50.eot?#iefix") format("eot"),url("./assets/webfonts/Fonts/1444649/e0d6f852-5401-4bbf-9672-47a50c5c87c6.woff2") format("woff2"),url("./assets/webfonts/Fonts/1444649/7fedd582-6ae3-4850-be2f-4acae2e74fa5.woff") format("woff"),url("./assets/webfonts/Fonts/1444649/d6e08ef3-40db-4ac3-82df-f062f55a72f5.ttf") format("truetype");
    }

	#nav-wrap{
		width: 100%;
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-orient: horizontal;
		-webkit-box-direction: normal;
		 -ms-flex-direction: row;
		 flex-direction: row;

		-webkit-box-pack: justify;

		-ms-flex-pack: justify;

		justify-content: space-between;

		padding: 15px 0px 15px 0px;
	}

	#logo, #nav-bar{
		padding: 0px 35px;
	}

	#logo{
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;

		-webkit-box-pack: center;

		-ms-flex-pack: center;

		justify-content: center;
		-webkit-box-align: center;
		-ms-flex-align: center;
		 align-items: center;

		 filter: invert(100%);
	}

	#nav-bar{
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;

		-webkit-box-pack: center;

		    -ms-flex-pack: center;

		        justify-content: center;
		-webkit-box-align: center;
		    -ms-flex-align: center;
		        align-items: center;
	}

	#nav-links{
		display: none;
		background-color: #353b48;
	    padding: 0px;
	    width: 0px;
	    height: 0px;
	    position: absolute;
	    border-radius: 9999px;

	    z-index: 90;
	}

	#nav-button{
		z-index: 100;
	}

	#username{
		left: -90px;
		position: relative;
		color: #ff793f;
	}

	#saved{
		left: -20px;
		position: relative;
	}

	#post{
		left: 5px;
		position: relative;
	}

	#log{
		left: 40px;
		position: relative;
		width: fit-content;
	}

	#user-choices{
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;

		position: absolute;
	    left: 10%;
	    top: 57%;

		-webkit-box-orient: vertical;

		-webkit-box-direction: normal;

		-ms-flex-direction: column;

		 flex-direction: column;

	}

	#user-choices p{
		text-align: center;

		margin: 0px 10px;

		font-size: 22px;
		font-family: "Inconsolata";

		padding: 10px 0px;
	}

	#user-choices a{
		color: #F4D35E;
		text-decoration: none;

		-webkit-transition: color .3s ease-in;

		-o-transition: color .3s ease-in;

		transition: color .3s ease-in;
	}

	#user-choices a::after{
		content: '';
		width: 0;
		height: 1px;
		display: block;
		background: #F4D35E;

		-webkit-transition: width .3s;

		-o-transition: width .3s;

		transition: width .3s;
	}

	#user-choices a:hover::after{
		width: 100%;
	}

	#user-choices a:hover{
		color: #8FB8ED;
	}


	#text-input{
		display: flex;
		flex-direction: row;
	}

	#content-wrap{
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-orient: horizontal;
		-webkit-box-direction: normal;
		    -ms-flex-direction: row;
		        flex-direction: row;

		width: 100%;
		height: 80%;

		
/*
		background-size: 200% 100%;
		background-image: linear-gradient(to left, #DA4167 50%, #EBEBD3 50%);*/
	}

	#use-button{
		border: none;
		padding: 0;
		}


	#total-events-wrap{
		height: 75%;
		width: 100%;

		display: flex;
		flex-direction: row;
		flex-wrap: wrap;

		justify-content: center;
		align-items: center;

		overflow: auto;

		padding: 75px 0px 50px 0px;
	}

	.event-wrap{
		width: 400px;
		height: 270px;

		background-color: #F76C6C;

		display: flex;
		flex-direction: column;
		justify-content: space-between;

		/*border: .5px solid #576574;*/
		border-radius: 3.5px;

		/*padding: 10px;*/
		margin: 30px;

		z-index: 0;
	}

	#challenge-info{
		color: #2e3131;
		padding: 10px 10px 25px 10px;
		border-radius: 3.5px 3.5px 0px 0px;
	}

	#challenge-info h2{
		font-size: 26px;
		font-family: "Asap";

	}

	#challenge-info p{
		font-size: 16px;
		font-family: "Inconsolata";
		margin: 0;
	}

	#loc-details{
		background-color: #374785;
		font-size: 13px;
		font-family: "Karla";

		color: #EBEBD3;

		/*padding: 5px 0px 10px 15px;*/

		/*border-right: .5px solid #576574;*/
		border-left: .5px solid #576574;
		border-bottom: .45px solid #576574;

		border-radius: 0px 0px 3.5px 3.5px;

		z-index: 2;
	}

	#loc-details p{
		margin: 5px;
		padding: 5px 0px 0px 0px;
	}

	.save-wrap{
		/*width: 100%;
		height: 90%;*/
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.save-button{
		display: none;
		width: 50%;
	}

	#remove-button{
	  font-family: "Inconsolata";
      font-size: 23px;
      color: #2e3131;

      padding: 15px;
      margin: 15px 0px;

      border: none;
      border-radius: 4px;

      width: 100%;

      background-color: #F76C6C;
      transition: background-color .2s;
	}

	#remove-button:hover{
		cursor: pointer;
		background-color: #b73333;
	}

	.feed-message{
		width: 100%;
		height: 25px;

		display: flex;
		justify-content: center;
		align-items: center;

		text-align: center;

		font-family: "Inconsolata";

		/*display: none;*/
	}


	.success{
		font-size: 16px !important;

		color: rgba(39, 174, 96,1.0);
        background-color: rgba(46, 204, 113,.4);

        padding: 10px;

        border: 1px solid #27ae60;

        border-radius: 4.5px;
        text-align: center;


	}

	.error{
		font-size: 16px !important;

		color: rgba(192, 57, 43,1.0);
        background-color: rgba(231, 76, 60,.4);

        padding: 10px;

        border: 1px solid rgba(192, 57, 43,1.0);

        border-radius: 4.5px;
        text-align: center;


	}

</style>
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
              				include("connect.php");

              				if(isset($_SESSION['user'])){
                				echo "<p id='username'>" . strtoupper($_SESSION['user']) . "</p>" .
									 "<p id='post'><a href='./postChallenge.php'>POST A CHALLENGE</a></p>" .
									 "<p id='log'><a href='./signOutUser.php'>LOG OUT</a></p>";
							}else{
								echo "<p id='log'><a href='./signInUser.php'>LOG IN</a></p>";
							}
						?>
					</nav>
				</div>
			</div>
		</div>
		<div id="total-events-wrap">
			<?php

				$stmt = $conn->prepare("SELECT * FROM savedChallenges WHERE username = ?");
				$stmt->bind_param("s", $_SESSION['user']);

				if($stmt->execute()){
					$results = $stmt->get_result();
					handleResults($results);
					$stmt->close();
				}else{
					echo "There was an searching the DB... oopz";
				}

				function handleResults($res){
					foreach($res as $place){
						createHTMLObj($place);
					}
				}


				function createHTMLObj($place){
					echo "<div class='event-wrap' id='". $place['ID'] ."'>" .
						 	"<div id='challenge-info'>" .
						 		"<h2>" . str_replace("'", "",$place['challenge_name']) . "</h2>" .
						 		"<p>" . str_replace("'", "",$place['challenge_desc']) . "</p>" .
						 	"</div>" .
						 	"<div id='loc-details'>" .
						 		"<p>" . $place['restaurant_name'] . "</p>" .
						 		"<p>" . $place['address'] . ", ". $place['city'] . ", " . $place['state'] . "</p>" .
						 		"<div class='save-wrap'>
						 			<div class='save-button'> 
						 				<form action='./removeChallenge.php' method='post' id='remove-challenge-form' class='". $place['ID'] ."'>
						 					<input type='hidden' id='chall_name' name='challenge_name' value='" . str_replace("'", "",$place['challenge_name']) . "'>
						 					<input type='hidden' id='chall_desc' name='restaurant_name' value='" . str_replace("'", "",$place['restaurant_name'])  . "'>
						 					<input type='submit' id='remove-button' value='REMOVE' required/>".
						 					"<div class='feed-message' id='" . $place['ID'] . "'></div>
						 				</form>
						 			</div> 
						 		</div>" .
						 	"</div>" .
						 "</div>";
				}
			?>
		</div>
		

	</div>
<script type="text/javascript">
	$(window).on('load', function(){
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
		// $('body').on('submit', '#remove-challenge-form', function (e) {
		// 	let feed_message = $(this).find("div.feed-message");
			
		// 	let currForm = $(feed_message).attr("id");
		// 	let dest = "#" + currForm + ".feed-message";
		// 	$(dest).empty();

		// 	 $.ajax({
		// 	    url: "./removeChallenge.php",
		// 	    type: "POST",
		// 	    data: $(this).serialize(),
		// 	    success: function(data){
		// 	                  if(data === "true"){
		// 	                    $message = $([
		// 	                                  "<div class='success'>Stop was removed successfully!</div>"
		// 	                                 ].join("\n"));
		// 	                  }else{
		// 	                    $message = $([
		// 	                                 "<div class='error'>For some reason, we couldn't remove the stop currently.</div>"
		// 	                                 ].join("\n"));
		// 	                  }
  //              				  $message.appendTo($(dest));
		// 	      },
		// 	      error:function(error){
		// 	        window.alert("ERROR: " + error);
		// 	        $errorMessage = $([
		// 	                  "<div class='error'>There was a problem removing the stop. Try again later.</div>"
		// 	                ].join("\n"));

		// 	        $errorMessage.appendTo(dest);
		// 	      }
		// 	  });
		// 	   e.preventDefault();
		// 	});


		$(".event-wrap").on("mouseenter", function(){
			let parent = "#" + $(this).attr("id");

			let content = $(parent).find("#challenge-info");
			let info = $(parent).find("#loc-details");

			let button = $(parent).find(".save-button");

			content.animate({
				height: "0%",
				padding: "0px"
			}, 200);

			info.animate({
				height: "92%"
			}, 200, () => button.show("fast"));
		});

		$(".event-wrap").on("mouseleave", function(){
			let parent = "#" + $(this).attr("id");
			let content = $(parent).find("#challenge-info");
			let info = $(parent).find("#loc-details");

			$("this.feed-message").empty();

			let button = $(parent).find(".save-button");

			content.animate({
				height: "80%",
				padding: "10px 10px 25px 10px"
			}, 200);

			info.animate({
				height: "20%"
			}, 200, () => button.hide());
		});
	});	

</script>
</body>
</html>