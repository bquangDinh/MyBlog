@extends('retro.layouts.retro_main_layout')

@section('meta')
<meta charset="utf-8">
@endsection

@section('title')
Terrainizing WebGL demo
@endsection

@section('css')
<style>
    canvas {
        width: 100%;
        height: 100%;
    }
    #gui{
        position: absolute;
        top: 55px;
        right: 0
    }

    #main-canvas{
        width: 100vw;
        height: calc(100vh - 70px) !important;
    }
</style>
<link rel="stylesheet" href="{{ URL::asset('experiments/f3c34840-09dc-4082-bc1f-733a485d940c/dat.gui.css') }}">
@endsection

@section('main-content')
<div class="navbar-margin"></div>
<canvas id="main-canvas"></canvas>
@endsection

@section('js')
<script src="{{ URL::asset('experiments/f3c34840-09dc-4082-bc1f-733a485d940c/stats.min.js') }}" charset="utf-8"></script>
<script src="{{ URL::asset('experiments/f3c34840-09dc-4082-bc1f-733a485d940c/dat.gui.min.js') }}" charset="utf-8"></script>
<script src="{{ URL::asset('experiments/f3c34840-09dc-4082-bc1f-733a485d940c/perlin.js') }}" charset="utf-8"></script>
<script src="{{ URL::asset('experiments/f3c34840-09dc-4082-bc1f-733a485d940c/three.js') }}"></script>
<script src="{{ URL::asset('experiments/f3c34840-09dc-4082-bc1f-733a485d940c/TrackballControls.js') }}" charset="utf-8"></script>
<script src="{{ URL::asset('experiments/f3c34840-09dc-4082-bc1f-733a485d940c/minecraft-three.js') }}" charset="utf-8"></script>
@endsection

