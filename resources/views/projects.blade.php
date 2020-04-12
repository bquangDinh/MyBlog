@extends('layouts.main_layout')

@section('title')
Projects
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/projects.css') }}">
@endsection

@section('main-content')
<div style="margin-top: 70px"></div>
<div class="projects-container container-fluid py-3">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            @foreach($projects as $project)
            <div class="project-container mt-5 w-100">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="project-cover-container d-flex justify-content-center align-items-center">
                            <img src="{{ $project->cover->url }}" alt="Project cover">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="project-info-container">
                            <div class="project-title">
                                <a href="#">
                                    {{ $project->title }}
                                </a>
                            </div>
                            <div class="project-description mt-3">
                                {{ $project->description }}
                            </div>
                            <div class="project-control mt-3 d-flex justify-content-start w-100">
                                <a href="{{ route('show_project',['id' => $project->id] ) }}" target="_blank" class="btn run-project-btn mr-3">
                                    <i class="far fa-play-circle"></i> Run Project
                                </a>
                                <a href="{{ route('reading_project',['id' => $project->id]) }}" class="btn read-project-btn">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="line mt-5"></div>
            @endforeach
        </div>
        <div class="col-1"></div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ URL::asset('js/vendors/smooth-scrollbar.js') }}" charset="utf-8"></script>
<script src="{{ URL::asset('js/projects.js') }}"></script>
@endsection