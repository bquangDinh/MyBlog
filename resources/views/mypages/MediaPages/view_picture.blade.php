@extends('admin')

@section('title')
Musics Viewer
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/mypages/view_picture.css') }}">
@endsection

@section('main-content')
<div class="picture-whole-container container animated slideInUp">
    <div class="point-deep-shadow" style="top: 10px; left: 10px"></div>
    <div class="point-deep-shadow" style="top: 10px; right: 10px"></div>
    <div class="point-deep-shadow" style="bottom: 10px; left: 10px"></div>
    <div class="point-deep-shadow" style="bottom: 10px; right: 10px"></div>
    <div class="container-title text-center mt-3">Pictures</div>

    <div class="pictures-container">
        <div class="row" id="picture-container">
            @foreach($images as $image)
            <div class="col-4 mt-3">
                <div class="picture-container d-flex justify-content-center align-items-center">
                    <div class="picture-inner">
                        <img src="{{ $image->url }}" alt="pictures">
                        <input type="text" value="{{ $image->url }}" id="copy-text-{{ $image->id }}" style="display: none">
                        <div class="picture-hover d-flex justify-content-center align-items-center">
                            <button class="picture-copy-source-btn" data-copy-target="copy-text-{{ $image->id }}">Copy Source</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-4 mt-3">
                <form class="picture-container d-flex justify-content-center align-items-center" id="adding-picture-container">
                    <input type="file" id="adding-picture-file">
                    <div class="picture-inner d-flex justify-content-center align-items-center" id="picture-drop-zone">
                        <i class="fas fa-plus"></i>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ URL::asset('js/mypages/view_picture.js') }}"></script>
@endsection