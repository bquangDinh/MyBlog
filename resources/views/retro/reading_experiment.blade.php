@extends('retro.layouts.retro_main_layout')

@section('meta')
<meta name="description" content="{{ $experiment->description }}">
<meta property="og:url"                content="{{ route('read_experiment',['id' => $experiment->id]) }}" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="{{ $experiment->title }}" />
<meta property="og:description"        content="{{ $experiment->description }}" />
@if($experiment->cover != null)
<meta property="og:image"              content="{{ $experiment->cover->url }}" />
@endif
@endsection

@section('title')
{{ $experiment->title }}
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/retro/reading_experiment.css') }}">
@endsection

@section('main-content')
<div class="navbar-margin"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-1 d-none d-lg-block"></div>
        <div class="col-md-10 col-12">
            <div class="article-grid my-3">
                <div class="article-cover retro-border retro-shadow">
                    @if($experiment->cover_id != null)
                    <img src="{{ $experiment->cover->url }}" alt="experiment preview">
                    @endif
                </div>

                @if($experiment->music != null)

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
                                    <label for="play-toggle-checkbox" id="play-toggle" class="px-2">
                                        <input type="checkbox" id="play-toggle-checkbox">
                                        <div id="toggle-container" class="retro-border retro-shadow-sm"></div>
                                    </label>
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


                <div class="experimental-article-controls-container retro-shadow">
                    <div class="row no-gutters w-100 h-100">
                        <div class="col-md-6 col-12 h-100">
                            @if($experiment->github_url != null)
                            <a href="{{ $experiment->github_url }}" class="btn view-source-btn viewable retro-border text-font">
                                View source code
                            </a>
                            @else
                            <a href="#" class="btn view-source-btn retro-border text-font">
                                Unviewable source
                            </a>
                            @endif
                        </div>
                        <div class="col-md-6 col-12 h-100">
                            @if($experiment->project_source_file != null)
                            <a target="_blank" href="{{ route('launch_experiment',['id' => $experiment->id]) }}" class="btn launch-btn launchable retro-border text-font">
                                Launch now
                            </a>
                            @else
                            <a href="#" class="btn launch-btn retro-border text-font">
                                Not for launching
                            </a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="article-content-container retro-border retro-shadow">
                    <p class="text-center text-font mt-5 article-title">
                        {{ $experiment->title }}
                    </p>
                    <div class=" mt-4 w-100 d-flex justify-content-center align-items-center">
                        <div class="dashed-line"></div>
                    </div>

                    @if($experiment->description != null)
                    <div class="article-content text-font px-md-5 px-2 mt-3">
                        {{ $experiment->description }}
                    </div>

                    <div class=" mt-4 w-100 d-flex justify-content-center align-items-center">
                        <div class="dashed-line"></div>
                    </div>
                    @endif

                    <div class="article-content text-font px-md-5 px-2 mt-3">
                        {!! $experiment->content !!}
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
