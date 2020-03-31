@extends('admin')

@section('title')
Edit Articles
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/mypages/edit_article_manager.css') }}">
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
            <div class="col-md-6 col-12 mt-5 d-flex justify-content-center">
                <div class="article-holder-container">
                    <div class="article-holder-container__inner dropzone">
                        <div class="article-control-container draggable">
                            <div class="article-title mt-3 ml-3">
                                Making Minecraft Demo processing
                            </div>
                            <div class="article-status-chip mt-3 ml-3">
                                <div class="status__inner d-flex justify-content-center align-items-center" data-status="published">
                                    <div>
                                        Published
                                    </div>
                                </div>
                            </div>
                            <div class="article-info-container mt-4 ml-3">
                                <span class="article-info__published-date">
                                    June 20, 2020
                                </span>
                                <span class="article-info__language ml-4">
                                    English
                                </span>
                            </div>
                            <div class="article-controlling mt-3 mb-3 d-flex justify-content-around align-items-center">
                                <div class="article-controlling-btn">
                                    <button>
                                        <a href="#">Edit</a>
                                    </button>
                                </div>
                                <label class="switch d-flex justify-content-between">
                                    <div class="switch-title mr-3">
                                        Hide
                                    </div>
                                    <input type="checkbox">
                                    <div class="slider"></div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12 mt-5 d-flex justify-content-center">
                <div class="article-holder-container">
                    <div class="article-holder-container__inner dropzone">
                        <div class="article-control-container draggable">
                            <div class="article-title mt-3 ml-3">
                                Making Minecraft Demo processing
                            </div>
                            <div class="article-status-chip mt-3 ml-3">
                                <div class="status__inner d-flex justify-content-center align-items-center" data-status="published">
                                    <div>
                                        Published
                                    </div>
                                </div>
                            </div>
                            <div class="article-info-container mt-4 ml-3">
                                <span class="article-info__published-date">
                                    June 20, 2020
                                </span>
                                <span class="article-info__language ml-4">
                                    English
                                </span>
                            </div>
                            <div class="article-controlling mt-3 mb-3 d-flex justify-content-around align-items-center">
                                <div class="article-controlling-btn">
                                    <button>
                                        <a href="#">Edit</a>
                                    </button>
                                </div>
                                <label class="switch d-flex justify-content-between">
                                    <div class="switch-title mr-3">
                                        Hide
                                    </div>
                                    <input type="checkbox">
                                    <div class="slider"></div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12 mt-5 d-flex justify-content-center">
                <div class="article-holder-container">
                    <div class="article-holder-container__inner dropzone">
                        <div class="article-control-container draggable">
                            <div class="article-title mt-3 ml-3">
                                Making Minecraft Demo processing
                            </div>
                            <div class="article-status-chip mt-3 ml-3">
                                <div class="status__inner d-flex justify-content-center align-items-center" data-status="published">
                                    <div>
                                        Published
                                    </div>
                                </div>
                            </div>
                            <div class="article-info-container mt-4 ml-3">
                                <span class="article-info__published-date">
                                    June 20, 2020
                                </span>
                                <span class="article-info__language ml-4">
                                    English
                                </span>
                            </div>
                            <div class="article-controlling mt-3 mb-3 d-flex justify-content-around align-items-center">
                                <div class="article-controlling-btn">
                                    <button>
                                        <a href="#">Edit</a>
                                    </button>
                                </div>
                                <label class="switch d-flex justify-content-between">
                                    <div class="switch-title mr-3">
                                        Hide
                                    </div>
                                    <input type="checkbox">
                                    <div class="slider"></div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12 mt-5 d-flex justify-content-center">
                <div class="article-holder-container">
                    <div class="article-holder-container__inner dropzone">
                        <button class="controlling-context-btn" data-context="add">
                            <a href="#">
                                <i class="fas fa-plus"></i>
                            </a>
                        </button>
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