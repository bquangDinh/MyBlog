@extends('retro.layouts.retro_main_layout')

@section('meta')
@endsection

@section('title')
404
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/retro/error.css') }}">
@endsection

@section('main-content')
<div class="navbar-margin"></div>
<div class="error-container d-flex justify-content-center align-items-center flex-column">
    <div class="text-font text-404">404</div>
    <div class="text-font text-idk">
        Sorry guys, this page doesn't exist
    </div>
    <a href="{{ route('homepage') }}" class="mt-5 btn text-font retro-border retro-shadow">
        Go Home
    </a>
    <button id="open-pp-btn" class="mt-5 text-font">
        <u>Go somewhere else?</u>
    </button>
    <div class="pop-up-container" id="pop-up-container" style="display: none">
        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
            <div class="row w-100">
                <div class="col-md-4 col-1"></div>
                <div class="col-md-4 col-10">
                    <div class="pop-up retro-border retro-shadow d-flex justify-content-center align-items-center">
                        <div class="text-font px-md-5 px-2 py-5">
                            Oh come on, really? Just clicking Go home. I have no idea about this.
                        </div>
                        <button id="close-pp-btn" class="retro-border retro-shadow-sm text-font">Close</button>
                    </div>
                </div>
                <div class="col-md-4 col-1"></div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
<script>
    $("#open-pp-btn").click(function(e){
        $("#pop-up-container").show();
    });

    $("#close-pp-btn").click(function(e){
        $("#pop-up-container").hide();
    });
</script>
@endsection
