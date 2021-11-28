@if(count($errors)>0)
  @foreach($errors->all() as $error)
    {{ $error }}
  @endforeach
@endif
<?php
  $set = App\Models\Settings::select('logo')->first();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  
  <title>Daftar - SMANYER</title>

  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}">

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
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <a href="{{ route('index') }}" target="_blank">  
                <img src="{{ asset('image/set/'.$set->logo) }}" alt="logo" width="100">
              </a>
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>
              @if(Session::has('pesan'))
                <div class="alert alert-danger alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                    {{ Session('pesan') }}
                  </div>
                </div>
              @endif