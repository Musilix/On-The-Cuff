<!DOCTYPE html>
<html>
<head>
	<title>On The Cuff</title>
	<meta charset="utf-8">
	<meta name="author" content="Kareem Shehab">
	<meta name="description" content="Ever feeling hungry? Don't feel like spending any more money? Well, On the Cuff is here to provide you with a means to FREE food around you! Search through events happening near you hosting free food to get a free bite and maybe even learn abouta new interesting subject!">
	<meta name="viewport" content="width: device-width, intial-scale=1.0">

	<link rel="icon" href="./assets/icons/burger-icon.ico">

	<!-- styles -->

	<!-- fonts -->
	<link href="https://fonts.googleapis.com/css?family=Asap|Inconsolata|Anton" rel="stylesheet">

	<!-- scripts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/jquery-ui.min.js"></script>

</head>

<style type="text/css">
	html, body{
		margin: 0;
		padding: 0;

		height: 100%;
		width: 100%;

		background-color: #EBEBD3;

		font-family: 'Inconsolata';


		background-size: 200% 100%;
		background-image: linear-gradient(to left, #DA4167 50%, #EBEBD3 50%);
	}

	#total-page-wrap{
		height: 100%;
		width: 100%;
	}

	 @font-face{
        font-family:"Bebas Neue W01 Regular";
        src:url("./assets/webfonts/Fonts/1444649/3d9ec9a9-76a2-4cfe-b376-76e7340c3b50.eot?#iefix");
        src:url("./assets/webfonts/Fonts/1444649/3d9ec9a9-76a2-4cfe-b376-76e7340c3b50.eot?#iefix") format("eot"),url("./assets/webfonts/Fonts/1444649/e0d6f852-5401-4bbf-9672-47a50c5c87c6.woff2") format("woff2"),url("./assets/webfonts/Fonts/1444649/7fedd582-6ae3-4850-be2f-4acae2e74fa5.woff") format("woff"),url("./assets/webfonts/Fonts/1444649/d6e08ef3-40db-4ac3-82df-f062f55a72f5.ttf") format("truetype");
    }

	#nav-wrap{
		display: flex;
		flex-direction: row;

		justify-content: space-around;

		padding: 35px 0px 15px 0px;

		opacity: 0;
	}

	#logo, #nav-bar{
		padding: 0px 25px;
	}

	#logo{
		display: flex;

		justify-content: center;
		align-items: center;
	}

	#nav-bar{
		display: flex;

		justify-content: center;
		align-items: center;
	}

	#user-choices{
		display: flex;

		flex-direction: row;

	}

	#user-choices p{
		text-align: center;

		margin: 0px 10px;

		font-size: 22px;
	}

	#user-choices a{
		color: #F4D35E;
		text-decoration: none;

		transition: color .3s ease-in;
	}

	#user-choices a::after{
		content: '';
		width: 0;
		height: 1px;
		display: block;
		background: #F4D35E;

		transition: width .3s;
	}

	#user-choices a:hover::after{
		width: 100%;
	}

	#user-choices a:hover{
		color: #083D77;
	}

	.utensil{
		display: inline-block;
		position: relative;
	}

	#fork{
		bottom: 100%;
	}

	#content-wrap{
		display: flex;
		flex-direction: row;

		width: 100%;
		height: 100%;
/*
		background-size: 200% 100%;
		background-image: linear-gradient(to left, #DA4167 50%, #EBEBD3 50%);*/
	}

	#content-left, #content-right{
		display: flex;

		justify-content: center;
		align-items: center;

		width: 50%;
	}

	#content-left p{
		font-family: 'Bebas Neue W01 Regular';
		font-size: 6vw;

		padding: 0px 105px;
		margin: 0;

		color: #DA4167;
	}


	@media only screen and (max-width: 600px) {

	}

</style>

<body>
	<div id="total-page-wrap">

		<div id="nav-wrap">
			<div id="logo">
				<img src="./assets/images/logo2.svg" width="140px" height="50px">
			</div>
			<div id="nav-bar">
				<nav id="user-choices">
					<p><a href="./somewhere">ABOUT</a> </p>
					<p><a href="./somewhere">ACCOUNT</a> </p>
					<p><a href="./somewhere">CONTACT</a> </p>
				</nav>
			</div>
		</div>

		<div id="content-wrap">
			<div id="content-left">
				<p id="slogan">FIND EVENTS HOSTING FREE FOOD AND FUN TIMES NEAR YOU</p>
			</div>

			<div id="content-right">

			</div>
		</div>
	</div>
</body>

<script type="text/javascript">
	$(window).on('load', function(){
		console.log("works");

		$("html, body").animate({
			'background-position-x': "-100%",
			'background-position-y': "0"
		}, 750);

		$("#slogan").animate({
			color: "#F4D35E"
		});

		$("#nav-wrap").animate({
			opacity: "1"
		}, 500);


	});

</script>

</html>