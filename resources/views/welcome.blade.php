<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sistem Informasi CRM </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" href="{{ asset('logo.png') }}" type="image/x-icon">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('css/mirza/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/mirza/icon.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('css/mirza/main.css') }}" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">PT Home Center Indonesia.</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="">(021) 5828282</a></li>
          <li><a class="getstarted scrollto" href="{{ url('login') }}">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-2 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Sistem Informasi Customer Relationship Management (CRM)</h1>
          <ul>
            <li><i class="ri-check-line"></i> Nyaman</li>
            <li><i class="ri-check-line"></i> Terjangkau</li>
            <li><i class="ri-check-line"></i> Praktis</li>
          </ul>
          <div class="mt-3">
            <a href="{{ url('login') }}" class="btn-get-started scrollto">Mulai</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="{{ asset('hero-img.png') }}" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <!-- Template Main JS File -->

</body>

</html>