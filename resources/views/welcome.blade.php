<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ env('JUDUL') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600&family=Oswald:wght@600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/all.min.css" />
    <!-- fontawesome -->
    <!-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="assets/css/tailwind.css" />
    <link rel="stylesheet" href="assets/css/tooplate-antique-cafe.css" />
</head>

<body>
    <!-- Intro -->
    <div id="intro" class="parallax-window" data-parallax="scroll" data-image-src="assets/img/antique-cafe-bg-01.jpg">
        <nav id="tm-nav" class="fixed w-full">
            <div class="tm-container mx-auto px-2 md:py-6 text-right">
                <button class="md:hidden py-2 px-2" id="menu-toggle">
                    <i class="fas fa-2x fa-bars tm-text-gold"></i>
                </button>
                <ul class="mb-3 md:mb-0 text-2xl font-normal flex justify-end flex-col md:flex-row">
                    <li class="inline-block mb-4 mx-4">
                        <a href="{{ route('login') }}" class="tm-text-gold py-1 md:py-3 px-4">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container mx-auto px-2 tm-intro-width">
            <div class="sm:pb-60 sm:pt-48 py-20">
                <div class="bg-black bg-opacity-70 p-12 mb-5 text-center">
                    <h1 class="text-white text-5xl tm-logo-font mb-5">
                        Sistem Informasi Penentuan Menu Favorit
                    </h1>
                    <p class="tm-text-gold tm-text-2xl">Kopi Kenangan</p>
                </div>
                <div class="bg-black bg-opacity-70 p-10 mb-5 rounded-lg">
                    <img src="logo-perusahaan.jpg" alt="" />
                </div>
                <div class="text-center">
                    <div class="inline-block">
                        <a href="{{ route('login') }}" class="flex justify-center items-center bg-black bg-opacity-70 py-6 px-8 rounded-lg font-semibold tm-text-2xl tm-text-gold hover:text-gray-200 transition">
                            <i class="fas fa-coffee mr-3"></i>
                            <span>Mulai</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/parallax.min.js"></script>
</body>

</html>