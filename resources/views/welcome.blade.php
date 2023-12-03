<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome</title>
	<link rel="icon" href="assets/img/logo/icon.png">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/welcome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/loading.css') }}">
	<style type="text/css">
		body{
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			background-color: #fff;
			background-size: cover;
			background-position: center;
		}

		.container{
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			height: 100vh;
			text-align: center;
			background-image: url("assets/img/bg.jpg");
			background-size: cover;
			background-position: center;
		}

		.logo-img{
		    width: 300px;
		    height: 300px;
		    position: relative;
		    max-width: 100%;
		    object-fit: contain;
		    display: block;
		    margin: auto;
		    mix-blend-mode: multiply;
		}

		main{
			margin-bottom: 100px;
		}

	</style>
</head>
<body>

    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

	<div class="container">
		<picture>
		    <img src="assets/img/logo/logo.png" class="logo-img">
		 </picture>
		<main>
			<h1>Welcome to my Bakeshop!</h1>
			<a href="{{ route('login') }}" class="btn">Sign In</a>
			<a href="{{ route('register') }}" class="btn">Sign Up</a>
		</main>
	</div>

    <script src="{{ asset('assets/js/loading.js') }}"></script>
</body>
</html>
