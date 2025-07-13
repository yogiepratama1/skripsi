<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Informasi Distribusi Pekerjaan Instalasi Listrik – PT Graha Artha</title>

  <link rel="icon" href="{{ asset('logo-perusahaan.png') }}" type="image/png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <style>
    html, body {
      height: 100%;
      margin: 0;
      scroll-behavior: smooth;
    }

    #hero {
      position: relative;
      background: url('{{ asset('hero-bg.jpg') }}') center center / cover no-repeat;
      height: 100vh;
      color: white;
      display: flex;
      align-items: center;
      z-index: 1;
    }

    #hero::before {
      content: '';
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0, 0, 0, 0.55); /* overlay gelap */
      z-index: 2;
    }

    #hero .hero-content {
      position: relative;
      z-index: 3;
      text-shadow: 0 2px 4px rgba(0,0,0,0.8); /* agar teks lebih terlihat */
    }

    footer {
      background: #f8f9fa;
      padding: 20px 0;
      text-align: center;
    }

    .logo-img {
      height: 36px;
      width: auto;
      margin-right: 10px;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-sm">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="{{ asset('logo-perusahaan.png') }}" alt="Logo" class="logo-img">
        <span class="fw-semibold">PT Graha Artha</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="navMenu" class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="#hero">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="#services">Layanan</a></li>
          <li class="nav-item"><a class="nav-link" href="#footer">(021) 6499967</a></li>
          <li class="nav-item">
            <a href="{{ url('login') }}" class="btn btn-primary ms-3">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section id="hero">
    <div class="container text-center hero-content">
      <h1 class="display-5 fw-bold">Sistem Informasi Distribusi<br>Pekerjaan Instalasi Listrik</h1>
      <p class="lead mt-3">Solusi digital untuk mengelola penugasan teknisi, proyek instalasi, dan laporan kerja secara efisien.</p>
      <a href="{{ url('login') }}" class="btn btn-lg btn-primary mt-4">Masuk Aplikasi</a>
    </div>
  </section>

  <!-- Services Section -->
  <section id="services" class="py-5 bg-light">
    <div class="container">
      <h2 class="text-center mb-4">Layanan Kami</h2>
      <div class="row text-center">
        <div class="col-md-4">
          <i class="bi bi-lightning-fill" style="font-size:2rem;color:#0069d9;"></i>
          <h5 class="mt-2">Distribusi Listrik</h5>
          <p>Mengelola penugasan proyek distribusi daya ke lokasi pelanggan.</p>
        </div>
        <div class="col-md-4">
          <i class="bi bi-tools" style="font-size:2rem;color:#0069d9;"></i>
          <h5 class="mt-2">Instalasi & Perawatan</h5>
          <p>Manajemen pekerjaan teknisi dari instalasi hingga laporan hasil kerja.</p>
        </div>
        <div class="col-md-4">
          <i class="bi bi-diagram-3-fill" style="font-size:2rem;color:#0069d9;"></i>
          <h5 class="mt-2">Koordinasi Tim</h5>
          <p>Memfasilitasi supervisor dan teknisi dalam sistem penugasan real-time.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer id="footer">
    <div class="container">
      <p class="mb-1 fw-semibold">PT Graha Artha – Instalasi & Distribusi Listrik Profesional</p>
      <p>Semarang | Telp: (021) 5828282 | Email: ptgasmg@gmail.com</p>
      <small>&copy; {{ date('Y') }} PT Graha Artha. All rights reserved.</small>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
