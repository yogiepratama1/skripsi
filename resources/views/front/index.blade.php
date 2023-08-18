    @extends('layouts.front')
    @section('content')
        <section id="hero" class="s-hero">

            <div class="s-hero__slider">
                    <div class="s-hero__slide">

                        <div class="s-hero__slide-bg" style="background-image: url('images/bg.jpg');"></div>

                        <div class="row s-hero__slide-content animate-this">
                            <div class="column">
                                <div class="s-hero__slide-meta">
                                    <span class="byline">
                                        <span class="author">
                                            <a href="#0">Website</a>
                                        </span>
                                    </span>
                                </div>
                                <h1 class="s-hero__slide-text">
                                    <a href="#0">
                                    Sistem Media Informasi Tradisi Suku Dayak Kanayatn di Kalimantan Barat
                                    </a>
                                </h1>
                            </div>
                        </div>

                    </div> <!-- end s-hero__slide -->


                <div class="nav-arrows s-hero__nav-arrows">
                    <button class="s-hero__arrow-prev">
                        <svg viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" width="15" height="15">
                            <path d="M1.5 7.5l4-4m-4 4l4 4m-4-4H14" stroke="currentColor"></path>
                        </svg>
                    </button>
                    <button class="s-hero__arrow-next">
                        <svg viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" width="15" height="15">
                            <path d="M13.5 7.5l-4-4m4 4l-4 4m4-4H1" stroke="currentColor"></path>
                        </svg>
                    </button>
                </div> <!-- end s-hero__arrows -->

        </section> <!-- end s-hero -->
    @endsection
