@extends('admin')

@section('title')
{{ $project->title }}
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/mypages/Projects/new_project.css') }}">
@endsection

@section('main-content')
<div class="new-project-container main-container animated slideInUp">
    <div class="point-deep-shadow" style="top: 10px; left: 10px"></div>
    <div class="point-deep-shadow" style="top: 10px; right: 10px"></div>
    <div class="point-deep-shadow" style="bottom: 10px; left: 10px"></div>
    <div class="point-deep-shadow" style="bottom: 10px; right: 10px"></div>
    <div class="top-title text-center mt-3">Edit Experiment</div>

    <div class="form-container w-100 mt-2 mb-2 disable-scrollbars">
        <form id="project-form" action="{{ route('update_project') }}" class="w-100 flex-form" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="project_id" value="{{ $project->id }}" style="display: none">
            <input type="text" name="cover_id" id="selected-image-id-input" value="{{ $project->cover_id }}" style="display: none">
            @if(isset($project->music))
            <input type="text" name="track_id" id="selected-track-id-input" value="{{ $project->music->single_track_id }}" style="display: none">
            <input type="text" name="playlist_id" id="selected-playlist-id-input" value="{{ $project->music->playlist_id }}" style="display: none">
            @else
            <input type="text" name="track_id" id="selected-track-id-input" value="" style="display: none">
            <input type="text" name="playlist_id" id="selected-playlist-id-input" value="" style="display: none">
            @endif

            <div class="form-group w-75">
                @error('project_name')
                <div class="error-message-container ml-2 mb-2 w-100">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ $message }}</span>
                </div>
                @enderror
                <div class="text-field w-100">
                    <input type="text" name="project_name" value="{{ $project->title }}" placeholder="Experiment Name" tabindex="1" required>
                </div>
            </div>
            <div class="form-group w-75">
                @error('description')
                <div class="error-message-container ml-2 mb-2 w-100">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ $message }}</span>
                </div>
                @enderror
                <div class="text-field w-100">
                    <input type="text" name="description" value="{{ $project->description }}" placeholder="Description" tabindex="2">
                </div>
            </div>
            <div class="form-group w-75">
                <div class="select-field">
                    <div class="select-selected" tabindex="2">
                        <p>
                            {{ $project->type->name }}
                        </p>
                    </div>
                    <div class="select-items">

                    </div>
                    <select name="project_type" id="article-type-select">
                        @foreach($types as $type)
                        @if($project->type_id == $type->id)
                        <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
                        @else
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endif 
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group w-75">
                <div class="select-field">
                    <div class="select-selected" tabindex="3">
                        <p>
                            {{ $project->language->name }}
                        </p>
                    </div>
                    <div class="select-items">

                    </div>
                    <select name="project_language" id="article-language-select">
                        @foreach($languages as $language)
                        @if($project->language_id == $language->id)
                        <option value="{{ $language->id }}" selected>{{ $language->name }}</option>
                        @else
                        <option value="{{ $language->id }}">{{ $language->name }}</option>
                        @endif 
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group w-75">
                <div class="row">
                    <div class="col-6">
                        <div class="picking-container {{ $project->cover_id != '' ? 'used' : '' }}" id="cover-picking-container">
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
                    <div class="picking-container {{ isset($project->music) ? 'used' : '' }}" id="music-picking-container">
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
                <div class="picking-form-container">
                    <div id="cover-form" class="picking-form hide">
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
                            <div id="database-picking-form" class="picking-form-main w-100 d-flex justify-content-center align-items-center flex-column">
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
                            <div id="computer-picking-form" class="picking-form-main hide">
                                <div class="mt-3 w-100 d-flex justify-content-center align-items-center flex-column">
                                    <div class="w-100 d-flex justify-content-around file-info-container">
                                        <div>Name: <span id="file-name">None</span></div>
                                        <div>Ext: <span id="file-extension">None</span></div>
                                        <div>Size: <span id="file-size">None</span></div>
                                    </div>
                                    <div id="cp-form-outer" class="mt-3 drag-container">
                                       <div id="cp-form-inner" class="drag-container__inner">
                                            <input type="file" id="cover-file" style="display: none" name="cover_file">
                                           <div id="droppable-file-zone" class="droppable-zone d-flex justify-content-center align-items-center">
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
                    <div id="music-form" class="w-100 h-100 picking-form hide">
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
                            <div id="playlist-picking-form" class="picking-form-main w-100 d-flex justify-content-center align-items-center flex-column">
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

                            <div id="singletrack-picking-form" class="picking-form-main hide d-flex justify-content-center align-items-center flex-column">
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
            <!--
            <div class="form-group w-75" id="selected-folder-container" style="display: none">
                <div class="folder-container">
                    <div class="d-flex justify-content-between">
                        <div class="mt-3 ml-3">
                            <i class="fas fa-folder folder-icon"></i>
                        </div>
                        <button class="upload-folder-btn mr-3" type="button" data-target-input="project-folder">
                            <i class="fas fa-upload"></i>
                        </button>
                    </div>
                    <div class="folder-name ml-3 mt-2" id="folder-name">
                        No folder selected
                    </div>
                    <div class="folder-count-files px-3 py-3" id="folder-files-count">
                        None
                    </div>
                    <input type="file" name="project_folder[]" id="project-folder" webkitdirectory multiple>
                    @error('project_folder')
                    <div class="d-flex justify-content-center py-3">
                        <div class="folder-additional-message">
                            <div class="error-message-container px-2 py-2 w-100">
                                <i class="fas fa-exclamation-circle"></i>
                                <span>{{ $message }}</span>
                            </div>
                        </div>
                    </div>
                    @enderror
                </div>
            </div>
        --> 

            <div class="form-group w-75">
                <div class="row">
                    <div class="col-3 switch-title">
                        Launchable Experiment?
                    </div>
                    <div class="col-9">
                        <label for="use-folder-switch" class="neumor-switch">
                            <input type="checkbox" name="is_launchable" id="use-folder-switch" {{ $project->project_source_file ? 'checked' : ''}}>
                            <div class="outer">
                                <div class="inner">
                                    <div class="switch-point"></div>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
                <div class="form-group w-75" id="launchable-exp-textbox" style="{{ !$project->project_source_file ? 'display: none;' : '' }}">
                @error('launchable_experiment_id')
                <div class="error-message-container ml-2 mb-2 w-100">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ $message }}</span>
                </div>
                @enderror
                <div class="text-field w-100">
                    <input type="text" name="launchable_experiment_id" value="{{ $project->project_source_file }}" placeholder="Experiment's ID" tabindex="1">
                </div>
            </div>

            <div class="form-group w-75">
                <div class="row">
                    <div class="col-3 switch-title">
                        Include github URL
                    </div>
                    <div class="col-9">
                        <label for="github-url-switch" class="neumor-switch">
                            <input type="checkbox" name="is_github_url" id="github-url-switch" {{ $project->github_url ? 'checked' : '' }} >
                            <div class="outer">
                                <div class="inner">
                                    <div class="switch-point"></div>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
                <div class="form-group w-75" id="github-textbox" style="{{ !$project->github_url ? 'display: none;' : '' }}">
                @error('is_github_url')
                <div class="error-message-container ml-2 mb-2 w-100">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ $message }}</span>
                </div>
                @enderror
                <div class="text-field w-100">
                    <input type="text" name="github_url" value="{{ $project->github_url }}" placeholder="Github URL" tabindex="1">
                </div>
            </div>

            <div class="form-group w-75">
                @error('project_content')
                <div class="error-message-container ml-2 mb-2 w-100">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ $message }}</span>
                </div>
                @enderror
                <div class="custom-textarea-field">
                    <div class="text-area__inner">
                        <textarea name="project_content" id="article_content" tabindex="4">
                            {{ $project->content }}
                        </textarea>
                    </div>
                </div>
            </div>
            <div class="form-group w-75">
                <div class="w-100 d-flex justify-content-around">
                    <button class="form-submit-btn" name="submit_btn" type="submit" style="color: #F5F7F9" value="save">
                        Save
                    </button>
                    <button class="form-submit-btn" style="color: #F55E5E" type="submit" name="submit_btn" value="publish">
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
<script type="module" src="{{ URL::asset('js/mypages/Projects/update_project.js') }}"></script>
@endsection
