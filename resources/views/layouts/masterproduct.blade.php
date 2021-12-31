<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" href="{{asset('/frontend/assets/images/favicon.ico')}}">

    <!-- CSS
        ============================================ -->
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="{{asset('/frontend/assets/css/vendor/bootstrap.min.css')}}">

    <!-- Icons Css -->
    <link rel="stylesheet" href="{{asset('/frontend/assets/css/vendor/linearicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/assets/css/vendor/fontawesome-all.min.css')}}">

    <!-- Animation Css -->
    <link rel="stylesheet" href="{{asset('/frontend/assets/css/plugins/animation.min.css')}}">

    <!-- Slick Slier Css -->
    <link rel="stylesheet" href="{{asset('/frontend/assets/css/plugins/slick.min.css')}}">

    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{asset('/frontend/assets/css/plugins/magnific-popup.css')}}">

    <!-- Easyzoom CSS -->
    <link rel="stylesheet" href="{{asset('/frontend/assets/css/plugins/easyzoom.css')}}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('/frontend/assets/css/style.css')}}">

    <!-- custom -->
    <link rel="stylesheet" href="{{asset('/frontend/assets/css/custom.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@500&display=swap" rel="stylesheet">
    @yield('css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Prompt', sans-serif;
        }

        .single-product-item {
            width: 300px;
            height: 300px;
            /* overflow: hidden; */
            padding: 0px 40px 0px 0px;
        }

        .single-product-item .product-thumbnail>img {
            width: 300px;
            height: 300px;
        }
    </style>

</head>
@php
    $footer = App\Footer::orderBy('id','desc')->limit(1)->first();
    $categories = App\Category::whereIn('id',explode(',',$footer->category))->orderBy('id','desc')->get();
