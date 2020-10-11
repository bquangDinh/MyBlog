@extends('retro.layouts.retro_main_layout')

@section('meta')
@endsection

@section('title')
@if(isset($search_term))
Search for: {{ $search_term }}
@else
Home
@endif
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/retro/homepage.css') }}">
@endsection

@section('main-content')
<div class="navbar-margin"></div>
@if(count($articles) == 0)
<div class="full-size-container">
    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
        <div class="nth text-font mt-5 text-center">Nothing here ;((</div>
    </div>
</div>
@else
<div class="flex-row mt-3">
    <div class="flex-column">
        @for($index = 0; $index < count($articles); $index = $index + 4)
        <div class="article-container mt-5 mb-1">
            <div class="article-inner-container retro-border">
                <div class="cover-container retro-border d-flex justify-content-center align-items-center">
                    <div class="cover-inner">
                        @if($articles[$index]->cover != null)
                        <img src="{{ $articles[$index]->cover->url }}" alt="article cover" class="retro-border">
                        @endif
                    </div>
                </div>
                <p class="article-title text-font mx-3 mt-2">{{ $articles[$index]->title }}</p>
                <div class="control-container d-flex justify-content-center align-items-center">
                    <a href="{{ route('reading_article',['id' => $articles[$index]->id]) }}" class="btn read-more-btn text-font retro-border">Read more</a>
                </div>
            </div>
        </div>
        @endfor
    </div>
    <div class="flex-column">
        @for($index = 1; $index < count($articles); $index = $index + 4)
        <div class="article-container mt-5 mb-1">
            <div class="article-inner-container retro-border">
                <div class="cover-container retro-border d-flex justify-content-center align-items-center">
                    <div class="cover-inner">
                        @if($articles[$index]->cover != null)
                        <img src="{{ $articles[$index]->cover->url }}" alt="article cover" class="retro-border">
                        @endif
                    </div>
                </div>
                <p class="article-title text-font mx-3 mt-2">{{ $articles[$index]->title }}</p>
                <div class="control-container d-flex justify-content-center align-items-center">
                    <a href="{{ route('reading_article',['id' => $articles[$index]->id]) }}" class="btn read-more-btn text-font retro-border">Read more</a>
                </div>
            </div>
        </div>
        @endfor
    </div>
    <div class="flex-column">
        @for($index = 2; $index < count($articles); $index = $index + 4)
        <div class="article-container mt-5 mb-1">
            <div class="article-inner-container retro-border">
                <div class="cover-container retro-border d-flex justify-content-center align-items-center">
                    <div class="cover-inner">
                        @if($articles[$index]->cover != null)
                        <img src="{{ $articles[$index]->cover->url }}" alt="article cover" class="retro-border">
                        @endif
                    </div>
                </div>
                <p class="article-title text-font mx-3 mt-2">{{ $articles[$index]->title }}</p>
                <div class="control-container d-flex justify-content-center align-items-center">
                    <a href="{{ route('reading_article',['id' => $articles[$index]->id]) }}" class="btn read-more-btn text-font retro-border">Read more</a>
                </div>
            </div>
        </div>
        @endfor
    </div>
    <div class="flex-column">
        @for($index = 3; $index < count($articles); $index = $index + 4)
        <div class="article-container mt-5 mb-1">
            <div class="article-inner-container retro-border">
                <div class="cover-container retro-border d-flex justify-content-center align-items-center">
                    <div class="cover-inner">
                        @if($articles[$index]->cover != null)
                        <img src="{{ $articles[$index]->cover->url }}" alt="article cover" class="retro-border">
                        @endif
                    </div>
                </div>
                <p class="article-title text-font mx-3 mt-2">{{ $articles[$index]->title }}</p>
                <div class="control-container d-flex justify-content-center align-items-center">
                    <a href="{{ route('reading_article',['id' => $articles[$index]->id]) }}" class="btn read-more-btn text-font retro-border">Read more</a>
                </div>
            </div>
        </div>
        @endfor
    </div>
</div>
@endif
@endsection


@section('js')
@endsection
