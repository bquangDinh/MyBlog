@extends('layouts.main_layout')

@section('meta')
<meta name="description" content="{{ $article->description }}">
<meta property="og:url"                content="{{ route('reading_article',['id' => $article->id]) }}" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="{{ $article->title }}" />
<meta property="og:description"        content="{{ $article->description }}" />
<meta property="og:image"              content="{{ $article->cover->url }}" />
@endsection

@section('title')
{{ $article->title }}
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/reading_article.css') }}">
@endsection

@section('main-content')
<input type="text" style="display: none" id="song-source" value="{{ URL::asset('sources/media/musics/Subwoofer_Lullaby.mp3') }}">
<div style="margin-top: 70px"></div>
<div class="reading-article-container container-fluid py-3">
    @if($article->cover != null)
    <div class="animated fadeInDown slow article-cover d-flex justify-content-center align-items-center">
        <img id="cover" src="{{ $article->cover->url }}" alt="article cover picture">
    </div>
    @endif
    <div class="row mt-4">
        <div class="col-md-2 col-sm-1 d-none d-sm-block"></div>
        <div class="col-md-8 col-sm-10 col-12 d-flex justify-content-center flex-column">
            @if($article->music != null)

            @if($article->music->playlist != null)
            @foreach($article->music->playlist->tracks as $mtrack)
            <input type="text" class="track-source" value="{{ $mtrack->track->source }}" data-track-title="{{ $mtrack->track->title }}" style="display: none">
            @endforeach
            @endif

            @if($article->music->track != null)
            <input type="text" class="track-source" value="{{ $article->music->track->source }}" data-track-title="{{ $article->music->track->title }}" style="display: none">
            @endif
            <div class="music-container animated fadeInDown slow">
                <div class="music-name text-center pt-4" id="music-name">Loading</div>
                <div class="music-controlable-panel">
                    <div class="control-panel d-flex justify-content-center align-items-center">
                        @if($article->music->playlist == null && $article->music->track != null)
                        <button id="previous-song" class="song-direction-btn disabled" disabled>
                            <i class="fas fa-backward"></i>
                        </button>
                        @else
                        <button id="previous-song" class="song-direction-btn">
                            <i class="fas fa-backward"></i>
                        </button>
                        @endif
                        <label id="play-toggle" class="px-3" style="display: none">
                            <input type="checkbox">
                            <div>
                            </div>
                        </label>
                        <div class="lds-ripple" id="loading-spinner"><div></div><div></div></div>
                        @if($article->music->playlist == null && $article->music->track != null)
                        <button id="next-song" class="song-direction-btn disabled" disabled>
                            <i class="fas fa-forward"></i>
                        </button>
                        @else
                        <button id="next-song" class="song-direction-btn">
                            <i class="fas fa-forward"></i>
                        </button>
                        @endif
                    </div>
                    <div class="row mt-3 pb-4 no-gutters">
                        <div class="col-md-2 col-sm-3 col-10 px-5 px-md-0">
                            <div class="d-flex justify-content-end align-items-center w-100">
                                <div id="volume-icon">
                                    <i class="fas fa-volume-up"></i>
                                </div>
                                <div class="slider-container w-75 px-2" id="volume-slider">
                                    <input type="range" min="0" max="100">
                                    <div class="slider-outer">
                                        <div class="slider-inner" style="width: 80%">
                                            <div class="slider-point"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-9 col-12 px-5 mt-2 mt-md-0 px-md-0">
                            <div class="w-100 d-flex justify-content-center align-items-center">
                                <div id="current-song-time">...</div>
                                <div class="slider-container px-2" id="duration-slider">
                                    <input type="range" min="0" max="100">
                                    <div class="slider-outer">
                                        <div class="slider-inner" style="width: 80%">
                                            <div class="slider-point"></div>
                                        </div>
                                    </div>
                                </div>
                                <div id="song-duration" class="pl-2">...</div>
                            </div>
                        </div>
                        <div class="col-md-2 d-none">
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="article-main-content w-100 animated fadeIn slow delay-1s mt-4">
                <div class="point-deep-shadow" style="top: 15px; left: 15px"></div>
                <div class="point-deep-shadow" style="top: 15px; right: 15px"></div>
                <div class="point-deep-shadow" style="bottom: 15px; right: 15px"></div>
                <div class="point-deep-shadow" style="bottom: 15px; left: 15px"></div>
                <div class="article-title text-center pt-5" id="article-title">
                    {{ $article->title }}
                </div>
                <div class="article-info text-center pb-5">
                    <span>{{ $article->created_at }}</span>
                    <span><b>{{ $article->type->name }}</b></span>
                </div>
                <div class="article-content px-5 pb-5">
                    {!! $article->content !!}
                </div>
                <div class="w-100 direction-container mt-5 mb-5 d-flex justify-content-center align-items-center flex-column">
                    <button type="button" id="share-btn" data-href="{{ route('reading_article',['id' => $article->id]) }}">
                        <i class="fas fa-share-alt"></i> @lang('messages.share')
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-1 d-none d-sm-block"></div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ URL::asset('js/vendors/smooth-scrollbar.js') }}" charset="utf-8"></script>
<script src="{{ URL::asset('js/vendors/howler.min.js') }}"></script>
<script src="{{ URL::asset('js/vendors/date.js') }}"></script>
<script src="{{ URL::asset('js/reading_article.js') }}"></script>
@endsection
