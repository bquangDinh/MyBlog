@extends('admin')

@section('title')
New playlist
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/mypages/Medias/add_new_playlist.css') }}">
@endsection

@section('main-content')
<div class="adding_playlist_container main-container animated slideInUp">
    <div class="point-deep-shadow" style="top: 10px; left: 10px"></div>
    <div class="point-deep-shadow" style="top: 10px; right: 10px"></div>
    <div class="point-deep-shadow" style="bottom: 10px; left: 10px"></div>
    <div class="point-deep-shadow" style="bottom: 10px; right: 10px"></div>
    <div class="top-title text-center mt-3">Add new playlist</div>

    <div class="form-container w-100 mt-2 mb-2 disable-scrollbars">
        <form action="{{ route('add_playlist') }}" method="POST" class="w-100 flex-form" id="add-playlist-form">
            @csrf
            <div class="form-group w-75">
                @error('playlist_title')
                <div class="error-message-container ml-2 mb-2 w-100">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ $message }}</span>
                </div>
                @enderror
                <div class="text-field w-100">
                    <input type="text" name="playlist_title" placeholder="Playlist's title" tabindex="1" required>
                </div>
            </div>
            <div class="form-group w-75">
                @error('playlist_description')
                <div class="error-message-container ml-2 mb-2 w-100">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ $message }}</span>
                </div>
                @enderror
                <div class="text-field w-100">
                    <input type="text" name="playlist_description" placeholder="Description" tabindex="2">
                </div>
            </div>
            <input type="text" style="display: none" name="selected_tracks" id="selected-tracks-input">
            <div class="form-group w-75">
                <div id="tl-title">Available Tracks</div>
                <div class="tracks-list" id="tracks-list">
                </div>
            </div>
            <div class="form-group w-75 d-flex justify-content-center">
                <button type="submit" name="submit" class="form-submit-btn" id="upload-btn">Upload</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script src="{{ URL::asset('js/vendors/howler.min.js') }}"></script>
<script src="{{ URL::asset('js/vendors/pagination.min.js') }}"></script>
<script src="{{ URL::asset('js/mypages/Medias/add_new_playlist_page.js') }}"></script>
@endsection