<!doctype html>
<html class="no-js" lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Farm2Home - Agriculture and Organic Food</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="/frontend/img/favicon.png">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="/frontend/css/bootstrap.min.css">
        <link rel="stylesheet" href="/frontend/css/animate.min.css">
        <link rel="stylesheet" href="/frontend/css/magnific-popup.css">
        <link rel="stylesheet" href="/frontend/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="/frontend/css/owl.carousel.min.css">
        <link rel="stylesheet" href="/frontend/css/odometer.css">
        <link rel="stylesheet" href="/frontend/css/jquery-ui.css">
        <link rel="stylesheet" href="/frontend/css/flaticon.css">
        <link rel="stylesheet" href="/frontend/css/aos.css">
        <link rel="stylesheet" href="/frontend/css/slick.css">
        <link rel="stylesheet" href="/frontend/css/default.css">
        <link rel="stylesheet" href="/frontend/css/style.css">
        <link rel="stylesheet" href="/frontend/css/responsive.css">
    </head>
    <body>

        <!-- preloader -->
        <div id="preloader">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                </div>
            </div>
        </div>
        <!-- preloader-end -->

		<!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        <!-- header-area -->
        <header>
            <div id="sticky-header" class="main-header menu-area transparent-header">
                <div class="container-fluid container-full">
                    <div class="row">
                        <div class="col-12">
                            <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                            <div class="menu-wrap">
                                <div class="header-bg" data-background="/frontend/img/bg/header_bg.jpg"></div>
                                <nav class="menu-nav show">
                                    <div class="logo">
                                        <a href="{{route('home')}}">
                                            <img src="/frontend/img/logo/logo.png" alt="Logo">
                                        </a>
                                    </div>
                                    <div class="navbar-wrap main-menu d-none d-lg-flex">
                                        <ul class="navigation">
                                            
                                            <li class="active dropdown"><a href="#">Carrier Menu</a>
                                                <ul class="submenu">
                                                    <li>
                                                        <a href="{{route('carrierPosts')}}">Carrier Posts</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('carrierposts.request')}}">Request Carry Post</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('carrierposts.request.buyer')}}">Carry Requests By Buyers</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                    <div class="navbar-wrap main-menu d-none d-lg-flex">
                                        <ul class="navigation">
                                            
                                            <li class="active dropdown"><a href="{{route('home')}}">Shop</a></li>
                                            
                                        </ul>
                                    </div>
                                    <div class="header-action d-none d-md-block">
                                        <ul>
                                            <li class="header-shop-cart"><a href="#"><i
                                                        class="fas fa-shopping-basket"></i><span>{{$carts->count()}}</span></a>
                                                <ul class="minicart">
                                                    @foreach($carts as $cart)
                                                        @if($cart->id != -1)
                                                        <li class="d-flex align-items-start">
                                                             <div class="cart-img">
                                                                <a href="#">
                                                                    <img src="/uploads/{{$cart->attributes->first()->product_image}}" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="cart-content">
                                                                <h4>
                                                                    <a href="#">{{$cart->attributes->first()->product_name}}</a>
                                                                </h4>
                                                                <div class="cart-price">
                                                                    <span class="new">{{$cart->price * $cart->quantity}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="del-icon">
                                                                <a href="{{route('cart.remove', $cart->id)}}">
                                                                    <i class="far fa-trash-alt"></i>
                                                                </a>
                                                            </div>
                                                        </li>
                                                        @endif
                                                    @endforeach
                                                    @foreach($carts as $cart)
                                                        @if($cart->id == -1)
                                                        
                                                        <li>
                                                            <div class="total-price">
                                                                <span class="f-left">Carrier:</span>
                                                                <span class="f-right">{{$cart->price}} <br>    {{$cart->attributes->first()->user->name.'-'.$cart->attributes->first()->user->phone_no}}</span>
                                                            </div>
                                                        </li>
                                                        
                                                        @endif
                                                    @endforeach
                                                    <li>
                                                        <div class="total-price">
                                                            <span class="f-left">Total:</span>
                                                            <span class="f-right">{{\Cart::getTotal()}}</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="checkout-link">
                                                            <a class="red-color" href="{{route('checkout')}}">Checkout</a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="checkout-link">
                                                            <a class="red-color" href="{{route('cart.clear')}}">Clear Cart</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            @if(!auth()->check())
                                                <li class="header-btn"><a href="/login" class="btn gradient-btn">Login/Register</a></li>
                                            
                                            @else
                                                <li class="header-btn"><a href="/dashboard" class="btn gradient-btn">Dashboard</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <div class="header-bottom-wrap d-none d-lg-flex">
                                <div class="header-tag-list">
                                    <ul>
                                        <li><a href="#">agriculture</a></li>
                                        <li><a href="#">food</a></li>
                                        <li><a href="#">nutrition</a></li>
                                        <li><a href="#">fruit</a></li>
                                    </ul>
                                </div>
                                <div class="header-bottom-search">
                                    <form action="#">
                                        <input type="text">
                                        <button><i class="fas fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <!-- Mobile Menu  -->
                            <div class="mobile-menu">
                                <div class="menu-backdrop"></div>
                                <div class="close-btn"><i class="fas fa-times"></i></div>

                                <nav class="menu-box">
                                    <div class="nav-logo"><a href="index.html"><img src="/frontend/img/logo/w_logo.png" alt="" title=""></a>
                                    </div>
                                    <div class="menu-outer">
                                        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                                    </div>
                                    <div class="social-links">
                                        <ul class="clearfix">
                                            <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                            <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                                            <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                            <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                                            <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <!-- End Mobile Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header-area-end -->


        <!-- main-area -->
        <main>

            @yield('content')

        </main>
        <!-- main-area-end -->


        <!-- footer-area -->
        <footer>
            <div class="footer-top footer-bg fix" data-background="/frontend/img/bg/footer_bg.jpg">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="footer-widget mb-50">
                                <div class="footer-logo mb-35">
                                    <a href="{{route('home')}}"><img src="/frontend/img/logo/logo.png" alt=""></a>
                                </div>
                                <div class="footer-text">
                                    <p>Farm2Home.</p>
                                    <div class="footer-contact">
                                        <ul>
                                            <li><i class="fas fa-map-marker-alt"></i> <span>Address : </span>91, Gulshan 1, Dhaka</li>
                                            <li><i class="fas fa-headphones"></i> <span>Phone : </span>+8801710000000</li>
                                            <li><i class="fas fa-envelope-open"></i><span>Email : contact@farm2home.com</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                        
                        </div>
                    </div>
                </div>
                <div class="footer-bottom-shape fb-shape1 running"><img src="/frontend/img/images/footer_vector01.png" alt=""></div>
                <div class="footer-bottom-shape fb-shape2"><img src="/frontend/img/images/footer_vector02.png" alt=""></div>
                <div class="footer-bottom-shape fb-shape3"><img src="/frontend/img/images/footer_vector03.png" class="rotateme" alt=""></div>
            </div>
            <div class="copyright-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="copyright-text">
                                <p>Copyright © 2020 <a href="#">Farm2Home</a> All Rights Reserved.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 d-none d-md-block">
                            <div class="payment-method-list">
                                <ul>
                                    <li><a href="#"><img src="/frontend/img/icon/visa_2.png" alt=""></a></li>
                                    <li><a href="#"><img src="/frontend/img/icon/ae_02.png" alt=""></a></li>
                                    <li><a href="#"><img src="/frontend/img/icon/discover.png" alt=""></a></li>
                                    <li><a href="#"><img src="/frontend/img/icon/stripe.png" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-area-end -->




        

		<!-- JS here -->
        <!-- <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
        <script src="/frontend/js/vendor/jquery-3.5.0.min.js"></script>
        <script src="/frontend/js/popper.min.js"></script>
        <script src="/frontend/js/bootstrap.min.js"></script>
        <script src="/frontend/js/isotope.pkgd.min.js"></script>
        <script src="/frontend/js/imagesloaded.pkgd.min.js"></script>
        <script src="/frontend/js/jquery.magnific-popup.min.js"></script>
        <script src="/frontend/js/owl.carousel.min.js"></script>
        <script src="/frontend/js/jquery.odometer.min.js"></script>
        <script src="/frontend/js/jquery.appear.js"></script>
        <script src="/frontend/js/jquery.countdown.min.js"></script>
        <script src="/frontend/js/paroller.js"></script>
        <script src="/frontend/js/slick.min.js"></script>
        <script src="/frontend/js/ajax-form.js"></script>
        <script src="/frontend/js/wow.min.js"></script>
        <script src="/frontend/js/jquery-ui.js"></script>
        <script src="/frontend/js/aos.js"></script>
        <script src="/frontend/js/plugins.js"></script>
        <script src="/frontend/js/main.js"></script>
        @yield('footer')
    </body>

<!-- Mirrored from themebeyond.com/html/agrifram/agrifram/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Jun 2021 09:47:46 GMT -->
</html>