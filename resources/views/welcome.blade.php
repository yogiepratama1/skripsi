<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sistem Informasi Tracking dan Tracing</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/x-icon">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/willson/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/willson/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow border-top border-5 border-primary sticky-top p-0">
        <a href="" class="navbar-brand bg-primary d-flex align-items-center px-4 px-lg-5">
            <h2 class="mb-2 text-white">PT Panca Traktor Indonesia</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ url('login') }}" class="nav-item nav-link">Login</a>
            </div>
            <h4 class="m-0 pe-lg-5 d-none d-lg-block"><i class="fa fa-headphones text-primary me-3"></i>(021) 2464 – 8286</h4>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5">
        <div class=" position-relative mb-5">
            <div class=" position-relative">
                <img class="img-fluid" src="{{ asset('traktor-pic.png') }}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(6, 3, 21, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">PT Panca Traktor Indonesia</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">Sistem Informasi <span class="text-primary">Tracking & Tracing Unit Traktor Menggunakan Teknologi QR Code</span> </h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">The official Indonesian Dealership of LiuGong Heavy Equipments</p>
                                <a href="{{ url('login') }}" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Mulai</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>