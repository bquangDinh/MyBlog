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
            <div class="project-container mt-5 w-100">
                <div class="row">
                    <div class="col-6">
                        <div class="project-cover-container d-flex justify-content-center align-items-center">
                            <img src="https://trello-attachments.s3.amazonaws.com/5de853902cf4b55af33ca4ea/5dfa7195de8417853714dbcd/188eeff381f268173cb34f947b6e014e/Annotation_2019-12-14_204808.png">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="project-info-container">
                            <div class="project-title">
                                <a href="#">
                                    [Ludum Dare #38] Space Turtle: Behind the Scenes
                                </a>
                            </div>
                            <div class="project-description mt-3">
                                A behind the scenes video for my entry to the 38th Ludum Dare compo (make a game in 48hrs). The theme this time around was "A Small World".
                            </div>
                            <div class="project-control mt-3 d-flex justify-content-start w-100">
                                <a href="#" class="btn run-project-btn mr-3">
                                    <i class="far fa-play-circle"></i> Run Project
                                </a>
                                <a href="#" class="btn read-project-btn">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="line mt-5"></div>
            <div class="project-container mt-5 w-100">
                <div class="row">
                    <div class="col-6">
                        <div class="project-cover-container d-flex justify-content-center align-items-center">
                            <img src="https://trello-attachments.s3.amazonaws.com/5de853902cf4b55af33ca4ea/5dfa7195de8417853714dbcd/188eeff381f268173cb34f947b6e014e/Annotation_2019-12-14_204808.png">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="project-info-container">
                            <div class="project-title">
                                <a href="#">
                                    [Ludum Dare #38] Space Turtle: Behind the Scenes
                                </a>
                            </div>
                            <div class="project-description mt-3">
                                A behind the scenes video for my entry to the 38th Ludum Dare compo (make a game in 48hrs). The theme this time around was "A Small World".
                            </div>
                            <div class="project-control mt-3 d-flex justify-content-start w-100">
                                <a href="#" class="btn run-project-btn mr-3">
                                    <i class="far fa-play-circle"></i> Run Project
                                </a>
                                <a href="#" class="btn read-project-btn">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="line mt-5"></div>
            <div class="project-container mt-5 w-100">
                <div class="row">
                    <div class="col-6">
                        <div class="project-cover-container d-flex justify-content-center align-items-center">
                            <img src="https://trello-attachments.s3.amazonaws.com/5de853902cf4b55af33ca4ea/5dfa7195de8417853714dbcd/188eeff381f268173cb34f947b6e014e/Annotation_2019-12-14_204808.png">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="project-info-container">
                            <div class="project-title">
                                <a href="#">
                                    [Ludum Dare #38] Space Turtle: Behind the Scenes
                                </a>
                            </div>
                            <div class="project-description mt-3">
                                A behind the scenes video for my entry to the 38th Ludum Dare compo (make a game in 48hrs). The theme this time around was "A Small World".
                            </div>
                            <div class="project-control mt-3 d-flex justify-content-start w-100">
                                <a href="#" class="btn run-project-btn mr-3">
                                    <i class="far fa-play-circle"></i> Run Project
                                </a>
                                <a href="#" class="btn read-project-btn">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="line mt-5"></div>
        </div>
        <div class="col-1"></div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ URL::asset('js/vendors/smooth-scrollbar.js') }}" charset="utf-8"></script>
<script src="{{ URL::asset('js/projects.js') }}"></script>
@endsection