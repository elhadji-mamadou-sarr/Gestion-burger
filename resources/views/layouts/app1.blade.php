<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Burger</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- <link rel="manifest" href="site.webmanifest"> -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/assets/img/favicon.png') }}">
        <!-- Place favicon.ico in the root directory -->
    
        <!-- CSS here -->
        <link rel="stylesheet" href="{{ asset('storage/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('storage/assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('storage/assets/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('storage/assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('storage/assets/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('storage/assets/css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ asset('storage/assets/css/flaticon.css') }}">
        <link rel="stylesheet" href="{{ asset('storage/assets/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('storage/assets/css/slicknav.css') }}">
        <link rel="stylesheet" href="{{ asset('storage/assets/css/style.css') }}">
        <!-- <link rel="stylesheet" href="css/responsive.css"> -->
    </head>
    <body class="font-sans antialiased">
    

            <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-5 col-lg-5">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="{{ route('welcome') }}">Accueil</a></li>
                                        <li><a href="{{ route('menu') }}">Menu</a></li>
                                        <li><a href="">About</a></li>
                                        <li><a href="">Contact</a></li>
                                        
                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="index.html">
                                    <img src="{{ asset('storage/assets/img/logo.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 d-none d-lg-block">
                            <div class="book_room">
                                <div class="socail_links">
                                    <ul>
                                        <li><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> Connexion</a></li>
                                        <li><a href="{{ route('register') }}"><i class="fa fa-user-plus"></i> Inscription</a></li>
                                    </ul>
                                </div>
                                <div class="book_btn d-none d-xl-block">
                                    <a class="cart-link" href="{{ route('cart.show') }}">
                                        <i class="fa fa-shopping-basket"></i>
                                        <span class="cart-count">{{ cartCount() }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>

        <!-- instragram_area_start -->
    <div class="instragram_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single_instagram">
                        <img src="img/instragram/1.png" alt="">
                        <div class="ovrelay">
                            <a href="#">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single_instagram">
                        <img src="img/instragram/2.png" alt="">
                        <div class="ovrelay">
                            <a href="#">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single_instagram">
                        <img src="img/instragram/3.png" alt="">
                        <div class="ovrelay">
                            <a href="#">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single_instagram">
                        <img src="img/instragram/4.png" alt="">
                        <div class="ovrelay">
                            <a href="#">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- instragram_area_end -->
    
        <footer class="footer">
                <div class="footer_top">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-4 col-md-6 col-lg-4">
                                <div class="footer_widget text-center ">
                                    <h3 class="footer_title pos_margin">
                                            New York
                                    </h3>
                                    <p>5th flora, 700/D kings road, <br> 
                                            green lane New York-1782 <br>
                                            <a href="#">info@burger.com</a></p>
                                    <a class="number" href="#">+10 378 483 6782</a>
        
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-lg-4">
                                <div class="footer_widget text-center ">
                                    <h3 class="footer_title pos_margin">
                                        California
                                    </h3>
                                    <p>5th flora, 700/D kings road, <br> 
                                            green lane New York-1782 <br>
                                            <a href="#">info@burger.com</a></p>
                                    <a class="number" href="#">+10 378 483 6782</a>
        
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-12 col-lg-4">
                                    <div class="footer_widget">
                                            <h3 class="footer_title">
                                                    Stay Connected
                                            </h3>
                                            <form action="#" class="newsletter_form">
                                                <input type="text" placeholder="Enter your mail">
                                                <button type="submit">Sign Up</button>
                                            </form>
                                            <p class="newsletter_text">Stay connect with us to get exclusive offer!</p>
                                        </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-4">
                                <div class="socail_links text-center">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <i class="ti-instagram"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="ti-twitter-alt"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="ti-facebook"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-google-plus"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copy-right_text">
                    <div class="container">
                        <div class="footer_border"></div>
                        <div class="row">
                            <div class="col-xl-12">
                                <p class="copy_right text-center">  
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
    
    
        <!-- JS here -->
        <script src="{{ asset('storage/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
        <script src="{{ asset('storage/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
        <script src="{{ asset('storage/assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('storage/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('storage/assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('storage/assets/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('storage/assets/js/ajax-form.js') }}"></script>
        <script src="{{ asset('storage/assets/js/waypoints.min.js') }}"></script>
        <script src="{{ asset('storage/assets/js/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('storage/assets/js/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('storage/assets/js/scrollIt.js') }}"></script>
        <script src="{{ asset('storage/assets/js/jquery.scrollUp.min.js') }}"></script>
        <script src="{{ asset('storage/assets/js/wow.min.js') }}"></script>
        <script src="{{ asset('storage/assets/js/nice-select.min.js') }}"></script>
        <script src="{{ asset('storage/assets/js/jquery.slicknav.min.js') }}"></script>
        <script src="{{ asset('storage/assets/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('storage/assets/js/plugins.js') }}"></script>
    
        <!--contact js-->
        <script src="{{ asset('storage/assets/js/contact.js') }}"></script>
        <script src="{{ asset('storage/assets/js/jquery.form.js') }}"></script>
        <script src="{{ asset('storage/assets/js/jquery.form.js') }}"></script>
        <script src="{{ asset('storage/assets/js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('storage/assets/js/mail-script.js') }}"></script>
    
        <script src="{{ asset('storage/assets/js/main.js') }}"></script>
    
        <script>
            document.querySelectorAll('.add-to-cart-form').forEach(form => {
                form.addEventListener('submit', async (e) => {
                    e.preventDefault();
                    
                    const response = await fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            product_id: form.querySelector('input[name="product_id"]').value,
                            quantity: form.querySelector('input[name="quantity"]').value
                        })
                    });
            
                    const data = await response.json();
                    if(data.success) {
                        document.querySelectorAll('.cart-count').forEach(span => {
                            span.textContent = data.cart_count;
                        });
                    }
                });
            });
            </script>
    </body>
</html>
