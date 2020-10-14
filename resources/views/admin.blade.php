<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ URL::asset('css/vendors/bootstrap.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ URL::asset('css/mypages/Master/admin.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/vendors/sweetalert2.min.css') }}">
        @yield('css')
    </head>
    <body>
        <div class="page-wrapper">
            <div class="left-container flex-item">
                <!-- SideBar -->
                <div class="animated slideInLeft sidebar">
                    <!-- head logo -->
                    <div class="head-logo" id="head-logo">
                        <div class="head-logo__inner"></div>
                    </div>
                    
                    <!-- collpase menu button -->
                    <button id="open-menubar-btn" style="display: none">
                        <i class="fas fa-arrow-right"></i>
                    </button>

                    <!-- sidebar options -->
                    <div class="w-100 sidebar-options-container">
                        <div class="sidebar-btn-container active">
                            <button class="sidebar-btn active" data-panel-id="dashboard-panel">
                                <i class="fas fa-circle-notch"></i>
                            </button>
                        </div>
                        <div class="sidebar-btn-container">
                            <button class="sidebar-btn" data-panel-id="article-panel">
                                <i class="fas fa-pen-alt"></i>
                            </button>
                        </div> 
                        <div class="sidebar-btn-container">
                            <button class="sidebar-btn" data-panel-id="media-panel">
                                <i class="far fa-images"></i>
                            </button>
                        </div> 
                        <div class="sidebar-btn-container">
                            <button class="sidebar-btn" data-panel-id="project-panel">
                                <i class="fas fa-atom"></i>
                            </button>
                        </div> 
                    </div>   
                </div>

                <!-- MenuBar -->
                <div class="animated slideInLeft menubar" id="menubar">
                    <button id="collapse-menu-btn">
                        <i class="fas fa-arrow-left"></i>
                    </button>
                    
                    <div id="dashboard-panel" class="panel">
                        <div class="title menubar-animated-item show" style="--index: 0;">
                            Dashboard
                        </div>
                        <div class="sub-option-container mt-5">
                            <div class="sub-option-title menubar-animated-item show" style="--index: 1;">
                                View
                            </div>
                            <ul class="sub-option-list list-unstyled">
                                <li class="menubar-animated-item show" style="--index: 2;">
                                    <a href="#" class="sub-option">
                                        <i class="far fa-eye"></i>
                                        <span>Overview</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="sub-option-container mt-5">
                            <div class="sub-option-title menubar-animated-item show" style="--index: 1;">
                                Manage
                            </div>
                            <ul class="sub-option-list list-unstyled">
                                <li class="menubar-animated-item show" style="--index: 2;">
                                    <a href="#" class="sub-option">
                                        <i class="fas fa-plus"></i>
                                        <span>New Article</span>
                                    </a>
                                </li>
                                <li class="menubar-animated-item show" style="--index: 3;">
                                    <a href="#" class="sub-option">
                                        <i class="fas fa-minus-circle"></i>
                                        <span>Hided</span>
                                    </a>
                                </li>
                                <li class="menubar-animated-item show" style="--index: 4;">
                                    <a href="#" class="sub-option">
                                        <i class="far fa-trash-alt"></i>
                                        <span>Deleted</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div id="article-panel" class="panel" style="display: none">
                        <div class="title menubar-animated-item show" style="--index: 0;">
                            Article
                        </div>
                        <div class="sub-option-container mt-5">
                            <div class="sub-option-title menubar-animated-item show" style="--index: 1;">
                                View
                            </div>
                            <ul class="sub-option-list list-unstyled">
                                <li class="menubar-animated-item show" style="--index: 2;">
                                    <a href="{{ route('overview_articles') }}?panel=article-panel" class="sub-option">
                                        <i class="far fa-eye menubar-icon" data-icon="overview"></i>
                                        <span>Overview</span>
                                    </a>
                                </li>
                                <li class="menubar-animated-item show" style="--index: 3;">
                                    <a href="{{ route('overview_articles') }}/Published?panel=article-panel" class="sub-option">
                                        <i class="fas fa-upload menu-icon" data-icon="published"></i>
                                        <span>Published</span>
                                    </a>
                                </li>
                                <li class="menubar-animated-item show" style="--index: 4;">
                                    <a href="{{ route('overview_articles') }}/Hided?panel=article-panel" class="sub-option">
                                        <i class="fas fa-minus-circle menu-icon" data-icon="hided"></i>
                                        <span>Hided</span>
                                    </a>
                                </li>
                                <li class="menubar-animated-item show" style="--index: 5;">
                                    <a href="{{ route('overview_articles') }}/Saved?panel=article-panel" class="sub-option">
                                        <i class="far fa-save menu-icon" data-icon="saved"></i>
                                        <span>Saved</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="sub-option-container mt-5">
                            <div class="sub-option-title menubar-animated-item show" style="--index: 1;">
                                Manage
                            </div>
                            <ul class="sub-option-list list-unstyled">
                                <li class="menubar-animated-item show" style="--index: 2;">
                                    <a href="{{ route('new_article') }}?panel=article-panel" class="sub-option">
                                        <i class="fas fa-plus"></i>
                                        <span>New</span>
                                    </a>
                                </li> 
                                <li class="menubar-animated-item show" style="--index: 3;">
                                    <a href="{{ route('editing_manager') }}?panel=article-panel" class="sub-option">
                                        <i class="far fa-edit"></i>
                                        <span>Manager</span>
                                    </a>
                                </li> 
                            </ul>
                        </div>
                    </div>

                    <div id="media-panel" class="panel" style="display: none">
                        <div class="title menubar-animated-item show" style="--index: 0;">
                            Media
                        </div>
                        <div class="sub-option-container mt-5">
                            <div class="sub-option-title menubar-animated-item show" style="--index: 1;">
                                View
                            </div>
                            <ul class="sub-option-list list-unstyled">
                                <li class="menubar-animated-item show" style="--index: 2;">
                                    <a href="{{ route('picture_viewer') }}?panel=media-panel" class="sub-option">
                                        <i class="far fa-image"></i>
                                        <span>Pictures</span>
                                    </a>
                                </li>
                                <li class="menubar-animated-item show" style="--index: 3;">
                                    <a href="#" class="sub-option unavailabled">
                                        <i class="fas fa-video"></i>
                                        <span>Videos</span>
                                    </a>
                                </li>
                                <li class="menubar-animated-item show" style="--index: 4;">
                                    <a href="{{ route('music_viewer') }}?panel=media-panel" class="sub-option">
                                        <i class="fas fa-music"></i>
                                        <span>Musics</span>
                                    </a>
                                </li>
                                <li class="menubar-animated-item show" style="--index: 5;">
                                    <a href="{{ route('playlist_viewer') }}?panel=media-panel" class="sub-option">
                                        <i class="fas fa-compact-disc"></i>
                                        <span>Playlists</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="sub-option-container mt-5">
                            <div class="sub-option-title menubar-animated-item show" style="--index: 1;">
                                Manage
                            </div>
                            <ul class="sub-option-list list-unstyled">
                                <li class="menubar-animated-item show" style="--index: 1;">
                                    <a href="{{ route('adding_track_page') }}?panel=media-panel" class="sub-option">
                                        <i class="fas fa-plus"></i>
                                        <span>New track</span>
                                    </a>
                                </li>
                                <li class="menubar-animated-item show" style="--index: 2;">
                                    <a href="{{ route('adding_playlist_page') }}?panel=media-panel" class="sub-option">
                                        <i class="fas fa-plus"></i>
                                        <span>New playlist</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div id="project-panel" class="panel" style="display: none">
                        <div class="title menubar-animated-item show" style="--index: 0;">
                            Project
                        </div>
                        <div class="sub-option-container mt-5">
                            <div class="sub-option-title menubar-animated-item show" style="--index: 1;">
                                View
                            </div>
                            <ul class="sub-option-list list-unstyled">
                                <li class="menubar-animated-item show" style="--index: 2;">
                                    <a href="{{ route('overview_projects') }}?panel=project-panel" class="sub-option">
                                        <i class="far fa-eye menu-icon" data-icon="overview"></i>
                                        <span>Overview</span>
                                    </a>
                                </li>
                                <li class="menubar-animated-item show" style="--index: 3;">
                                    <a href="{{ route('overview_projects') }}/Published?panel=project-panel" class="sub-option">
                                        <i class="fas fa-upload menu-icon" data-icon="published"></i>
                                        <span>Published</span>
                                    </a>
                                </li>
                                <li class="menubar-animated-item show" style="--index: 4;">
                                    <a href="{{ route('overview_projects') }}/Hided?panel=project-panel" class="sub-option">
                                        <i class="fas fa-minus-circle menu-icon" data-icon="hided"></i>
                                        <span>Hided</span>
                                    </a>
                                </li>
                                <li class="menubar-animated-item show" style="--index: 5;">
                                    <a href="{{ route('overview_projects') }}/Saved?panel=project-panel" class="sub-option">
                                        <i class="far fa-save menu-icon" data-icon="saved"></i>
                                        <span>Saved</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="sub-option-container mt-5">
                            <div class="sub-option-title menubar-animated-item show" style="--index: 1;">
                                Manage
                            </div>
                            <ul class="sub-option-list list-unstyled">
                                <li class="menubar-animated-item show" style="--index: 2;">
                                    <a href="{{ route('new_project') }}?panel=media-panel" class="sub-option">
                                        <i class="fas fa-plus"></i>
                                        <span>New Project</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- MainContent -->
            <div class="main-content flex-item" id="main-content">
                @yield('main-content')
            </div>

            <!-- Author Panel -->
            <div class="d-none d-lg-block author-container flex-item">
                <div class="animated slideInRight author-panel" id="author-panel">
                    <div class="author-panel__inner">
                        <button id="close-author-panel-btn">
                            <i class="fas fa-times"></i>
                        </button>
                        <div class="upper-panel d-flex justify-content-center align-items-center flex-column">
                            <div class="author-avatar author-animated-item show" style="--index: 0;">
                                <img src="{{ URL::asset('sources/media/images/private/author_avatar.jpg') }}" alt="author avatar">
                            </div>
                            <div class="author-name author-animated-item show" style="--index: 1;">
                                Hello, Dinh!
                            </div>
                            <div class="date author-animated-item show" style="--index: 2;">
                                Sunday, 3/22/2020
                            </div>
                        </div>
                    </div>       
                </div>
                
                <!-- Author Mini Panel -->
                <div id="author-mini-panel" class="deactive">
                    <button id="open-author-panel">
                        <i class="fas fa-user-astronaut"></i>
                    </button>
                </div>
            </div>
        </div>
        <script src="{{ URL::asset('js/vendors/jquery-3.4.1.min.js') }}" charset="utf-8"></script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="https://unpkg.com/tippy.js@6"></script>
        <script src="{{ URL::asset('js/vendors/bootstrap.min.js') }}" charset="utf-8"></script>
        <script src="{{ URL::asset('js/vendors/sweetalert2.min.js') }}" charset="utf-8"></script>
        <script src="{{ URL::asset('js/admin.js') }}" charset="utf-8"></script>
        @yield('js')
    </body>
</html>