<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ URL::asset('css/vendors/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/vendors/hamburgers.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/layouts/main_layout.css') }}">

    @yield('css')
  </head>
  <body class="dark-mode">
    <!-- For mobile -->
    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
          <div class="author-name">
            <a href="/"> QUANG DINH BUI</a>
          </div>
        </div>
        <div class="header-mobile-inner">
          <button type="button" name="button" class="hamburger hamburger--spring js-harmburger">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
          </button>
        </div>

        <nav class="navbar-mobile">
          <ul class="navbar-mobile__list list_unstyled">
            <li>
              <a href="{{ route('homepage') }}">Home</a>
            </li>
            <li>
              <a href="{{ route('projects_page') }}">Projects</a>
            </li>
            <li>
              <a href="/">Gallery</a>
            </li>
            <li>
              <a href="/">About</a>
            </li>
          </ul>
        </nav>
    </header>

    <div class="page-wrapper container-fluid" id="page-wrapper">
      <!--NAVIGATION BAR-->
      <!--For desktop-->
      <div class="d-none d-lg-block" id="navbar-container">
        <div class="point-deep-shadow" style="top: 17px; left: 10px"></div>
        <div class="point-deep-shadow" style="top: 17px; right: 10px"></div>
        <div class="navbar-outer w-100 h-100 d-flex justify-content-around align-items-center flex-row">
          <a href="{{ route('homepage') }}" class="btn navbar-btn">Home</a>
          <a href="/" class="btn navbar-btn">About me</a>
          <a href="{{ route('projects_page') }}" class="btn navbar-btn">Projects</a>
        </div>
      </div>

      <div class="main-content">
        @yield('main-content')
      </div>
    </div>
    <script src="{{ URL::asset('js/vendors/jquery-3.4.1.min.js') }}" charset="utf-8"></script>
    <script src="{{ URL::asset('js/vendors/popper.min.js') }}" charset="utf-8"></script>
    <script src="{{ URL::asset('js/vendors/bootstrap.min.js') }}" charset="utf-8"></script>
    @yield('js')
  </body>
</html>
