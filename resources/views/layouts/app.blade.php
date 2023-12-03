<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('assets/img/logo/icon.png') }}">
    <!-- cdn link -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta2/css/all.css">
    <!-- custom css file link -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiperhttps.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-customize.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/comments.css') }}">
    @livewireStyles
</head>
<body>

<!-- header start -->

<header class="header">
    <div class="header-1">
        <a href="#" class="logo" title="Meriam & Greendee">
            <img src="assets/img/logo/logo.png">
        </a>
        @livewire('header-search-component')
        <div class="icons">
            <div id="search-btn" class="fas fa-search"></div>
            @livewire('wishlist-count-component')
            @livewire('cart-count-component')
            <a href="/messenger" title="Messages" class="fa-solid fa-messages">
                <span class="index">2</span>
            </a>
        </div>
    </div>


    <div class="header-2">
        <nav class="navbar">
            <a href="/home" class="nav-link">Home</a>
            <a href="/aboutus" class="nav-link">About us</a>
            <a href="/shop" class="nav-link">Shop</a>
            <a href="/comments" class="nav-link">Comments</a>
            <a href="/faq" class="nav-link">FAQ</a>
            <a href="/blogs" class="nav-link">Blogs</a>
            <a href="/contactus" class="nav-link">Contact us</a>
            @if(Route::has('login'))
                @auth
                    @if(Auth::user()->utype ==='ADM')
                    <div class="dropdown">
                        <a href="#" onclick="myFunctionDown()" class="dropbtn">My account <i id="icon" class="fas fa-caret-down"></i></a>
                        <div id="myDropdown" class="dropdown-content">
                            <a href="/profile" title="{{ Auth::user()->name }}"><span class="fas fa-user"></span> My Profile</a>
                            <a href="/admin/dashboard"><span class="fas fa-dashboard"></span> Dashboard</a>
                            <a href="/admin/categories"><span class="fas fa-grid-2"></span> All Categories</a>
                            <a href="/admin/products"><span class="fas fa-box-open"></span> All Products</a>
                            <a href="#"><span class="fas fa-cart-circle-check"></span> All Orders</a>
                            <a href="#" class="border-logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <span class="fas fa-sign-out-alt"></span> Sign out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                                @csrf
                            </form>
                        </div>
                    </div>
                    @else
                    <div class="dropdown">
                        <a href="#" onclick="myFunctionDown()" class="dropbtn">My account <i id="icon" class="fas fa-caret-down"></i></a>
                        <div id="myDropdown" class="dropdown-content">
                            <a href="/profile" title="{{ Auth::user()->name }}"><span class="fas fa-user"></span> My Profile</a>
                            <a href="/user/dashboard"><span class="fas fa-dashboard"></span> Dashboard</a>
                            <a href="#"><span class="fas fa-cart-circle-check"></span> My Orders</a>
                            <a href="#" class="border-logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <span class="fas fa-sign-out-alt"></span> Sign out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                                @csrf
                            </form>
                        </div>
                    </div>
                    @endif
                @endauth
            @endif
        </nav>
    </div>

</header>

<!-- header end -->

<div class="container" id="content-container">
    {{ $slot }}
</div>

<!-- bottom navbar -->

<nav class="bottom-navbar">
    <a href="/home" title="Home" class="nav-link fas fa-home"></a>
    <a href="/aboutus" title="About us" class="nav-link fas fa-users"></a>
    <a href="/shop" title="Shop" class="nav-link fas fa-store"></a>
    <a href="/comments" title="Comments" class="nav-link fas fa-comments"></a>
    <a href="/faq" title="FAQ" class="nav-link fas fa-question"></a>
    <a href="/blogs" title="Blogs" class="nav-link fas fa-blog"></a>
    <a href="/contactus" title="Contact us" class="nav-link fas fa-address-book"></a>
    @if(Route::has('login'))
        @auth
            @if(Auth::user()->utype === 'ADM')
            <div class="dropup">
                <a href="#" onclick="myFunctionUp()" class="dropbtn">
                    <i id="icon" class="fas fa-user" title="My account"></i>
                </a>
                <div id="myDropup" class="dropup-content">
                    <a href="/profile" title="{{ Auth::user()->name }}"><span class="fas fa-user"></span> My Profile</a>
                    <a href="/admin/dashboard"><span class="fas fa-dashboard"></span> Dashboard</a>
                    <a href="/admin/categories"><span class="fas fa-grid-2"></span> All Categories</a>
                    <a href="/admin/products"><span class="fas fa-box-open"></span> All Products</a>
                    <a href="#"><span class="fas fa-cart-circle-check"></span> All Orders</a>
                    <a href="#" class="border-logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <span class="fas fa-sign-out-alt"></span> Sign out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                        @csrf
                    </form>
                </div>
            </div>
            @else <div class="dropup">
                <a href="#" onclick="myFunctionUp()" class="dropbtn">
                    <i id="icon" class="fas fa-user" title="My account">
                        </i></a>
                <div id="myDropup" class="dropup-content">
                    <a href="/profile" title="{{ Auth::user()->name }}"><span class="fas fa-user"></span> My Profile</a>
                    <a href="/user/dashboard"><span class="fas fa-dashboard"></span> Dashboard</a>
                    <a href="#"><span class="fas fa-cart-circle-check"></span> My Orders</a>
                    <a href="#" class="border-logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <span class="fas fa-sign-out-alt"></span> Sign out
                    </a>
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


<!-- end navbar -->
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        var links = document.querySelectorAll('.nav-link');
        links.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                var url = this.getAttribute('href');
                loadPage(url);
            });
        });

        var addToCartButtons = document.querySelectorAll('.add-to-cart');
        addToCartButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                var productId = this.getAttribute('data-product-id');
                Livewire.emit('addToCart', productId);
            });
        });
    });

    function loadPage(url) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var responseHTML = xhr.responseText;
                    var tempDiv = document.createElement('div');
                    tempDiv.innerHTML = responseHTML;
                    var newContent = tempDiv.querySelector('#content-container').innerHTML;
                    var container = document.getElementById('content-container');
                    container.innerHTML = newContent;

                    // Reattach event listeners for newly loaded content
                    var addToCartButtons = container.querySelectorAll('.add-to-cart');
                    addToCartButtons.forEach(function(button) {
                        button.addEventListener('click', function(event) {
                            event.preventDefault();
                            var productId = this.getAttribute('data-product-id');
                            Livewire.emit('addToCart', productId);
                        });
                    });
                } else {
                    console.log('Error loading page. Status code: ' + xhr.status);
                }
            }
        };
        xhr.send();
        history.pushState(null, '', url); // Update the URL without reloading the page
    }
</script> --}}
    @stack('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/js/swiperhttps.js') }}"></script>
    <!-- js file link -->
    <script src="{{ asset('assets/js/jQuery.js') }}"></script>
    <script src="{{ asset('assets/js/function.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/norefresh.js') }}"></script>

    @livewireScripts
</body>
</html>
