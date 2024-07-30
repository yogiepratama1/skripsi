<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SMK Yapermas</title>
  <link rel="icon" href="{{ asset('logo-alfarizi.jpg') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="w-full">
  <header class="max-w-screen-xl mx-auto mb-8">
    <nav class="px-4 sm:px-5 py-12 flex items-center justify-between space-x-12">
      <div class="flex items-center space-x-8">
        <div id="logo" class="flex items-center space-x-2">
          <img src="{{ asset('logo-alfarizi.jpg') }}" class="w-8 h-8" alt="Trippi Logo">
          <h5 class="text-xl font-bold text-[#094067]">SMK Yapermas</h5>
        </div>
      </div>
      <div class="lg:hidden">
        <button>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <line x1="4" y1="6" x2="20" y2="6"></line>
            <line x1="4" y1="12" x2="20" y2="12"></line>
            <line x1="4" y1="18" x2="20" y2="18"></line>
          </svg>
        </button>
      </div>
      <div class="hidden lg:flex items-center space-x-5">
        <button class="px-5 py-3 rounded-md text-[#094067] font-semibold hover:text-[#094067]/75 transition duration-300">
            <a href="{{ route('login') }}">Login</a>
        </button>
      </div>
    </nav>
  </header>
  <main class="max-w-screen-xl mx-auto overflow-x-hidden px-4 sm:px-5">
    <!-- Hero Section -->
    <section data-aos="fade-up" data-aos-duration="1000" class="grid grid-cols-6 lg:grid-cols-12 mb-20">
      <div class="col-span-6 text-center lg:text-left">
        <h1 class="text-5xl sm:text-6xl md:text-7xl mb-4 font-extrabold text-[#094067] leading-tight">Sistem Informasi Pelaporan Kegiatan  <span class="text-[#3DA9FC]">Ekstrakurikuler</span></h1>
        <p class="mb-6 text-base md:text-lg tracking-wide leading-8 font-medium text-[#5F6C7B] pr-0 md:pr-4 xl:pr-32">Perancangan dan Pembuatan Sistem Informasi Pelaporan Kegiatan Ekstrakurikuler Berbasis Web Pada SMK YAPERMAS</p>
        <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-6 justify-center lg:justify-start">
          <button class="w-full md:w-fit px-9 py-5 bg-[#3DA9FC] flex items-center justify-center md:justify-start text-white font-semibold rounded-md shadow-[0_6px_30px_rgba(61,169,252,0.6)] hover:bg-[#3498E4] group transition-colors duration-300">
            <span>Mulai</span>
          </button>
        </div>
      </div>
      <div class="col-span-6 pl-24 hidden lg:block">
        <img src="{{ asset('logo-alfarizi.jpg') }}" alt="">
      </div>
    </section>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
    const swiper = new Swiper('.comment-slider', {
      // Optional parameters
      loop: true,
      slidesPerView: 1,
      spaceBetween: 30,
      breakpoints: {
        768: {
          slidesPerView: 2,
        },
        // when window width is >= 1024px
        1024: {
          slidesPerView: 3,
        },
      },

      // If we need pagination
      pagination: {
        el: '.swiper-pagination',
      },

      // Navigation arrows
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>
</body>
</html>