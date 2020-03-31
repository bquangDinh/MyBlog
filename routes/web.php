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

Route::get('/reading', function () {
    return view('reading_article');
});

Route::get('/admin', function(){
    return view('mypages/view_article');
});

Route::get('/','PageController@index')->name('homepage');
Route::get('/projects','PageController@show_projects_page')->name('projects_page');


Route::get('/login','LoginController@index');
Route::post('/loginattempt','LoginController@login')->name('login');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('/','AdminController@index')->name('show_admin_dashboard');
    Route::get('/article/new','AdminController@show_new_article')->name('new_article');
});