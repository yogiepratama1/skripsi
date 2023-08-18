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
    <header class="s-header s-header--opaque">


        <div class="row s-header__navigation">

            <nav class="s-header__nav-wrap">

                <h3 class="s-header__nav-heading h6">Navigate to</h3>

                <ul class="s-header__nav">
                    <li><a href="{{ route('home') }}" title="">Home</a></li>
                    @auth
                        <li>
                            <a href="{{ route('dashboard') }}" title="">Dashboard</a>
                        </li>
                    @endauth
                    @if (auth()->user()->role == 'user')
                    <li>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ url('logout') }}" method="post" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    @endif
                    @if (auth()->user()->isAdmin())    
                    <li>
                        <a class="" href="{{ route('posts.create') }}">
                            Create new Post
                        </a>
                    </li>        
                        @endif
                        @if (auth()->user()->role != 'user')
                            <li>
                                <a class="" href="{{ route('posts.laporan') }}">
                                    Buat Laporan
                                </a>
                            </li>
                        @endif
                </ul> <!-- end s-header__nav -->

                <a href="#0" title="Close Menu" class="s-header__overlay-close close-mobile-menu">Close</a>

            </nav> <!-- end s-header__nav-wrap -->

        </div> <!-- end s-header__navigation -->

        <a class="s-header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

    </header> <!-- end s-header -->
    @yield('content')


    <!-- footer
    ================================================== -->
    <footer class="s-footer">
        <div class="s-footer__bottom">

            <div class="ss-go-top">
                <a class="smoothscroll" title="Back to Top" href="#top">
                    <svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15">
                        <path
                            d="M7.5 1.5l.354-.354L7.5.793l-.354.353.354.354zm-.354.354l4 4 .708-.708-4-4-.708.708zm0-.708l-4 4 .708.708 4-4-.708-.708zM7 1.5V14h1V1.5H7z"
                            fill="currentColor"></path>
                    </svg>
                </a>
            </div> <!-- end ss-go-top -->
        </div> <!-- end s-footer__bottom -->

    </footer> <!-- end s-footer -->


    <!-- Java Script
    ================================================== -->
    <script src="{{ asset('front/js/jquery-3.5.0.min.js') }}"></script>
    <script src="{{ asset('front/js/plugins.js') }}"></script>
    <script src="{{ asset('front/js/main.js') }}"></script>

</body>

</html>
