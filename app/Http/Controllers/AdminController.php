<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MediaService;
use App\Services\ArticleService;

class AdminController extends Controller
{
    public function index(){
        return view('mypages/DashboardPages/admin_dashboard');
    }

    /*Article Pages*/
    public function show_new_article(){
        $types = ArticleService::get_all_article_types();
        $languages = ArticleService::get_all_article_languages();
        return view('mypages/ArticlePages/new_article')->with('types',$types)->with('languages',$languages);;
    }

    /*Media Pages*/
    public function show_music_viewer_page(){
        $tracks = MediaService::get_all_tracks();
        return view('mypages/MediaPages/view_music')->with('tracks',$tracks);
    }

    public function show_playlist_viewer_page(){
        $playlists = MediaService::get_all_playlists();
        return view('mypages/MediaPages/view_playlist')->with('playlists',$playlists);
    }

    public function show_adding_track_page(){
        return view('mypages/MediaPages/add_new_track');
    }

    public function show_adding_playlist_page(){
        return view('mypages/MediaPages/add_new_playlist');
    }

    public function show_picture_viewer_page(){
        $images = MediaService::get_all_images();
        return view('mypages/MediaPages/view_picture')->with('images',$images);
    }

    public function show_editing_manager_page(){
        $articles = ArticleService::get_all_articles();
        return view('mypages/ArticlePages/edit_article_manager')->with('articles',$articles);
    }

    public function show_editing_article_page($id){
        $article = ArticleService::get_article_by_id($id);
        $types = ArticleService::get_all_article_types();
        $languages = ArticleService::get_all_article_languages();
        return view('mypages/ArticlePages/edit_article')->with('article',$article)->with('types',$types)->with('languages',$languages);
    }

    public function show_editting_playlist_page($id){
        $playlist = MediaService::get_playlist_by_id($id);
        return view('mypages/MediaPages/update_playlist')->with('playlist',$playlist);
    }

    public function show_overview_articles($state = null){
        $articles = ArticleService::get_article_by_state($state);
        return view('mypages/ArticlePages/view_article')->with('articles',$articles);
    }
}
