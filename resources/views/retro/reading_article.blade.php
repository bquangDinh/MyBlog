@extends('retro.layouts.retro_main_layout')

@section('meta')
<meta name="description" content="{{ $article->description }}">
<meta property="og:url"                content="{{ route('reading_article',['id' => $article->id]) }}" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="{{ $article->title }}" />
<meta property="og:description"        content="{{ $article->description }}" />
@if($article->cover != null)
<meta property="og:image"              content="{{ $article->cover->url }}" />
@endif
@endsection

@section('title')
{{ $article->title }}
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/retro/reading_article.css') }}">
@endsection

@section('main-content')
<div class="navbar-margin"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-1 d-none d-lg-block"></div>
        <div class="col-md-10 col-12">
            @if($article->music != null)
            <div class="text-font text-center mt-3">
                Audio player will not be automatically and correctly played on Chrome because Chrome has recently changed its autoplay policy
                <a href="https://github.com/goldfire/howler.js/issues/939" target="_blank">(source)</a>. Please hit Stop button on Audio Player to switch to Play, and hit Play again to get the player running correctly.
                Other browsers will work fine.
            </div>
            @endif
            <div class="article-grid my-3">
                <div class="article-cover retro-border retro-shadow">
                    @if($article->cover != null)
                    <img src="{{ $article->cover->url }}" alt="article cover">
                    @endif
                </div>

                @if($article->music != null)

                @if($article->music->playlist != null)
                @foreach($article->music->playlist->tracks as $mtrack)
                <input type="text" class="track-source" value="{{ $mtrack->track->source }}" data-track-title="{{ $mtrack->track->title }}" style="display: none">
                @endforeach
                @endif

                @if($article->music->track != null)
                <input type="text" class="track-source" value="{{ $article->music->track->source }}" data-track-title="{{ $article->music->track->title }}" style="display: none">
                @endif

                <div class="article-media-container retro-shadow">
                    <div class="volume-big-screen-leftside-container retro-border">
                        <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                            <div class="slider-container volume-slider" id="volume-left-slider">
                                <input type="range" min="0" max="100">
                                <div class="slider-outer retro-shadow-sm">
                                    <div class="slider-inner" style="height: 50%">
                                        <div class="slider-point controlable-point">
                                            <div class="line"></div>
                                            <div class="line"></div>
                                            <div class="line"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <img src="{{ URL::asset('sources/media/images/private/disc.png') }}" alt="disc image" id="disc" class="spin-ani">
                        </div>
                    </div>
                    <div class="track-rightside-container retro-border">
                        <p class="track-name mt-3 text-font text-center" id="music-name">Subwoofer Lullaby - C418</p>
                                <div class="w-100 d-flex justify-content-center align-items-center">
                                    <button id="previous-song" class="track-direction-btn retro-border retro-shadow-sm text-font pb-2">
                                        <<
                                    </button>
                                    <label for="play-toggle-checkbox" id="play-toggle" class="px-2" style="display: none">
                                        <input type="checkbox" id="play-toggle-checkbox">
                                        <div id="toggle-container" class="retro-border retro-shadow-sm"></div>
                                    </label>
                                    <div class="text-font text-center px-2" id="loading-spinner">...loading...</div>
                                    <button id="next-song" class="track-direction-btn retro-border retro-shadow-sm text-font pb-2">
                                        >>
                                    </button>
                                </div>
                                <div class="mt-5 d-lg-none d-block w-100 d-flex justify-content-center align-items-center">
                                    <div class="slider-container volume-slider" id="volume-right-slider">
                                        <input type="range" min="0" max="100">
                                        <div class="slider-outer retro-shadow-sm">
                                            <div class="slider-inner" style="width: 50%">
                                                <div class="slider-point controlable-point" style="float: right">
                                                    <div class="line"></div>
                                                    <div class="line"></div>
                                                    <div class="line"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-md-5 mt-2 w-100 d-flex justify-content-center align-items-center">
                                    <div id="current-song-time" class="text-font">...</div>
                                    <div class="slider-container mx-3" id="duration-slider">
                                        <input type="range" min="0" max="100">
                                        <div class="slider-outer retro-shadow-sm">
                                            <div class="slider-inner" style="width: 100%">
                                                <div class="slider-point" style="float: right">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="song-duration" class="text-font">...</div>
                                </div>
                    </div>
                </div>
                @endif

                <div class="article-content-container retro-border retro-shadow">
                    <p class="text-center text-font mt-5 article-title">
                        {{ $article->title }}
                    </p>
                    <div class=" mt-4 w-100 d-flex justify-content-center align-items-center">
                        <div class="dashed-line"></div>
                    </div>

                    <div class=" w-100 mt-4 d-flex justify-content-center align-items-center">
                        <!--
                        <span class="article-published-datetime text-font mr-4">

                        </span>
                    -->
                        <b class="article-category text-font">
                            {{ $article->type->name }}
                        </b>
                    </div>
                    <div class="article-content text-font px-md-5 px-2 mt-3">
                        {!! $article->content !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1 d-none d-lg-block"></div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ URL::asset('js/vendors/smooth-scrollbar.js') }}" charset="utf-8"></script>
<script src="{{ URL::asset('js/vendors/howler.min.js') }}"></script>
<script src="{{ URL::asset('js/vendors/date.js') }}"></script>
<script src="{{ URL::asset('js/reading_article.js') }}"></script>
@endsection
