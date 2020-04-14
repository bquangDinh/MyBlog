<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'setLocale'],function(){
    Route::get('/who_am_i','PageController@show_about_me_page')->name('about_me');

    Route::get('/reading/{id}','PageController@reading_article')->name('reading_article');
    Route::get('/show/{id}','PageController@show_project')->name('show_project');
    Route::get('/reading_project/{id}','PageController@reading_project')->name('reading_project');

    Route::get('/','PageController@index')->name('homepage');
    Route::get('/my_projects','PageController@show_projects_page')->name('projects_page');
});

Route::get('/login','LoginController@index');
Route::post('/loginattempt','LoginController@login')->name('login')->middleware('throttle');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::get('/','AdminController@index')->name('show_admin_dashboard');

    Route::prefix('article')->group(function(){
        Route::get('/overview/{state?}','AdminController@show_overview_articles')->name('overview_articles');
        Route::get('/new','AdminController@show_new_article')->name('new_article');
        Route::post('/create','ArticleController@create_article')->name('create_article');
        Route::get('/editing_manager','AdminController@show_editing_manager_page')->name('editing_manager');
        Route::delete('/delete_article','ArticleController@delete_article');
        Route::get('/edit_article/{id}','AdminController@show_editing_article_page')->name('edit_article');
        Route::get('/hide_article/{id}','ArticleController@hide_article');
        Route::get('/unhide_article/{id}','ArticleController@unhide_article');
        Route::post('/update_article','ArticleController@update_article')->name('update_article');
    });

    Route::prefix('media')->group(function(){
        Route::get('/music_viewer','AdminController@show_music_viewer_page')->name('music_viewer');
        Route::get('/playlist_viewer','AdminController@show_playlist_viewer_page')->name('playlist_viewer');
        Route::get('/add_new_track','AdminController@show_adding_track_page')->name('adding_track_page');
        Route::post('/add_track','MediaController@add_track')->name('add_track');
        Route::get('/add_new_playlist','AdminController@show_adding_playlist_page')->name('adding_playlist_page');
        Route::post('/add_playlist','MediaController@add_playlist')->name('add_playlist');
        Route::get('/picture_viewer','AdminController@show_picture_viewer_page')->name('picture_viewer');
        Route::post('/add_image','MediaController@add_image');
        Route::get('/edit_playlist/{id}','AdminController@show_editting_playlist_page')->name('edit_playlist');
        Route::post('/update_playlist','MediaController@update_playlist')->name('update_playlist');
    });

    Route::prefix('project')->group(function(){
        Route::get('/new_project','AdminController@show_new_project_page')->name('new_project');
        Route::post('/create_project','ProjectController@create')->name('create_project');
    });

    Route::prefix('action')->group(function(){
        Route::get('/get_tracks_as_json', 'MediaController@get_tracks_as_json');
        Route::get('/get_playlists_as_json','MediaController@get_playlists_as_json');
        Route::get('/get_images_as_json','MediaController@get_images_as_json');
    });
});