<?php $fav = App\Models\Settings::findorfail(1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('judul') - SMANYER</title>


  <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
  
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
  
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}">
  <link rel="shortcut icon" href="{{ asset('image/set/'.$fav->logo) }}">

  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-94034622-3');
  </script>
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('image/profil/'.Auth::user()->gambar) }}" class="rounded-circle mr-1" height="30px">
            <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              @if(Auth::user()->levels_id == "2")
              @elseif(Auth::user()->levels_id == "3")
              @else
              <a href="{{ route('profil.index') }}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profil
              </a>
              @endif
              <div class="dropdown-divider"></div>
              <form method="post" action="{{ route('logout') }}">
                @csrf
                <button class="dropdown-item has-icon text-danger">
                  Logout
                </button>
              </form>
            </div>
          </li>
        </ul>
      </nav>