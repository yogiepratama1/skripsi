<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Sistem Informasi Pendaftaran Peserta Pensiun</title>
      <!-- bootstrap css -->
    <title>Sistem Informasi Pendaftaran Peserta Pensiun</title>
    <link rel="icon" href="{{ asset('logo-perusahaan.png') }}" type="image/x-icon">
    <link href="{{ asset('css/nanda.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/nanda-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
</head>

<body style="--banner-bg-url: url('{{ asset('bg.png') }}')">
      <!-- header top section start -->
      <div class="header_top">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <div class="call_text"><span class="call_text_left">PT. DASPEN PKT GROUP</span></a></div>
            </div>
            <div class="col-sm-4">
              <div class="call_text"><a href="#"><img src="{{ asset('icons/call-icon.png') }}"><span class="call_text_left">(021) 3453559</span></a></div>
            </div>
            <div class="col-sm-4">
              <div class="call_text"><a href="#"><img src="{{ asset('icons/mail-icon.png') }}"><span class="call_text_left">dpgroup@pupukkaltim.com</span></a></div>
            </div>
          </div>
        </div>
      </div>
      <!-- header top section end -->
      <!-- header section start -->
      <div class="header_section">
        <div class="container">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="logo"><a href="index.html"><img width="500" height="400" src="{{ asset('logo-perusahaan.png') }}"></a></div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.html"></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="">&nbsp;</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="">&nbsp;</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="">&nbsp;</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="">&nbsp;</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="">&nbsp;</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">&nbsp;</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="#">LOGIN</a>
              </li>
            </ul>
          </div>
        </nav>
        </div>
      </div>
      <!-- header section end -->
      <!-- banner section start -->
      <div class="banner_section layout_padding">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-8 padding_0">
              <div class="banner_img"><img src="{{ asset('banner-img.png') }}"></div>
            </div>
            <div class="col-sm-4">
              <h1 class="clever_text">Sistem Informasi <br> Pendaftaran Peserta Pensiun <br><span style="color: #212122;">PT. Dana Pensiun Pupuk Kaltim Group</span> 
              </h1>
              <div class="read_bt_2"><a href="{{ url('login') }}">Mulai</a></div>
            </div>
          </div>
        </div>
      </div>
    </body>
</html>
