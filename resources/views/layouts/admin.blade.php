<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('assets/img/logo/icon.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta2/css/all.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-customize.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    @livewireStyles
</head>
<body>

    <header class="header">
        <form action="" method="GET" class="search-form">
            <input type="search" name="query" placeholder="Search here..." id="search-box" autocomplete="off">
            <label for="search-box" class="fas fa-search"></label>
        </form>
        @if(Route::has('login'))
            @auth
                @if(Auth::user()->utype === 'ADM')
                    <div class="user-info-user" onclick="toggleDropdownMenuDrop()">
                        <img src="{{ asset('assets/img/avatars/avatar_' . auth()->id() . '.' . (file_exists(public_path('assets/img/avatars/avatar_' . auth()->id() . '.png')) ? 'png' : 'jpg')) }}" alt="{{ auth()->user()->name }} Avatar">
                        <span class="user-name-user">{{ Auth::user()->name }}</span>
                        <div class="dropdown-menu-drop">
                            <ul>
                                <li><a href="/profile">My Profile</a></li>
                                <li><a href="#">Settings</a></li>
                                <li>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                                    @csrf
                                </form>
                            </ul>
                        </div>
                    </div>
                @endif
            @endauth
        @endif
    </header>

    <div class="overflow">
        <div class="sidebar">
            <a class="nav-link" href="/home"><span class="fas fa-home"></span> Home</a>
            <a class="nav-link" href="/admin/dashboard"><span class="fas fa-dashboard"></span> Dashboard</a>
            <a class="nav-link" href="/admin/categories"><span class="fas fa-grid-2"></span> Categories</a>
            <a class="nav-link" href="/admin/products"><span class="fas fa-box-open"></span> Products</a>
            <a class="nav-link" href="#"><span class="fas fa-cart-circle-check"></span> Orders</a>
            <a class="nav-link" href="#settings"><span class="fas fa-gear"></span> Settings</a>
        </div>
    </div>

    <div class="content">
    {{ $slot }}
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
    <script src="{{ asset('assets/js/bootstrap-5.js') }}"></script>
    <script src="{{ asset('assets/js/admin.js') }}"></script>
    <script src="{{ asset('js/livewire-toast.js') }}"></script>

    @livewireScripts
    @yield('script')
</body>
</html>
