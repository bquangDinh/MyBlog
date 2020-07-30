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
        <link rel="stylesheet" href="{{ URL::asset('css/retro/layouts/retro_main_layout.css') }}">

        @yield('css')
    </head>

    <body>
        <div class="page wrapper container-fluid">
            <!--NAVIGATION BAR-->
            <div class="navbar navbar-expand-lg custom-navbar-container retro-border">
                <a class="navbar-brand" href="#">ABC</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbardropdown" aria-controls="navbardropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbardropdown">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item custom-navbar-item retro-border active">
                            <a href="#" class="text-font mt-2">Home</a>
                        </li>
                        <li class="nav-item custom-navbar-item retro-border">
                            <a href="#" class="text-font mt-2">About me</a>
                        </li>
                        <li class="nav-item custom-navbar-item retro-border">
                            <a href="#" class="text-font mt-2">Projects</a>
                        </li>
                    </ul>
                    <form class="form-inline">
                        <input type="text" class="form-control retro-border text-font" id="search-box" type="search" placeholder="type here to search" aria-label="Search">
                    </form>
                    <button id="dark-mode-toggler" class="retro-border text-font">
                        Dark mode
                    </button>
                </div>
            </div>
            <div id="main-content">
                @yield('main-content')
            </div>
        </div>

        <script src="{{ URL::asset('js/vendors/jquery-3.4.1.min.js') }}" charset="utf-8"></script>
        <script src="{{ URL::asset('js/vendors/popper.min.js') }}" charset="utf-8"></script>
        <script src="{{ URL::asset('js/vendors/bootstrap.min.js') }}" charset="utf-8"></script>
        <script src="{{ URL::asset('js/retro/retro_main_layout.js') }}"></script>
        @yield('js')
    </body>
</html>
