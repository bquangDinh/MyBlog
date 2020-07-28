@extends('retro.layouts.retro_main_layout')

@section('meta')
@endsection

@section('title')
Got home !
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/retro/homepage.css') }}">
@endsection

@section('main-content')
<div class="navbar-margin"></div>
<div class="flex-row mt-3">
    <div class="flex-column">
        <div class="article-container mt-5">
            <div class="article-inner-container retro-border retro-shadow">
                <div class="cover-container retro-border retro-shadow-sm">

                </div>
                <p class="article-title text-font mx-3 mt-2">Artroneer 1.10.9</p>
                <div class="control-container d-flex justify-content-center align-items-center">
                    <a href="#" class="btn read-more-btn text-font retro-border retro-shadow-sm">Đọc thêm</a>
                </div>
            </div>
        </div>
    </div>
    <div class="flex-column">
    </div>
    <div class="flex-column"></div>
    <div class="flex-column"></div>
</div>
@endsection


@section('js')
@endsection
