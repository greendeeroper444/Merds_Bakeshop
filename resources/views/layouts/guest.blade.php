<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
	<link rel="icon" href="assets/img/logo/icon.png">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/welcome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/loading.css') }}">
	<style type="text/css">
		html, body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url("assets/img/bg.jpg");
            background-size: cover;
            background-position: center;
            overflow-x: hidden;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }
	</style>
    @livewireStyles
</head>
<body>

    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

	<div class="container">
		{{ $slot }}
	</div>

    <script>
        function togglePasswordVisibility() {
    const passwordInput = document.getElementById('password');
    const togglePassword = document.querySelector('.toggle-password');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        togglePassword.classList.add('active');
    } else {
        passwordInput.type = 'password';
        togglePassword.classList.remove('active');
    }
}

    </script>
    <script src="{{ asset('assets/js/loading.js') }}"></script>
    @livewireScripts
</body>
</html>
