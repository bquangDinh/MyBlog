@extends('admin')

@section('title')
New track
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/mypages/Medias/add_new_track.css') }}">
@endsection

@section('main-content')
<div class="adding_track_container main-container animated slideInUp">
    <div class="point-deep-shadow" style="top: 10px; left: 10px"></div>
    <div class="point-deep-shadow" style="top: 10px; right: 10px"></div>
    <div class="point-deep-shadow" style="bottom: 10px; left: 10px"></div>
    <div class="point-deep-shadow" style="bottom: 10px; right: 10px"></div>
    <div class="top-title text-center mt-3">Add new track</div>

    <div class="form-container w-100 mt-2 mb-2 disable-scrollbars">
        <form action="{{ route('add_track') }}" method="POST" class="w-100 flex-form" id="add-track-form" enctype="multipart/form-data">
            @csrf
            <div class="form-group w-75">
                @error('track_title')
                <div class="error-message-container ml-2 mb-2 w-100">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ $message }}</span>
                </div>
                @enderror
                <div class="text-field w-100">
                    <input type="text" name="track_title" placeholder="Track's title" tabindex="1" required>
                </div>
            </div>
            <div class="form-group w-75 d-flex justify-content-around file-info-container">
                <div>Name: <span id="file-name">None</span></div>
                <div>Ext: <span id="file-extension">None</span></div>
                <div>Size: <span id="file-size">None</span></div>
            </div>
            <div class="form-group w-75">
                @error('track_file')
                <div class="error-message-container ml-2 mb-2 w-100">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ $message }}</span>
                </div>
                @enderror
                <div class="dropzone-field__outer">
                    <div class="dropzone-field__inner">
                        <input type="file" id="track-file" name="track_file">
                        <div class="dropzone-field" id="dropzone-track-field">
                            <i class="fas fa-plus"></i>
                        </div>
                    </div>
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
<script type="module" src="{{ URL::asset('js/mypages/Medias/add_new_track_page.js') }}"></script>
@endsection