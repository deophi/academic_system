<?php
  $set = App\Models\Settings::select('logo')->first();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  
  <title>@yield('judul') - SMANYER</title>

  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css')}}">

  <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css')}}">

  <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css')}}">

  <link rel="shortcut icon" href="{{ asset('image/set/'.$set->logo) }}">

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
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-12 offset-sm-2 col-md-12 offset-md-3 col-lg-12 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <a href="{{ route('index') }}">
                <img src="{{ asset('image/set/'.$set->logo) }}" alt="logo" width="100">
              </a>
            </div>