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
        <div class="slick-centered">
            <div class="slick-child">
                <div id="first-covers-container" class="slick-container">
                    <div class="first-cover retro-border"></div>
                    <div class="first-cover retro-border"></div>
                    <div class="first-cover retro-border"></div>
                </div>
            </div>
        </div>
        <div class="text-center text-font" id="hl-imd">Hi, I'm Dinh ;D</div>
        <p class="text-font text-center" id="sc-f-dt">Scroll down for more detail !</p>
    </div>
    <div class="section" id="second-page">

    </div>
</div>
@endsection

@section('js')
<script src="{{ URL::asset('js/vendors/slick.min.js') }}"></script>
<script src="{{ URL::asset('js/vendors/fullpage.min.js') }}"></script>
<script src="{{ URL::asset('js/retro/about_me.js') }}"></script>
@endsection
