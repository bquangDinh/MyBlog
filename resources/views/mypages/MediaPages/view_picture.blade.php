@extends('admin')

@section('title')
Your galary
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/mypages/Medias/view_picture.css') }}">
@endsection

@section('main-content')
<div class="picture-whole-container main-container animated slideInUp">
    <div class="point-deep-shadow" style="top: 10px; left: 10px"></div>
    <div class="point-deep-shadow" style="top: 10px; right: 10px"></div>
    <div class="point-deep-shadow" style="bottom: 10px; left: 10px"></div>
    <div class="point-deep-shadow" style="bottom: 10px; right: 10px"></div>
    <div class="top-title text-center mt-3">Pictures</div>

    <div class="pictures-container w-100 mt-2 mb-2 disable-scrollbars">
        <div class="row mx-2" id="picture-container">
            @foreach($images as $image)
            <div class="col-4 my-3">
                <div class="picture-container d-flex justify-content-center align-items-center">
                    <div class="picture-inner">
                        <img src="{{ $image->url }}" alt="pictures">
                        <input type="text" value="{{ $image->url }}" id="copy-text-{{ $image->id }}" style="display: none">
                        <div class="picture-hover d-flex justify-content-center align-items-center flex-column">
                            <button class="picture-copy-source-btn" data-copy-target="copy-text-{{ $image->id }}">Copy Source</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-4 my-3">
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
<script type="module" src="{{ URL::asset('js/mypages/Medias/view_picture.js') }}"></script>
@endsection