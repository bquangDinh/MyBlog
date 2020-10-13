@extends('admin')

@section('title')
Edit Articles
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/mypages/Articles/edit_article_manager.css') }}">
@endsection

@section('main-content')
<div class="edit-manager-container container-fluid disable-scrollbars">
    <div class="mt-4 mb-4">
        <form action="" id="searching-form">
            <div class="d-flex justify-content-around align-items-center">
                <input type="text" id="searching-field" name="searching-content" placeholder="Search for names">
                <i class="fas fa-search"></i>
            </div>
        </form>
        <div class="trash-can-container">
            <div class="trash-can-container__inner dropzone" id="trash-can">
                <div class="trash-can-bottom-layer d-flex justify-content-center align-items-center">
                    <i class="far fa-trash-alt"></i>
                </div>    
                <div class="trash-can-upper-layer d-flex justify-content-center align-items-center hide">
                    <i class="far fa-trash-alt"></i>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($articles as $article)
            <div class="col-md-6 col-12 mt-5 d-flex justify-content-center" id="article-whole-container-{{ $article->id }}">
                <div class="article-holder-container">
                    <div class="article-holder-container__inner dropzone" id="article-holder-{{ $article->id }}">
                        <div class="article-control-container draggable" id="article-control-container-{{ $article->id }}" data-article-id="{{ $article->id }}">
                            <div class="article-title mt-3 ml-3">
                                {{ $article->title }}
                            </div>
                            <div class="article-status-chip mt-3 ml-3">
                                <div class="status__inner d-flex justify-content-center align-items-center" data-status="{{ strtolower($article->state->current_state) }}" id="state-container-{{ $article->id }}">
                                    <div>
                                        {{ $article->state->current_state }}
                                    </div>  
                                </div>
                            </div>
                            <div class="article-info-container mt-4 ml-3">
                                <span class="article-info__published-date">
                                    {{ $article->type->name }}
                                </span>
                                <span class="article-info__language ml-4">
                                    {{ $article->language->name }}
                                </span>
                            </div>
                            <div class="article-controlling mt-3 mb-3 d-flex justify-content-around align-items-center">
                                <div class="article-controlling-btn">
                                    <a href="{{ route('edit_article',['id' => $article->id]) }}" class="btn d-flex justify-content-center align-items-center">Edit</a>
                                </div>
                                <label class="switch d-flex justify-content-between {{ $article->state->current_state == 'Saved' ? 'disabled-switch' : '' }}">
                                    <div class="switch-title mr-3">
                                        Hide
                                    </div>
                                    <input type="checkbox" {{ $article->state->current_state == 'Saved' ? 'disabled' : '' }} class="hide-article-checkbox" data-article-id="{{ $article->id }}" {{ $article->state->current_state == 'Hided' ? 'checked' : ''}}>
                                    <div class="slider"></div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-md-6 col-12 mt-5 d-flex justify-content-center">
                <div class="article-holder-container">
                    <div class="article-holder-container__inner dropzone">
                        <a class="controlling-context-btn btn" data-context="add" href="{{ route('new_article') }}?panel=article-panel">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.8/lib/draggable.bundle.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.8/lib/plugins/collidable.js"></script>
<script src="{{ URL::asset('js/mypages/edit_article_manager.js') }}"></script>
@endsection