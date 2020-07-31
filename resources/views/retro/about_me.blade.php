@extends('retro.layouts.retro_main_layout')

@section('meta')

@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/vendors/slick.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/vendors/fullpage.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/retro/about_me.css') }}">
@endsection

@section('title')
About me
@endsection

@section('main-content')
<div class="navbar-margin"></div>
<div id="full-page">
    <div class="section" id="first-page">
        <div class="slick-centered fs-cv">
            <div class="slick-child fs-cv-child">
                <div id="first-covers-container" class="slick-container">
                    <div class="first-cover retro-border"></div>
                    <div class="first-cover retro-border"></div>
                    <div class="first-cover retro-border"></div>
                </div>
            </div>
        </div>
        <div class="animated fadeInUp slower text-center text-font" id="hl-imd">Hi, I'm Dinh ;D</div>
        <p class="animated fadeIn text-font text-center sc-f-dt">Scroll down for more detail !</p>
    </div>
    <div class="section" id="second-page">
        <div class="w-100 d-flex justify-content-center align-items-center flex-column">
            <img class="wow bounce box-1" src="{{ URL::asset('sources/media/images/private/box_1.png') }}">
            <h1 class="first-sen text-font text-center">Who am I?</h1>

            <div id="first-conv">
                <div id="typed-desti-1" class="typed text-font">

                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="mb-gr">
            <div class="text-font text-left mb-cp wow animated fadeInUp delay-1s">MAYBE</div>
            <div class="text-font text-left mb-name wow animated fadeInLeft delay-1s">A software engineer</div>
            <hr class="hr-line wow animated fadeInUp">
        </div>
        <div class="wow animated fadeInUp delay-2s text-center text-font gr-intro">
            I built a fascinating competitor tracker system for my high school's knowledge challenge !
        </div>

        <div class="w-100 mt-5 d-none d-md-block">
            <div class="row">
                <div class="col-md-3 col-6">
                    <div class="w-100 text-center text-font fea wow animated fadeInUp delay-3s">
                        Tracking every competitor's single step
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="w-100 text-center text-font fea wow animated fadeInUp delay-4s">
                        Ease of use and awesome UI
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="w-100 text-center text-font fea wow animated fadeInUp delay-3s">
                        Sending and responding in a moment
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="w-100 text-center text-font fea wow animated fadeInUp delay-4s">
                        Using modern framework Electron
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3 text-center text-font sw-guideline">
            <-- Swipe -->
        </div>
        <div class="w-100 mb-3 mt-2 sf-ig-outer-container wow animated pulse delay-5s">
            <div class="sf-ig-slick">
                <div class="sf-ig retro-border retro-shadow"></div>
                <div class="sf-ig retro-border retro-shadow"></div>
                <div class="sf-ig retro-border retro-shadow"></div>
            </div>
        </div>

        <div class="w-100 text-center text-font">
            <a href="#" class="text-font git-txt-sw">
                <u>See my github project --></u>
            </a>
        </div>
    </div>

    <div class="section">
        <div class="mb-gr">
            <div class="text-font text-left mb-cp wow animated fadeInUp delay-1s">MAYBE</div>
            <div class="text-font text-left mb-name wow animated fadeInLeft delay-1s">A Game engineer</div>
            <hr class="hr-line wow animated fadeInUp">
        </div>
        <div class="wow animated fadeInUp delay-2s text-center text-font gr-intro">
            I started building my own Minecraft from scratch by learning and researching
        </div>
        <p class="wow animated bounce infinite text-font text-center sc-f-dt">Scroll down to know my stories !</p>
    </div>

    <div class="section">
        <div class="w-100 d-flex justify-content-center align-items-center">
            <img class="wow animated bounce box-2" src="{{ URL::asset('sources/media/images/private/box_2.png') }}" alt="">
        </div>
        <div class="w-100 mt-5">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="wow animated slideInLeft g-mn-ig-box retro-border retro-shadow"></div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="w-100 h-100 d-flex jusify-content-center align-items-center">
                        <div class="g-mn-sen pl-md-5 pl-0 mt-5 text-center text-font typed" id="typed-desti-2">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="w-100 d-flex justify-content-center align-items-center">
            <img class="wow animated bounce box-2" src="{{ URL::asset('sources/media/images/private/box_2.png') }}" alt="">
        </div>
        <div class="w-100 mt-5">
            <div class="row">
                <div class="col-md-6 col-12">

                    <div class="w-100 h-100 d-flex jusify-content-center align-items-center">
                        <div class="g-mn-sen pl-md-5 pl-0 text-font text-center mb-5 typed" id="typed-desti-3">

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="wow animated slideInRight g-mn-ig-box retro-border retro-shadow"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="w-100 d-flex justify-content-center align-items-center">
            <img class="wow animated bounce box-2" src="{{ URL::asset('sources/media/images/private/box_2.png') }}" alt="">
        </div>
        <div class="w-100 mt-5">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="wow animated slideInLeft g-mn-ig-box retro-border retro-shadow"></div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="w-100 h-100 d-flex jusify-content-center align-items-center">
                        <div class="g-mn-sen pl-md-5 pl-0 mt-5 text-font text-center typed" id="typed-desti-4">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="w-100 d-flex justify-content-center align-items-center">
            <img class="wow animated bounce box-2" src="{{ URL::asset('sources/media/images/private/box_2.png') }}" alt="">
        </div>
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="w-100 text-center text-font mt-5 wow animated slideInLeft">
                    <a href="">
                        <u>
                            See my github project for C++, OpenGL Minecraft -->
                        </u>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="w-100 text-center text-font mt-5 wow animated slideInRight">
                    <a href="">
                        <u>
                            See my github project for Javascript, WebGL Terrainize demo -->
                        </u>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="mb-gr">
            <div class="text-font text-left mb-cp wow animated fadeInUp delay-1s">MAYBE</div>
            <div class="text-font text-left mb-name wow animated fadeInLeft delay-1s">A Web developer</div>
            <hr class="hr-line wow animated fadeInUp">
        </div>
        <div class="text-center text-font gr-intro">
            I built a newspaper-and-forum website for my love science camping organization
        </div>
        <div class="wow animated fadeInUp my-3 text-center text-font bd-name">
            -=- Bong <span style="color: #f1c40f">Den</span> -=-
        </div>
        <div class="wow animated fadeOut text-center text-font pj-sd">
            <del>Sadly, this project always make me feel bad about myself....</del>
        </div>
        <div class="wow animated slideInLeft delay-2s mt-5 text-center text-font m-blg">
            And yea this is it. You are reading my own fascinated blog !
        </div>
    </div>

    <div class="section">
        <div class="mb-gr">
            <div class="text-font text-left mb-cp wow animated fadeInUp delay-1s">MAYBE</div>
            <div class="text-font text-left mb-name wow animated fadeInLeft delay-1s">A Gamer !!!</div>
            <hr class="hr-line wow animated fadeInUp">
        </div>
        <div class="text-center text-font gr-intro">
            What if this reality is just a game? Then I have to learn how to play it.
        </div>

        <div class="slick-centered games-slick-outer-outer">
            <div class="slick-child games-slick-outer">
                <div class="games-slick-container">
                    <div class="game-info-container">
                        <div class="game-cover-container">
                            <div class="game-cover-box retro-border retro-shadow">

                            </div>
                            <div class="game-no-box retro-border retro-shadow-sm">
                                <div class="text-font no-number">1</div>
                            </div>
                            <div class="game-name text-font">
                                Astroneer
                            </div>
                        </div>
                        <button class="g-read-btn text-font pop-up-open-btn" data-pp-target="#g-pop-up">
                            Read more-->
                        </button>
                    </div>
                    <div class="game-info-container">
                        <div class="game-cover-container">
                            <div class="game-cover-box retro-border retro-shadow">

                            </div>
                            <div class="game-no-box retro-border retro-shadow-sm">
                                <div class="text-font no-number">2</div>
                            </div>
                            <div class="game-name text-font">
                                Minecraft
                            </div>
                        </div>
                        <button class="g-read-btn text-font pop-up-open-btn" data-pp-target="#g-pop-up">
                            Read more-->
                        </button>
                    </div>
                    <div class="game-info-container">
                        <div class="game-cover-container">
                            <div class="game-cover-box retro-border retro-shadow">

                            </div>
                            <div class="game-no-box retro-border retro-shadow-sm">
                                <div class="text-font no-number">3</div>
                            </div>
                            <div class="game-name text-font">
                                Little Nightmare
                            </div>
                        </div>
                        <button class="g-read-btn text-font pop-up-open-btn" data-pp-target="#g-pop-up">
                            Read more-->
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="pop-up-container retro-border retro-shadow" id="g-pop-up" style="display: none">
            <button class="close-btn text-font retro-border retro-shadow-sm">Close</button>
            <div class="w-100 h-100 d-flex jusitfy-content-center align-items-center">
                <div class="row w-100">
                    <div class="col-md-3 col-1"></div>
                    <div class="col-md-6 col-11">
                        <div id="g-mess-container" class="retro-border retro-shadow">
                            <div id="g-name" class="text-font my-2 ml-3">
                                Astroneer
                            </div>
                            <hr>
                            <div id="g-content" class="text-font px-md-5 px-2 mb-3">
                                I have felt in love with this game since I first saw it as beta version on Steam. This game was my child's dream when I was able to build my own city on another plannet and started my adventures to others. This is my most favorite game ever !!!!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-1"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="mb-gr">
            <div class="text-font text-left mb-cp wow animated fadeInUp delay-1s">MAYBE</div>
            <div class="text-font text-left mb-name wow animated fadeInLeft delay-1s">A lazy guy listening to music</div>
            <hr class="hr-line wow animated fadeInUp">
        </div>
        <div class="text-center text-font gr-intro">
            Yay music. The art of sound wave
        </div>
        <div class="row mt-5">
            <div class="col-md-2 d-none d-lg-block"></div>
            <div class="col-md-8 col-12">
                <div class="music-slick-container">
                    <div class="music-container">
                        <div class="m-cover-gr">
                            <div class="m-c-lower-layer retro-border retro-shadow">

                            </div>
                            <div class="retro-border retro-shadow m-c-upper-layer">
                                <!-- Image here -->
                            </div>
                            <img src="{{ URL::asset('sources/media/images/private/disc.png') }}" alt="">
                        </div>
                        <div class="m-name text-font text-left mt-2">
                            Ngot Band
                        </div>
                        <button class="mt-5 m-read-story-btn text-font pop-up-open-btn" data-pp-target="#m-pop-up">
                            <u>Read more--></u>
                        </button>
                    </div>
                    <div class="music-container">
                        <div class="m-cover-gr">
                            <div class="m-c-lower-layer retro-border retro-shadow">

                            </div>
                            <div class="retro-border retro-shadow m-c-upper-layer">
                                <!-- Image here -->
                            </div>
                            <img src="{{ URL::asset('sources/media/images/private/disc.png') }}" alt="">
                        </div>
                        <div class="m-name text-font text-left mt-2">
                            Ngot Band
                        </div>
                        <button class="mt-5 m-read-story-btn text-font pop-up-open-btn" data-pp-target="#m-pop-up">
                            <u>Read more--></u>
                        </button>
                    </div>
                    <div class="music-container">
                        <div class="m-cover-gr">
                            <div class="m-c-lower-layer retro-border retro-shadow">

                            </div>
                            <div class="retro-border retro-shadow m-c-upper-layer">
                                <!-- Image here -->
                            </div>
                            <img src="{{ URL::asset('sources/media/images/private/disc.png') }}" alt="">
                        </div>
                        <div class="m-name text-font text-left mt-2">
                            Ngot Band
                        </div>
                        <button class="mt-5 m-read-story-btn text-font pop-up-open-btn" data-pp-target="#m-pop-up">
                            <u>Read more--></u>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-2 d-none d-lg-block"></div>
        </div>

        <div class="pop-up-container retro-border retro-shadow" id="m-pop-up" style="display: none">
            <button class="close-btn text-font retro-border retro-shadow-sm">Close</button>
            <div class="mt-5 text-font text-center" id="m-name">-=- Ngot Band -=-</div>
            <div class="row">
                <div class="col-md-3 col-1"></div>
                <div class="col-md-6 col-10">
                    <div id="m-cover-box" class="mt-5 retro-border retro-shadow"></div>
                    <div id="m-message" class="text-font mt-4 px-2">
                        In 2013, I decided to do something beyond my intellectual abilities. Something that would require determination and commitment, something that would shake me from within. Thus, I decided to develop a Game Engine from scratch.
                    </div>
                </div>
                <div class="col-md-3 col-1"></div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="mb-gr">
            <div class="text-font text-left mb-cp wow animated fadeInUp delay-1s">MAYBE</div>
            <div class="text-font text-left mb-name wow animated fadeInLeft delay-1s">A fan</div>
            <hr class="hr-line wow animated fadeInUp">
        </div>
        <div class="text-center text-font gr-intro">
            I am insprited, fascinated and motivated by
        </div>
        <div class="row mt-md-5 mt-2">
            <div class="col-4">
                <div class="w-100 d-flex justify-content-center align-items-center">
                    <div class="idl-cover"></div>
                </div>
            </div>
            <div class="col-4"></div>
            <div class="col-4"></div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ URL::asset('js/vendors/wow.min.js') }}"></script>
<script>
    new WOW().init();
</script>
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>
<script src="{{ URL::asset('js/vendors/slick.min.js') }}"></script>
<script src="{{ URL::asset('js/vendors/fullpage.min.js') }}"></script>
<script src="{{ URL::asset('js/retro/about_me.js') }}"></script>
@endsection