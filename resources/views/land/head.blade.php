<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>
    @if($index == 0)
      SMA Negeri 1 Anyer
    @else
      @yield('judul') | SMA Negeri 1 Anyer
    @endif
  </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('image/set/'.$set->logo) }}" rel="icon">
  <link href="{{ asset('image/set/'.$set->logo) }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('land/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('land/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('land/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('land/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('land/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('land/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Butterfly - v4.3.0
  * Template URL: https://bootstrapmade.com/butterfly-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="{{ route('index') }}" class="logo"><img src="image/set/{{ $set->logo }}" alt="" class="img-fluid"></a>
      <!-- Uncomment below if you prefer to use text as a logo -->
      <!-- <h1 class="logo"><a href="index.html">Butterfly</a></h1> -->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="#hero">Home</a></li>
          @if($index == 0)
            @if($abt->sambutan != NULL)
              <li><a class="nav-link scrollto" href="#about">Sambutan</a></li>
            @endif
            @if($news->isNotEmpty())
              <li><a class="nav-link scrollto" href="#news">Terbaru</a></li>
            @endif
            @if($prof->isNotEmpty())
              <li><a class="nav-link scrollto" href="#services">Profil</a></li>
            @endif
            @if($act->isNotEmpty())
              <li><a class="nav-link scrollto" href="#portfolio">Kegiatan</a></li>
            @endif
            <li><a class="nav-link scrollto" href="#crt">Kurikulum & Kesiswaan</a></li>
          @endif
          <li><a class="nav-link scrollto active" href="{{ route('akademik.index') }}" target="_blank">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->