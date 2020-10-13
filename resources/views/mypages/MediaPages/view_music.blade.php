@extends('admin')

@section('title')
Musics Viewer
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/mypages/Medias/view_music.css') }}">
@endsection

@section('main-content')
<div class="music-whole-container main-container animated slideInUp">
    <div class="point-deep-shadow" style="top: 10px; left: 10px"></div>
    <div class="point-deep-shadow" style="top: 10px; right: 10px"></div>
    <div class="point-deep-shadow" style="bottom: 10px; left: 10px"></div>
    <div class="point-deep-shadow" style="bottom: 10px; right: 10px"></div>
    <div class="top-title text-center mt-3">Tracks List</div>

    <div class="tracks-list w-100 mt-2 mb-2 disable-scrollbars d-flex justify-content-center align-items-center flex-column">
        @foreach($tracks as $track)
        <div class="track-container mt-2 mb-2" data-track-source="{{ $track->source }}" data-track-title="{{ $track->title }}">
            <div class="row h-100">
                <div class="col-7">
                    <div class="w-100 h-100 track-name d-flex justify-content-center align-items-center">
                        <div>
                            {{ $track->title }}
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="w-100 h-100 track-type d-flex justify-content-center align-items-center">
                        <div>
                            {{ $track->type }}
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="w-100 h-100 track-controls d-flex justify-content-center align-items-center">
                        <label class="play-track-toggle" class="px-3">
                            <input type="checkbox" data-track-index="0">
                            <div>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('js')
<script src="{{ URL::asset('js/vendors/howler.min.js') }}"></script>
<script src="{{ URL::asset('js/mypages/Medias/view_music.js') }}"></script>
@endsection