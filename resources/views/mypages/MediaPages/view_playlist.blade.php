@extends('admin')

@section('title')
View playlist
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/mypages/view_playlist.css') }}">
@endsection

@section('main-content')
<div class="playlists-container main-container animated slideInUp">
    <div class="point-deep-shadow" style="top: 10px; left: 10px"></div>
    <div class="point-deep-shadow" style="top: 10px; right: 10px"></div>
    <div class="point-deep-shadow" style="bottom: 10px; left: 10px"></div>
    <div class="point-deep-shadow" style="bottom: 10px; right: 10px"></div>
    <div class="top-title text-center mt-3">Playlists</div>

    <div class="playlists w-100 mt-2 mb-2 disable-scrollbars d-flex justify-content-center align-items-center flex-column">
        @foreach($playlists as $playlist)
        <div class="playlist-container mt-2 mb-2">
            <div class="row h-100">
                <div class="col-7">
                    <div class="w-100 h-100 playlist-name d-flex justify-content-center align-items-center">
                        <div>
                            <a data-toggle="collapse" href="#playlist-panel-{{ $playlist->id }}" role="button" aria-expanded="false" aria-controls="playlist-panel-{{ $playlist->id }}">
                                {{ $playlist->name }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                        <div>
                            <a href="{{ route('edit_playlist',['id' => $playlist->id]) }}" class="edit-playlist-btn btn">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="playlist-detail-panel w-100" id="playlist-panel-{{ $playlist->id }}">
            <div class="d-flex justify-content-center align-items-center flex-column">
                @foreach($playlist->tracks as $index => $mtrack)
                <div class="track-record mt-2 mb-2 w-75" data-track-source="{{ $mtrack->track->source }}" data-track-title="{{ $mtrack->track->title }}">
                    <div class="row h-100">
                        <div class="col-7">
                            <div class="w-100 h-100 track-name d-flex justify-content-center align-items-center">
                                <div>
                                    {{ $mtrack->track->title }}
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="w-100 h-100 track-type d-flex justify-content-center align-items-center">
                                <div>
                                    {{ $mtrack->track->type }}
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="w-100 h-100 track-controls d-flex justify-content-center align-items-center">
                                <label class="play-track-toggle" class="px-3">
                                    <input type="checkbox" data-track-index="{{ $index }}">
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
        @endforeach
    </div>
</div>
@endsection

@section('js')
<script src="{{ URL::asset('js/vendors/howler.min.js') }}"></script>
<script src="{{ URL::asset('js/vendors/pagination.min.js') }}"></script>
<script src="{{ URL::asset('js/mypages/view_playlist.js') }}"></script>
@endsection