<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MediaService;

class AdminController extends Controller
{
    public function index(){
        return view('mypages/ArticlePages/view_article');
    }

    /*Article Pages*/
    public function show_new_article(){
        return view('mypages/ArticlePages/new_article');
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
}
