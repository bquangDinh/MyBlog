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
        <form id="article-form" action="{{ route('create_article') }}" class="w-100 custom-form" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="cover_id" id="selected-image-id-input" value="" style="display: none">
            <input type="text" name="track_id" id="selected-track-id-input" value="" style="display: none">
            <input type="text" name="playlist_id" id="selected-playlist-id-input" value="" style="display: none">


            <div class="form-group w-75">
                @error('article_name')
                <div class="error-message-container ml-2 mb-2 w-100">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ $message }}</span>
                </div>
                @enderror
                <div class="input-field w-100">
                    <input type="text" name="article_name" class="txt-input" placeholder="Article Name" tabindex="1" required>
                </div>
            </div>
            <div class="form-group w-75">
                @error('description')
                <div class="error-message-container ml-2 mb-2 w-100">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ $message }}</span>
                </div>
                @enderror
                <div class="input-field w-100">
                    <input type="text" name="description" class="txt-input" placeholder="Description" tabindex="2">
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
                        @foreach($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option> 
                        @endforeach
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
                        @foreach($languages as $language)
                        <option value="{{ $language->id }}">{{ $language->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group w-75">
                <div class="row">
                    <div class="col-6">
                        <div class="picking-container" id="cover-picking-container">
                            <i class="fas fa-check-circle used-icon"></i>
                            <div class="row">
                                <div class="col-6">
                                    <div class="picking-btn-container d-flex justify-content-center align-items-center">
                                        <div class="picking-btn-container__inner d-flex justify-content-center align-items-center">
                                            <button class="picking-btn" type="button" data-form-target="cover-form">
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
                    <div class="picking-container" id="music-picking-container">
                            <i class="fas fa-check-circle used-icon"></i>
                            <div class="row">
                                <div class="col-6">
                                    <div class="picking-btn-container d-flex justify-content-center align-items-center">
                                        <div class="picking-btn-container__inner d-flex justify-content-center align-items-center">
                                            <button class="picking-btn" type="button" data-form-target="music-form">
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
                    <div id="cover-form" class="picking-form-container hide">
                        <div class="tab-container d-flex justify-content-center">
                            <div class="tab-outer mt-3" style="width: 50%">
                                <div class="tab-slider" style="width: 40%;"></div>
                                <div class="row h-100">
                                    <div class="col-6">
                                        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                            <button type="button" class="tab-btn" data-tab-panel="database-picking-form" data-parent-form="cover-form">
                                                Database
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                            <button type="button" class="tab-btn" data-tab-panel="computer-picking-form" data-parent-form="cover-form">
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
                                </div>
                                <div class="picking-form-direction w-100 mt-3 mb-3 d-flex justify-content-end">
                                    <button type="button" data-direction="cancel" data-name="db-cover" class="direction-btn mr-3">
                                        Hide
                                    </button>
                                    <button type="button" data-direction="notused" data-name="db-cover" class="direction-btn mr-3">
                                        Not use
                                    </button>
                                    <button type="button" data-direction="ok" data-name="db-cover" class="direction-btn mr-3 disabled" disabled>
                                        OK
                                    </button>
                                </div>
                            </div>
                            <div id="computer-picking-form" class="form-hided form-child">
                                <div class="mt-3 w-100 d-flex justify-content-center align-items-center flex-column">
                                    <div class="w-100 d-flex justify-content-around file-info-container">
                                        <div>Name: <span id="file-name">None</span></div>
                                        <div>Ext: <span id="file-extension">None</span></div>
                                        <div>Size: <span id="file-size">None</span></div>
                                    </div>
                                    <div id="cp-form-outer" class="mt-3">
                                       <div id="cp-form-inner">
                                            <input type="file" id="cover-file" style="display: none" name="cover_file">
                                           <div id="droppable-file-zone" class="d-flex justify-content-center align-items-center">
                                                <i class="fas fa-plus"></i>
                                           </div>
                                       </div>
                                    </div>
                                </div>
                                <div class="picking-form-direction w-100 py-3 d-flex justify-content-end">
                                    <button type="button" data-direction="cancel" data-name="db-cover" class="direction-btn mr-3">
                                        Hide
                                    </button>
                                    <button type="button" data-direction="notused" data-name="db-cover" class="direction-btn mr-3">
                                        Not use
                                    </button>
                                    <button type="button" data-direction="ok" data-name="db-cover" class="direction-btn mr-3 disabled" disabled>
                                        OK
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="music-form" class="w-100 h-100 picking-form-container hide">
                        <div class="tab-container d-flex justify-content-center">
                            <div class="tab-outer mt-3" style="width: 50%">
                                <div class="tab-slider" style="width: 40%"></div>
                                <div class="row h-100">
                                    <div class="col-6">
                                        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                            <button type="button" class="tab-btn" data-tab-panel="playlist-picking-form" data-parent-form="music-form">
                                                Playlists
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                            <button type="button" class="tab-btn" data-tab-panel="singletrack-picking-form" data-parent-form="music-form">
                                                Single Tracks
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-content w-100">
                            <div id="playlist-picking-form" class="form-child w-100 d-flex justify-content-center align-items-center flex-column">
                                <div id="playlist-records" style="width: 90%">
                                </div>
                                <div class="picking-form-direction w-100 mt-3 mb-3 d-flex justify-content-end">
                                    <button type="button" data-direction="cancel" data-name="playlist" class="direction-btn mr-3">
                                        Cancel
                                    </button>
                                    <button type="button" data-direction="notused" data-name="playlist" class="direction-btn mr-3">
                                        Not use
                                    </button>
                                    <button type="button" data-direction="ok" data-name="playlist" class="direction-btn mr-3 disabled" disabled>
                                        OK
                                    </button>
                                </div>
                            </div>

                            <div id="singletrack-picking-form" class="form-child form-hided d-flex justify-content-center align-items-center flex-column">
                                <div id="singletrack-records" style="width: 90%">
                                </div>
                                <div class="picking-form-direction w-100 mt-3 mb-3 d-flex justify-content-end">
                                    <button type="button" data-direction="cancel" data-name="singletrack" class="direction-btn mr-3">
                                        Hide
                                    </button>
                                    <button type="button" data-direction="notused" data-name="singletrack" class="direction-btn mr-3">
                                        Not use
                                    </button>
                                    <button type="button" data-direction="ok" data-name="singletrack" class="direction-btn mr-3 disabled" disabled>
                                        OK
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group w-75">
                @error('article_content')
                <div class="error-message-container ml-2 mb-2 w-100">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ $message }}</span>
                </div>
                @enderror
                <div class="custom-textarea-field">
                    <div class="text-area__inner">
                        <textarea name="article_content" id="article_content" tabindex="4"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group w-75">
                <div class="w-100 d-flex justify-content-around">
                    <button class="manage-article-btn" name="submit_btn" type="submit" style="color: #F5F7F9" value="save">
                        Save
                    </button>
                    <button class="manage-article-btn" style="color: #F55E5E" type="submit" name="submit_btn" value="publish">
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
<script src="{{ URL::asset('js/vendors/pagination.min.js') }}"></script>
<script src="{{ URL::asset('js/mypages/new_article.js') }}"></script>
@endsection