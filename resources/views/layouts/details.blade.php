<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('assets/img/logo/icon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @livewireStyles
</head>
<body>

    {{ $slot }}

    <nav class="bottom-navbar">
        <a href="/home" class="nav-link fas fa-home"></a>
        <a href="#aboutus" class="nav-link fas fa-users"></a>
        <a href="/shop" class="nav-link fas fa-store"></a>
        <a href="#testimonials" class="nav-link fas fa-comments"></a>
        <a href="#faq" class="nav-link fas fa-question"></a>
        <a href="#blogs" class="nav-link fas fa-blog"></a>
        <a href="#contactus" class="nav-link fas fa-address-book"></a>
        @if(Route::has('login'))
            @auth
                @if(Auth::user()->utype === 'ADM')
                <div class="dropup">
                    <a href="#" onclick="myFunctionUp()" class="dropbtn"><i id="icon" class="fas fa-user"></i></a>
                    <div id="myDropup" class="dropup-content">
                        <a href="#" title="{{ Auth::user()->name }}"><span class="fa-regular fa-user"></span> Admin Profile</a>
                        <a href="#"><span class="fas fa-dashboard"></span> Dashboard</a>
                        <a href="#">All Categories</a>
                        <a href="#">All Products</a>
                        <a href="#">All Orders</a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><span class="fas fa-sign-out-alt"></span> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                            @csrf
                        </form>
                    </div>
                </div>
                @else <div class="dropup">
                    <a href="#" onclick="myFunctionUp()" class="dropbtn"><i id="icon" class="fas fa-user"></i></a>
                    <div id="myDropup" class="dropup-content">
                        <a href="#" title="{{ Auth::user()->name }}"><span class="fa-regular fa-user"></span> User Profile</a>
                        <a href="#"><span class="fas fa-dashboard"></span> Dashboard</a>
                        <a href="#">My Orders</a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><span class="fas fa-sign-out-alt"></span> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                            @csrf
                        </form>
                    </div>
                </div>
                @endif
            @endif

        @endif
    </nav>

    <footer class="footer" id="aboutus">
        <div class="footer-content">
          <div class="footer-section">
            <h4>About Us</h4>
            <p>Welcome to My Merd's Bakeshop! We're passionate about creating delectable baked goods using the finest ingredients. From artisanal bread to beautiful pastries, cupcakes, cookies, and cakes, we have something for every occasion. Our friendly staff is here to help you find the perfect treat. Thank you for choosing My Merd's Bakeshop - we can't wait to serve you!</p>
          </div>
          <div class="footer-section">
            <h4>Contact Information</h4>
            <p>Email: merdsbakeshop@gmail.com</p>
            <p>Phone: +1234567890</p>
            <p>Address: Mabuhay, Carmen, Davao del Norte</p>
          </div>
        </div>
        <div class="footer-bottom">
          <p>&copy; 2023 Merds Bakeshop. All rights reserved.</p>
        </div>
      </footer>

      <script src="{{ asset('assets/js/script.js') }}"></script>
      @livewireScripts
</body>
</html>
