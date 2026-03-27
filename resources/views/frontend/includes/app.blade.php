<!DOCTYPE html>
<html lang="en">
    <!--<< Header Area >>-->
    <head>
       <!-- ========== Meta Tags ========== -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Gramentheme">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>urm || @yield('title')</title>
        <meta name="theme-color" content="#3FA9F5">
        <!-- ======== Page title ============ -->

        <!--<< Favcion >>-->
        <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">
        <!--<< Bootstrap min.css >>-->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <!--<< All Min Css >>-->
        <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
        <!--<< Animate.css >>-->
        <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
        <!--<< Magnific Popup.css >>-->
        <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
        <!--<< MeanMenu.css >>-->
        <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">
         <!--<< Odometer.css >>-->
        <link rel="stylesheet" href="{{ asset('assets/css/odometer.css') }}">
        <!--<< Swiper Bundle.css >>-->
        <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
        <!--<< Nice Select.css >>-->
        <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
        <!--<< Main.css >>-->
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
        @stack('styles')

    </head>
    <body class="smooth-scroll-yes">


        <!-- Preloader Start -->
        <!-- <div id="preloader" class="preloader">
            <div class="animation-preloader">
                <div class="spinner">
                </div>
                <div class="txt-loading">
                    <span data-text-preloader="V" class="letters-loading">
                        V
                    </span>
                     <span data-text-preloader="I" class="letters-loading">
                        I
                    </span>
                     <span data-text-preloader="S" class="letters-loading">
                        S
                    </span>
                    <span data-text-preloader="A" class="letters-loading">
                        A
                    </span>
                    <span data-text-preloader="W" class="letters-loading">
                        W
                    </span>
                     <span data-text-preloader="A" class="letters-loading">
                        A
                    </span>
                     <span data-text-preloader="Y" class="letters-loading">
                        Y
                    </span>
                </div>
                <p class="text-center">Loading</p>
            </div>
            <div class="loader">
                <div class="row">
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                </div>
            </div>
        </div>   -->


         {{-- <!-- GT Back To Top Start -->
        <button id="back-top" class="back-to-top show">
            <i class="fa-regular fa-arrow-up"></i>
        </button>

        <!-- GT MouseCursor Start -->
        <div class="mouseCursor cursor-outer"></div>
        <div class="mouseCursor cursor-inner"></div> --}}


        @include('frontend.includes.header')
        @yield('body')
         @include('frontend.includes.footer')

        @stack('scripts')
        <!--<< All JS Plugins >>-->
        <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
        <!--<< Viewport Js >>-->
        <script src="{{ asset('assets/js/viewport.jquery.js') }}"></script>
        <!--<< Bootstrap Js >>-->
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <!--<< nice-selec Js >>-->
        <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
        <!--<< Waypoints Js >>-->
        <script src="{{ asset('assets/js/jquery.waypoints.js') }}"></script>
         <!--<< Odometer Js >>-->
        <script src="{{ asset('assets/js/odometer.min.js') }}"></script>
        <!--<< Swiper Slider Js >>-->
        <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
        <!--<< MeanMenu Js >>-->
        <script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
        <!--<< Magnific Popup Js >>-->
        <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
        <!--<< Wow Animation Js >>-->
        <script src="{{ asset('assets/js/wow.min.js') }}"></script>
        <!--<< gsap Js >>-->
        <script src="{{ asset('assets/js/gsap.js') }}"></script>
         <!--<< lenis.min. Js >>-->
         <script src="{{ asset('assets/js/lenis.min.js') }}"></script>
         <!--<< ScrollTrigger.min. Js >>-->
         <script src="{{ asset('assets/js/ScrollTrigger.min.js') }}"></script>
         <!--<< SplitText.min. Js >>-->
         <script src="{{ asset('assets/js/SplitText.min.js') }}"></script>
        <!--<< Main.js >>-->
        <script src="{{ asset('assets/js/main.js') }}"></script>
    </body>
</html>
