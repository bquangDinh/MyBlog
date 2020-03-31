@extends('admin')

@section('title')
New Article
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/mypages/new_article.css') }}">
@endsection

@section('main-content')
<div class="new-article-container container animated slideInUp">
    <div class="point-deep-shadow" style="top: 10px; left: 10px"></div>
    <div class="point-deep-shadow" style="top: 10px; right: 10px"></div>
    <div class="point-deep-shadow" style="bottom: 10px; left: 10px"></div>
    <div class="point-deep-shadow" style="bottom: 10px; right: 10px"></div>
    <div class="container-title text-center mt-3">New Article</div>

    <div class="form-container w-100 mt-2 mb-2 disable-scrollbars">
        <form id="article-form" class="w-100">
            
            <div class="form-group w-75">
                <div class="input-field w-100">
                    <input type="text" name="article_name" class="txt-input" placeholder="Article Name" tabindex="1">
                </div>
            </div>
            <div class="form-group w-75">
                <div class="custom-select-field">
                    <div class="select-selected" tabindex="2">
                        <p></p>
                    </div>
                    <div class="select-items">
                    
                    </div>
                    <select name="article_type" id="article-type-select">
                        <option value="0">Diary</option>
                        <option value="1">Note</option>
                    </select>
                </div>
            </div>
            <div class="form-group w-75">
                <div class="custom-select-field">
                    <div class="select-selected" tabindex="3">
                        <p></p>
                    </div>
                    <div class="select-items">
                    
                    </div>
                    <select name="article_language" id="article-language-select">
                        <option value="0">Vietnamese</option>
                        <option value="1">English</option>
                    </select>
                </div>
            </div>
            <div class="form-group w-75">
                <div class="row">
                    <div class="col-6">
                        <div class="picking-container">
                            <i class="fas fa-check-circle used-icon"></i>
                            <div class="row">
                                <div class="col-6">
                                    <div class="picking-btn-container d-flex justify-content-center align-items-center">
                                        <div class="picking-btn-container__inner d-flex justify-content-center align-items-center">
                                            <button class="picking-btn" type="button">
                                                <i class="far fa-image"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="picking-container-name w-100 h-100 d-flex justify-content-start align-items-center">
                                        <div>
                                            Cover
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                    <div class="picking-container used">
                            <i class="fas fa-check-circle used-icon"></i>
                            <div class="row">
                                <div class="col-6">
                                    <div class="picking-btn-container d-flex justify-content-center align-items-center">
                                        <div class="picking-btn-container__inner d-flex justify-content-center align-items-center">
                                            <button class="picking-btn" type="button">
                                                <i class="fas fa-file-audio"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="picking-container-name w-100 h-100 d-flex justify-content-start align-items-center">
                                        <div>
                                            Music
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group w-75">
                <div class="picking-form">
                    <div id="cover-form w-100 h-100" class="picking-form-container hide">
                        <div class="tab-container d-flex justify-content-center">
                            <div class="tab-outer mt-3" style="width: 50%">
                                <div class="tab-slider" style="width: 40%;"></div>
                                <div class="row h-100">
                                    <div class="col-6">
                                        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                            <button type="button" class="tab-btn" data-tab-panel="database-picking-form">
                                                Database
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                            <button type="button" class="tab-btn" data-tab-panel="computer-picking-form">
                                                Computer
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-content w-100">
                            <div id="database-picking-form" class="form-child w-100 d-flex justify-content-center align-items-center flex-column">
                                <div id="image-records" style="width: 90%">
                                    <div class="image-record mt-2 record">
                                        <div class="row h-100">
                                            <div class="col-1">
                                                <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                                                    <label class="custom-radio-box">
                                                        <input type="radio" name="image_radio">
                                                        <span class="checkmark">
                                                            <i class="fas fa-check-circle"></i>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                                    <a href="http://127.0.0.1:8000/sources/media/images/private/author_avatar.jpg" class="image-name record-tab-1-cl" target="_blank">
                                                        author_avatar
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                                    <span class="image-type record-tab-2-cl">JPG</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="image-record mt-2 record">
                                        <div class="row h-100">
                                            <div class="col-1">
                                                <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                                                    <label class="custom-radio-box">
                                                        <input type="radio" name="image_radio">
                                                        <span class="checkmark">
                                                            <i class="fas fa-check-circle"></i>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                                    <a href="http://127.0.0.1:8000/sources/media/images/private/author_avatar.jpg" class="image-name record-tab-1-cl" target="_blank">
                                                        author_avatar
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                                    <span class="image-type record-tab-2-cl">JPG</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="image-record mt-2 record">
                                        <div class="row h-100">
                                            <div class="col-1">
                                                <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                                                    <label class="custom-radio-box">
                                                        <input type="radio" name="image_radio">
                                                        <span class="checkmark">
                                                            <i class="fas fa-check-circle"></i>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                                    <a href="http://127.0.0.1:8000/sources/media/images/private/author_avatar.jpg" class="image-name record-tab-1-cl" target="_blank">
                                                        author_avatar
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                                    <span class="image-type record-tab-2-cl">JPG</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="image-record mt-2 record">
                                        <div class="row h-100">
                                            <div class="col-1">
                                                <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                                                    <label class="custom-radio-box">
                                                        <input type="radio" name="image_radio">
                                                        <span class="checkmark">
                                                            <i class="fas fa-check-circle"></i>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                                    <a href="http://127.0.0.1:8000/sources/media/images/private/author_avatar.jpg" class="image-name record-tab-1-cl" target="_blank">
                                                        author_avatar
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                                    <span class="image-type record-tab-2-cl">JPG</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="image-record mt-2 record">
                                        <div class="row h-100">
                                            <div class="col-1">
                                                <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                                                    <label class="custom-radio-box">
                                                        <input type="radio" name="image_radio">
                                                        <span class="checkmark">
                                                            <i class="fas fa-check-circle"></i>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                                    <a href="http://127.0.0.1:8000/sources/media/images/private/author_avatar.jpg" class="image-name record-tab-1-cl" target="_blank">
                                                        author_avatar
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                                    <span class="image-type record-tab-2-cl">GIF</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pagination mt-3 w-100 d-flex justify-content-center align-items-center">
                                    <button type="button" id="previous-pagination-btn" class="pagination-btn">
                                        <i class="fas fa-angle-left"></i>
                                    </button>
                                    <button type="button" id="next-pagination-btn" class="pagination-btn ml-2">
                                        <i class="fas fa-angle-right"></i>
                                    </button>
                                </div>
                                <div class="picking-form-direction w-100 mt-3 mb-3 d-flex justify-content-end">
                                    <button type="button" data-direction="cancel" data-name="db-cover" class="direction-btn mr-3">
                                        Cancel
                                    </button>
                                    <button type="button" data-direction="ok" data-name="db-cover" class="direction-btn mr-3">
                                        OK
                                    </button>
                                </div>
                            </div>
                            <div id="computer-picking-form" class="form-hided form-child">
                                <div class="mt-3 w-100 d-flex justify-content-center align-items-center">
                                    <div id="cp-form-outer">
                                       <div id="cp-form-inner">
                                           <div id="droppable-file-zone" class="d-flex justify-content-center align-items-center">
                                                <i class="fas fa-plus"></i>
                                           </div>
                                       </div>
                                    </div>
                                </div>
                                <div class="picking-form-direction w-100 py-3 d-flex justify-content-end">
                                    <button type="button" id="cp-cancel-btn" class="direction-btn mr-3">
                                        Cancel
                                    </button>
                                    <button type="button" id="cp-ok-btn" class="direction-btn mr-3">
                                        OK
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="music-form w-100 h-100" class="picking-form-container">
                        <div class="tab-container d-flex justify-content-center">
                            <div class="tab-outer mt-3" style="width: 80%">
                                <div class="tab-slider" style="width: 25%"></div>
                                <div class="row h-100">
                                    <div class="col-4">
                                        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                            <button type="button" class="tab-btn" data-tab-panel="playlist-picking-form">
                                                Playlists
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                            <button type="button" class="tab-btn" data-tab-panel="singletrack-picking-form">
                                                Single Tracks
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                            <button type="button" class="tab-btn" data-tab-panel="computer-track-picking-form">
                                                Computer
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-content w-100">
                            <div id="playlist-picking-form" class="form-child w-100 d-flex justify-content-center align-items-center flex-column">
                                <div id="playlist-records" style="width: 90%">
                                    <div class="playlist-record mt-2 record">
                                        <div class="row h-100">
                                            <div class="col-1">
                                                <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                                                    <label class="custom-radio-box">
                                                        <input type="radio" name="playlist_radio">
                                                        <span class="checkmark">
                                                            <i class="fas fa-check-circle"></i>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                                    <span class="playlist-name record-tab-1-cl">Minecraft Soundtracks</span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                                    <span class="track-count record-tab-2-cl">6 tracks</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="playlist-record mt-2 record">
                                        <div class="row h-100">
                                            <div class="col-1">
                                                <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                                                    <label class="custom-radio-box">
                                                        <input type="radio" name="playlist_radio">
                                                        <span class="checkmark">
                                                            <i class="fas fa-check-circle"></i>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                                    <span class="playlist-name record-tab-1-cl">Minecraft Soundtracks</span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                                    <span class="track-count record-tab-2-cl">6 tracks</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="playlist-record mt-2 record">
                                        <div class="row h-100">
                                            <div class="col-1">
                                                <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                                                    <label class="custom-radio-box">
                                                        <input type="radio" name="playlist_radio">
                                                        <span class="checkmark">
                                                            <i class="fas fa-check-circle"></i>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                                    <span class="playlist-name record-tab-1-cl">Minecraft Soundtracks</span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                                    <span class="track-count record-tab-2-cl">6 tracks</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="playlist-record mt-2 record">
                                        <div class="row h-100">
                                            <div class="col-1">
                                                <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                                                    <label class="custom-radio-box">
                                                        <input type="radio" name="playlist_radio">
                                                        <span class="checkmark">
                                                            <i class="fas fa-check-circle"></i>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                                    <span class="playlist-name record-tab-1-cl">Minecraft Soundtracks</span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                                    <span class="track-count record-tab-2-cl">6 tracks</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="playlist-record mt-2 record">
                                        <div class="row h-100">
                                            <div class="col-1">
                                                <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                                                    <label class="custom-radio-box">
                                                        <input type="radio" name="playlist_radio">
                                                        <span class="checkmark">
                                                            <i class="fas fa-check-circle"></i>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                                    <span class="playlist-name record-tab-1-cl">Minecraft Soundtracks</span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                                    <span class="track-count record-tab-2-cl">6 tracks</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pagination mt-3 w-100 d-flex justify-content-center align-items-center">
                                    <button type="button" id="pl-previous-pagination-btn" class="pagination-btn">
                                        <i class="fas fa-angle-left"></i>
                                    </button>
                                    <button type="button" id="pl-next-pagination-btn" class="pagination-btn ml-2">
                                        <i class="fas fa-angle-right"></i>
                                    </button>
                                </div>
                                <div class="picking-form-direction w-100 mt-3 mb-3 d-flex justify-content-end">
                                    <button type="button" data-direction="cancel" data-name="playlist" class="direction-btn mr-3">
                                        Cancel
                                    </button>
                                    <button type="button" data-direction="ok" data-name="playlist" class="direction-btn mr-3">
                                        OK
                                    </button>
                                </div>
                            </div>

                            <div id="singletrack-picking-form" class="form-child form-hided d-flex justify-content-center align-items-center flex-column">
                                <div id="singletrack-records" style="width: 90%">
                                    <div class="singletrack-record mt-2 record">
                                        <div class="row h-100">
                                            <div class="col-1">
                                                <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                                                    <label class="custom-radio-box">
                                                        <input type="radio" name="singletrack_radio">
                                                        <span class="checkmark">
                                                            <i class="fas fa-check-circle"></i>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                                    <span class="singletrack-name record-tab-1-cl">A thoudsand year</span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                                    <span class="track-type record-tab-2-cl">MP3</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="singletrack-record mt-2 record">
                                        <div class="row h-100">
                                            <div class="col-1">
                                                <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                                                    <label class="custom-radio-box">
                                                        <input type="radio" name="singletrack_radio">
                                                        <span class="checkmark">
                                                            <i class="fas fa-check-circle"></i>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                                    <span class="singletrack-name record-tab-1-cl">A thoudsand year</span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                                    <span class="track-type record-tab-2-cl">MP3</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="singletrack-record mt-2 record">
                                        <div class="row h-100">
                                            <div class="col-1">
                                                <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                                                    <label class="custom-radio-box">
                                                        <input type="radio" name="singletrack_radio">
                                                        <span class="checkmark">
                                                            <i class="fas fa-check-circle"></i>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                                    <span class="singletrack-name record-tab-1-cl">A thoudsand year</span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                                    <span class="track-type record-tab-2-cl">MP3</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="singletrack-record mt-2 record">
                                        <div class="row h-100">
                                            <div class="col-1">
                                                <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                                                    <label class="custom-radio-box">
                                                        <input type="radio" name="singletrack_radio">
                                                        <span class="checkmark">
                                                            <i class="fas fa-check-circle"></i>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                                    <span class="singletrack-name record-tab-1-cl">A thoudsand year</span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                                    <span class="track-type record-tab-2-cl">MP3</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="singletrack-record mt-2 record">
                                        <div class="row h-100">
                                            <div class="col-1">
                                                <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                                                    <label class="custom-radio-box">
                                                        <input type="radio" name="singletrack_radio">
                                                        <span class="checkmark">
                                                            <i class="fas fa-check-circle"></i>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                                    <span class="singletrack-name record-tab-1-cl">A thoudsand year</span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                                    <span class="track-type record-tab-2-cl">MP3</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pagination mt-3 w-100 d-flex justify-content-center align-items-center">
                                    <button type="button" id="sg-previous-pagination-btn" class="pagination-btn">
                                        <i class="fas fa-angle-left"></i>
                                    </button>
                                    <button type="button" id="sg-next-pagination-btn" class="pagination-btn ml-2">
                                        <i class="fas fa-angle-right"></i>
                                    </button>
                                </div>
                                <div class="picking-form-direction w-100 mt-3 mb-3 d-flex justify-content-end">
                                    <button type="button" data-direction="cancel" data-name="singletrack" class="direction-btn mr-3">
                                        Cancel
                                    </button>
                                    <button type="button" data-direction="ok" data-name="singletrack" class="direction-btn mr-3">
                                        OK
                                    </button>
                                </div>
                            </div>

                            <div id="computer-track-picking-form" class="form-child form-hided d-flex justify-content-center align-items-center flex-column">
                                <div class="mt-3 w-100 d-flex justify-content-center align-items-center">
                                    <div id="sg-cp-form-outer">
                                       <div id="sg-cp-form-inner">
                                           <div id="sg-droppable-file-zone" class="d-flex justify-content-center align-items-center">
                                                <i class="fas fa-plus"></i>
                                           </div>
                                       </div>
                                    </div>
                                </div>
                                <div class="picking-form-direction w-100 py-3 d-flex justify-content-end">
                                    <button type="button" id="sg-cp-cancel-btn" class="direction-btn mr-3">
                                        Cancel
                                    </button>
                                    <button type="button" id="sg-cp-ok-btn" class="direction-btn mr-3">
                                        OK
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group w-75">
                <div class="custom-textarea-field">
                    <div class="text-area__inner">
                        <textarea name="article_content" id="article_content" tabindex="4"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group w-75">
                <div class="w-100 d-flex justify-content-around">
                    <button class="manage-article-btn" name="save-btn" type="submit" style="color: #F5F7F9">
                        Save
                    </button>
                    <button class="manage-article-btn" style="color: #F55E5E" type="submit" name="publish-btn">
                        Publish now
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.tiny.cloud/1/j3z8kdc0di1465wji07upkwwuc7exvti07rixz2ewht51abv/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{ URL::asset('js/vendors/smooth-scrollbar.js') }}" charset="utf-8"></script>
<script src="{{ URL::asset('js/mypages/new_article.js') }}"></script>
@endsection