@endphp
<body class="">
    <!--====================  header area ====================-->
    <div class="header-area header-area--default">

        <!-- Header Bottom Wrap Start -->
        <header class="header-area header_absolute header_height-90 header-sticky">
            <div class="container-fluid container-fluid--cp-100">
                <div class="row align-items-center">

                    <div class="col-lg-3 col-lg-3 col-6">
                        <div class="logo text-left">
                            <a href="{{url('/')}}"><img src="{{asset('frontend/img/reenigne-logo.png')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-sm-9 col-sm-9 col-6">
                        <div class="header-right-side text-right">
                            <div class="header-right-items d-none d-md-block">
                            </div>
                            <div class="header-right-items">
                                <a href="{{url('cart')}}" class=" header-cart minicart-btn">
                                    <i class="icon-bag2"></i>
                                    <span class="item-counter">{{\Cart::getContent()->count()}}</span>
                                </a>
                            </div>
                            <div class="header-right-items d-block d-md-none">
                                <a href="javascript:void(0)" class="search-icon" id="search-overlay-trigger">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </div>
                            <div class="header-right-items">
                                <a href="#" class="mobile-navigation-icon" id="mobile-menu-trigger">
                                    <i class="icon-menu"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header Bottom Wrap End -->
    </div>
    <!--====================  End of header area  ====================-->
    
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row breadcrumb_box  align-items-center">
                        <div class="col-lg-6 col-md-6 col-sm-6 text-center text-sm-left">
                            <!-- <h2 class="breadcrumb-title">Shop</h2> -->
                        </div>
                        <div class="col-lg-6  col-md-6 col-sm-6">
                            <!-- breadcrumb-list start -->
                            <ul class="breadcrumb-list text-center text-sm-right">
                                @foreach ($breadcrumb as $item)
                                    <li class="breadcrumb-item"><a href="{{url('/')}}">{{$item}}</a></li>
                                @endforeach
                            </ul>
                            <!-- breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->


    <div id="main-wrapper">
       <div class="site-wrapper-reveal" >
            @yield('content')
       </div>
        <!--====================  footer area ====================-->
        <div class="footer-area-wrapper reveal-footer bg-gray" >
            <div class="footer-area section-space--ptb_90">
                <div class="container-fluid container-fluid--cp-100">
                    <div class="row footer-widget-wrapper">
                        <div class="col-lg-6 col-md-6 col-sm-6 footer-widget">
                            <div class="footer-widget__logo mb-20">
                                <a href="#"><img src="{{asset('frontend/img/reenigne-logo.png')}}" alt=""></a>
                            </div>
                            <ul class="footer-widget__list">
                                <li><i class="icon_pin"></i><a href="https://goo.gl/maps/qQ7rtiq6goTpPzhZ6"
                                        target="_blank">{{$footer->companyname}}</a> </li>
                                <li> <i class="icon_phone"></i><a href="tel:{{$footer->telephone}}"
                                        class="hover-style-link">{{$footer->telephone}}</a></li>

                            </ul>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-6 footer-widget">
                            <h6 class="footer-widget__title mb-20">แผนผังเว็บไซต์</h6>
                            <ul class="footer-widget__list">
                                <li><a href="{{url('/')}}" class="hover-style-link">หน้าแรก</a></li>
                                <li><a href="#" class="hover-style-link">เกี่ยวกับเรา</a></li>
                                <li><a href="#" class="hover-style-link">สินค้าของเรา</a></li>
                                <li><a href="#" class="hover-style-link">ติดต่อ</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-6 footer-widget">
                            <h6 class="footer-widget__title mb-20">หมวดหมู่สินค้า</h6>
                            <ul class="footer-widget__list">
                                @foreach ($categories as $item)
                                    <li><a href="all-product.html" class="hover-style-link">{{$item->categoryname}}</a></li>
                                 @endforeach
                            </ul>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-6 footer-widget">
                            <h6 class="footer-widget__title mb-20">โซเชียลมีเดีย</h6>
                            <ul class="footer-widget__list">
                                <li>
                                    <a href="https://{{$footer->facebook}}" target="_blank" aria-label="Twitter">
                                        <i class="social social_facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://{{$footer->twitter}}" target="_blank" aria-label="Facebook">
                                        <i class="social social_twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://{{$footer->instagrame}}" target="_blank" aria-label="Instagram">
                                        <i class="social social_instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="footer-copyright-area section-space--ptb_30">
                <div class="container-fluid container-fluid--cp-100">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-md-12">
                            <span class="copyright-text text-center text-md-left"> Copyright &copy; 2021 <a
                                    href="https://www.reenigne-thailand.com/" target="_blank">ห้างหุ้นส่วนจำกัด
                                    รีเนน</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====================  End of footer area  ====================-->
    </div>

    @include('extend')
    <!--====================  scroll top ====================-->
    <a href="#" class="scroll-top" id="scroll-top">
        <i class="arrow-top icon-arrow-up"></i>
        <i class="arrow-bottom icon-arrow-up"></i>
    </a>
    <!--====================  End of scroll top  ====================-->

    <!-- JS
    ============================================ -->
    <!-- Modernizer JS -->
    <script src="{{asset('/frontend/assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>

    <!-- jQuery JS -->
    <script src="{{asset('/frontend/assets/js/vendor/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('/frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>

    <!-- Bootstrap JS -->
    <script src="{{asset('/frontend/assets/js/vendor/bootstrap.min.js')}}"></script>

    <!-- Fullpage JS -->
    <script src="{{asset('/frontend/assets/js/plugins/fullpage.min.js')}}"></script>

    <!-- Slick Slider JS -->
    <script src="{{asset('/frontend/assets/js/plugins/slick.min.js')}}"></script>

    <!-- Countdown JS -->
    <script src="{{asset('/frontend/assets/js/plugins/countdown.min.js')}}"></script>

    <!-- Magnific Popup JS -->
    <script src="{{asset('/frontend/assets/js/plugins/magnific-popup.js')}}"></script>

    <!-- Easyzoom JS -->
    <script src="{{asset('/frontend/assets/js/plugins/easyzoom.js')}}"></script>

    <!-- ImagesLoaded JS -->
    <script src="{{asset('/frontend/assets/js/plugins/images-loaded.min.js')}}"></script>

    <!-- Isotope JS -->
    <script src="{{asset('/frontend/assets/js/plugins/isotope.min.js')}}"></script>

    <!-- YTplayer JS -->
    <script src="{{asset('/frontend/assets/js/plugins/YTplayer.js')}}"></script>

    <!-- Ajax Mail JS -->
    <script src="{{asset('/frontend/assets/js/plugins/ajax.mail.js')}}"></script>

    <!-- wow JS -->
    <script src="{{asset('/frontend/assets/js/plugins/wow.min.js')}}"></script>



    <!-- Plugins JS (Please remove the comment from below plugins.min.js for better website load performance and remove plugin js files from avobe) -->

    <!--
    <script src="{{asset('/frontend/assets/js/plugins/plugins.min.js')}}"></script>
    -->

    <!-- Main JS -->
    <script src="{{asset('/frontend/assets/js/main.js')}}"></script>
    <script>
        jQuery(document).ready(function ($) {
            $('a[href^="#"]').bind('click.smoothscroll', function (e) {
                e.preventDefault();
                var target = this.hash, $target = $(target);
                var elmnt = document.getElementById(target);
                elmnt.scrollIntoView();
            });
        });
        
    </script>
     <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @yield('js')
</body>

</html>