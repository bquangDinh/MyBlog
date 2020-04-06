@extends('admin')

@section('title')
View playlist
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/mypages/view_playlist.css') }}">
@endsection

@section('main-content')
<div class="playlists-container container animated slideInUp">
    <div class="point-deep-shadow" style="top: 10px; left: 10px"></div>
    <div class="point-deep-shadow" style="top: 10px; right: 10px"></div>
    <div class="point-deep-shadow" style="bottom: 10px; left: 10px"></div>
    <div class="point-deep-shadow" style="bottom: 10px; right: 10px"></div>
    <div class="container-title text-center mt-3">Playlists</div>

    <div class="playlists w-100 mt-2 mb-2 disable-scrollbars d-flex justify-content-center align-items-center flex-column">
        <div class="playlist-container mt-2 mb-2">
            <div class="row h-100">
                <div class="col-7">
                    <div class="w-100 h-100 playlist-name d-flex justify-content-center align-items-center">
                        <div>
                            <a data-toggle="collapse" href="#playlist-panel-1" role="button" aria-expanded="false" aria-controls="playlist-panel-1">Minecraft - Volume 1</a>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="w-100 h-100 playlist-date d-flex justify-content-center align-items-center">
                        <div>
                            Jun 20, 2020
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="playlist-detail-panel w-100" id="playlist-panel-1">
            <div class=" d-flex justify-content-center align-items-center flex-column">
                <div class="track-record mt-2 mb-2 w-75" data-track-source="http://127.0.0.1:8000/sources/media/musics/track_5e8ac64cbf255_1586153036.mp3" data-track-title="Key">
                    <div class="row h-100">
                        <div class="col-7">
                            <div class="w-100 h-100 track-name d-flex justify-content-center align-items-center">
                                <div>
                                    Key
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="w-100 h-100 track-type d-flex justify-content-center align-items-center">
                                <div>
                                    mp3
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
            </div>    
        </div>
        <div class="playlist-container mt-2 mb-2">
            <div class="row h-100">
                <div class="col-7">
                    <div class="w-100 h-100 playlist-name d-flex justify-content-center align-items-center">
                        <div>
                            <a data-toggle="collapse" href="#playlist-panel-2" role="button" aria-expanded="false" aria-controls="playlist-panel-1">Minecraft - Volume 1</a>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="w-100 h-100 playlist-date d-flex justify-content-center align-items-center">
                        <div>
                            Jun 20, 2020
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="playlist-detail-panel w-100" id="playlist-panel-2">
            <div class=" d-flex justify-content-center align-items-center flex-column">
                <div class="track-record mt-2 mb-2 w-75" data-track-source="http://127.0.0.1:8000/sources/media/musics/track_5e8b69d50cc52_1586194901.mp3" data-track-title="Subwoofer Lullaby">
                    <div class="row h-100">
                        <div class="col-7">
                            <div class="w-100 h-100 track-name d-flex justify-content-center align-items-center">
                                <div>
                                    Key
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="w-100 h-100 track-type d-flex justify-content-center align-items-center">
                                <div>
                                    mp3
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
            </div>    
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ URL::asset('js/vendors/howler.min.js') }}"></script>
<script src="{{ URL::asset('js/vendors/pagination.min.js') }}"></script>
<script src="{{ URL::asset('js/mypages/view_playlist.js') }}"></script>
@endsection