@extends('layouts.main_layout')

@section('title')
Hello world !!!
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/homepage.css') }}">
@endsection

@section('main-content')
<div style="margin-top: 70px"></div>
<div class="articles-container w-100 py-3">
    <div class="row">
        <div class="col-4">
            <div class="article-container">
                <div class="article-title">
                    Making Minecraft? How hard is it?
                </div>
                <div class="article-review">
                    

You could get the width of the navbar to go the full length of the page by making the container inherit from ".navbar-wrapper". You may also want to get rid of the padding you have set in ".navbar-wrapper .navbar"
                </div>
                <div class="article-control py-2 d-flex justify-content-around align-items-center">
                    <a href="" class="btn read-article-btn">Read more</a>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="article-container">
                <div class="article-title">
                    Making Minecraft? How hard is it?
                </div>
                <div class="article-review">
                    

You could get the width of the navbar to go the full length of the page by making the container inherit from ".navbar-wrapper". You may also want to get rid of the padding you have set in ".navbar-wrapper .navbar"
                </div>
                <div class="article-control py-2 d-flex justify-content-around align-items-center">
                    <a href="" class="btn read-article-btn">Read more</a>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="article-container">
                <div class="article-title">
                    Making Minecraft? How hard is it?
                </div>
                <div class="article-review">
                    

You could get the width of the navbar to go the full length of the page by making the container inherit from ".navbar-wrapper". You may also want to get rid of the padding you have set in ".navbar-wrapper .navbar"
                </div>
                <div class="article-control py-2 d-flex justify-content-around align-items-center">
                    <a href="" class="btn read-article-btn">Read more</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
