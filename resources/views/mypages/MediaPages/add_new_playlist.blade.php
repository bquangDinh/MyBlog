@extends('admin')

@section('title')
Add new track
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/mypages/add_new_playlist_page.css') }}">
@endsection

@section('main-content')
<div class="adding_playlist_container container animated slideInUp">
    <div class="point-deep-shadow" style="top: 10px; left: 10px"></div>
    <div class="point-deep-shadow" style="top: 10px; right: 10px"></div>
    <div class="point-deep-shadow" style="bottom: 10px; left: 10px"></div>
    <div class="point-deep-shadow" style="bottom: 10px; right: 10px"></div>
    <div class="container-title text-center mt-3">Add new playlist</div>

    <div class="form-container w-100 mt-2 mb-2 disable-scrollbars">
        <form action="{{ route('add_playlist') }}" method="POST" class="w-100 custom-form" id="add-playlist-form">
            @csrf
            <div class="form-group w-75">
                <div class="input-field w-100">
                    <input type="text" name="playlist_title" class="txt-input" placeholder="Playlist's title" tabindex="1" required>
                </div>
            </div>
            <div class="form-group w-75">
                <div class="input-field w-100">
                    <input type="text" name="playlist_description" class="txt-input" placeholder="Description" tabindex="2">
                </div>
            </div>
            <input type="text" style="display: none" name="selected_tracks" id="selected-tracks-input">
            <div class="form-group w-75">
                <div id="tl-title">Available Tracks</div>
                <div class="tracks-list" id="tracks-list">
                </div>
            </div>
            <div class="form-group w-75 d-flex justify-content-center">
                <button type="submit" name="submit" id="upload-btn">Upload</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script src="{{ URL::asset('js/vendors/howler.min.js') }}"></script>
<script src="{{ URL::asset('js/vendors/pagination.min.js') }}"></script>
<script src="{{ URL::asset('js/mypages/add_new_playlist_page.js') }}"></script>
@endsection