<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>@yield('title')</title>

  <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="icon" type="image/x-icon" href="{{ asset('images/fornt-logo/nepal-govt.png') }}">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <div class="front-row">
        <div class="item gov-logo">
          <img src="{{ asset('images/fornt-logo/nepal-govt.png') }}" alt="logo" class="logos">
        </div>
    
        <div class="item gov-title">
          <div class="title">
            <span class="welcome-message">नेपाल सरकारको आधिकारिक पोर्टल</span>
            <br>
            <span class="welcome-message">The Official Portal of Government of Nepal for e-Challan</span>
            <br>
            <span class="web-address">NEPALTRAFFIC.GOV.NP</span>
          </div>
        </div>
    
        <div class="item flag-logo">
          <img src="{{ asset('images/fornt-logo/R.png') }}" alt="logo" class="logos">
        </div>
    
      </div>
    
      <nav class="mb-5 py-0 px-4 bg-light sticky-top border-bottom">
        <div class="d-flex flex-wrap">
          <ul class="nav me-auto">
            <li class="nav-item"><a href="{{ route('rulepage') }}" class="nav-link link-dark px-2 active" aria-current="page">Rules</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-dark px-2">link1</a></li>
            <li class="nav-item"><a href="{{ route('verificationpage') }}" class="nav-link link-dark px-2">Verification</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-dark px-2">link3</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-dark px-2">link4</a></li>
          </ul>
          <ul class="nav">
            <li class="nav-item"><a href="{{ route('trafficlogin') }}" class="nav-link link-dark px-2">Login</a></li>
          </ul>
        </div>
      </nav>

      <div class="container">

    @yield('content')

    <hr>
    <footer class="py-1 my-1">
      <p class="text-center text-muted">© 2022 Company, Saino Group Nepal Pvt. Ltd</p>
    </footer>
  </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
  </script>
</body>

</html>