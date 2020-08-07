@extends('retro.layouts.retro_main_layout')

@section('meta')

@endsection

@section('title')
{{ $experiment->title }}
@endsection

@section('css')
<link rel="shortcut icon" href="{{ URL::asset('experiments/a5810f8d-5d6f-4cdd-a237-24076150cfb4/TemplateData/favicon.ico') }}">
    <link rel="stylesheet" href="{{ URL::asset('experiments/a5810f8d-5d6f-4cdd-a237-24076150cfb4/TemplateData/style.css') }}">
@endsection

@section('main-content')
<div class="webgl-content">
    <div id="unityContainer" style="width: 960px; height: 600px"></div>
    <div class="footer">
      <div class="webgl-logo"></div>
      <div class="fullscreen" onclick="unityInstance.SetFullscreen(1)"></div>
      <div class="title">New Unity Project</div>
    </div>
  </div>
@endsection

@section('js')
<script src="{{ URL::asset('experiments/a5810f8d-5d6f-4cdd-a237-24076150cfb4/TemplateData/UnityProgress.js') }}"></script>
<script src="{{ URL::asset('experiments/a5810f8d-5d6f-4cdd-a237-24076150cfb4/Build/UnityLoader.js') }}"></script>
<script>
    var unityInstance = UnityLoader.instantiate("unityContainer", "{{ URL::asset('experiments/a5810f8d-5d6f-4cdd-a237-24076150cfb4/Build/BuildWeb.json') }}", {onProgress: UnityProgress});
</script>
@endsection

