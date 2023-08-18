<!DOCTYPE html>
<html class="no-js" lang="en">

<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Sistem Media Informasi Tradisi Suku Dayak Kanayatn di Kalimantan Barat</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('front/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!-- script
    ================================================== -->
    <script src="{{ asset('front/js/modernizr.js') }}"></script>
    <script defer src="{{ asset('front/js/fontawesome/all.min.js') }}"></script>

    <!-- favicons
    ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="{{ asset('front/site.webmanifest') }}">

</head>

<body id="top">


    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader"></div>
    </div>


    <!-- header
    ================================================== -->
    <header class="s-header">

        <div class="row s-header__navigation">

            <nav class="s-header__nav-wrap">

                <h3 class="s-header__nav-heading h6">Navigate to</h3>

                <ul class="s-header__nav">
                    <li class="current"><a href="{{ route('home') }}" title="">Home</a></li>
                    <!-- <li class="has-children">
                        <a href="#0" title="">Categories</a>
                        <ul class="sub-menu">
                            @foreach ($categories as $cat)
                                <li><a href="{{ route('categories.view', $cat->id) }}">{{ $cat->title }}</a></li>
                            @endforeach
                        </ul>
                    </li> -->
                    @guest
                        <li>
                            <a href="{{ route('login') }}" title="">Sign In</a>
                        </li>
                    @endguest
                    @auth
                        <li>
                            <a href="{{ route('dashboard') }}" title="">Dashboard</a>
                        </li>
                    @endauth
                </ul> <!-- end s-header__nav -->

                <a href="#0" title="Close Menu" class="s-header__overlay-close close-mobile-menu">Close</a>

            </nav> <!-- end s-header__nav-wrap -->

        </div> <!-- end s-header__navigation -->

        <a class="s-header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

    </header> <!-- end s-header -->

    @yield('content')

    <!-- Java Script
    ================================================== -->
    <script src="{{ asset('front/js/jquery-3.5.0.min.js') }}"></script>
    <script src="{{ asset('front/js/plugins.js') }}"></script>
    <script src="{{ asset('front/js/main.js') }}"></script>

</body>

</html>
