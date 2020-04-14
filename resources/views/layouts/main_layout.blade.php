<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Dinh Quang Bui">
    @yield('meta')

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ URL::asset('css/vendors/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/vendors/hamburgers.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/layouts/main_layout.css') }}">

    @yield('css')
  </head>
  <body>
    <!-- For mobile -->
    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile-inner d-flex justify-content-center align-items-center">
          <div class="point-deep-shadow" style="top: 10px; left: 10px"></div>
          <div class="point-deep-shadow" style="top: 10px; right: 10px"></div>
          <a href="{{ route('homepage') }}" id="me-anchor">qdinh.</a>
        </div>

        <nav class="navbar-mobile" id="navbar-mobile" state="hide">
          <div class="d-flex justify-content-center align-items-center flex-column w-100 h-100 mt-5">
            <a href="{{ route('homepage') }}" class="navbar-anchor">@lang('messages.home_nav_btn')</a>
            <a href="{{ route('projects_page') }}" class="navbar-anchor">@lang('messages.project_nav_btn')</a>
            <a href="{{ route('about_me') }}" class="navbar-anchor">@lang('messages.about_me')</a>
            <button type="button" id="navbar-toggle-btn">
              <i class="fas fa-angle-down"></i>
            </button>
          </div>
        </nav>
    </header>

    <div class="page-wrapper container-fluid" id="page-wrapper">
      <!--NAVIGATION BAR-->
      <!--For desktop-->
      <div class="d-none d-lg-block" id="navbar-container">
        <div class="point-deep-shadow" style="top: 17px; left: 10px"></div>
        <div class="point-deep-shadow" style="top: 17px; right: 10px"></div>
        <div class="navbar-outer w-100 h-100 d-flex justify-content-around align-items-center flex-row">
          <a href="{{ route('homepage') }}" class="btn navbar-btn">@lang('messages.home_nav_btn')</a>
          <a href="{{ route('about_me') }}" class="btn navbar-btn">@lang('messages.about_me')</a>
          <a href="{{ route('projects_page') }}" class="btn navbar-btn">@lang('messages.project_nav_btn')</a>
        </div>
      </div>

      <div class="main-content">
        @yield('main-content')
      </div>
    </div>
    <script src="{{ URL::asset('js/vendors/jquery-3.4.1.min.js') }}" charset="utf-8"></script>
    <script src="{{ URL::asset('js/vendors/popper.min.js') }}" charset="utf-8"></script>
    <script src="{{ URL::asset('js/vendors/bootstrap.min.js') }}" charset="utf-8"></script>
    <script src="{{ URL::asset('js/main_layout.js') }}"></script>
    @yield('js')
  </body>
</html>
