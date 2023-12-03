<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta2/css/all.css" integrity="xxxxx" crossorigin="anonymous">
    <link rel="icon" href="{{ asset('assets/img/logo/icon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/messenger.css') }}">
    @livewireStyles
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Merds Messenger</h1>
        </div>
        {{ $slot }}
    </div>

    <script src="{{ asset('assets/js/messenger.js') }}"></script>
    @livewireScripts
</body>
</html>
