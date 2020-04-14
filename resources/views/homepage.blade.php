@extends('layouts.main_layout')

@section('title')
Home
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/homepage.css') }}">
@endsection

@section('main-content')
<div style="margin-top: 70px"></div>
<div class="articles-container w-100 py-3">
    <div class="row">
        @foreach($articles as $article)
        <div class="col-md-4 col-12">
            <div class="article-container">
                <div class="article-title">
                    {{ $article->title }}
                </div>
                <div class="article-review">
                    {{ $article->description }}
                </div>
                <div class="article-control py-2 d-flex justify-content-around align-items-center">
                    <a href="{{ route('reading_article',['id' => $article->id]) }}" class="btn read-article-btn">@lang('messages.read_more')</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
