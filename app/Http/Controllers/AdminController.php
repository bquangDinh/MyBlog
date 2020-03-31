<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('mypages/view_article');
    }

    public function show_new_article(){
        return view('mypages/new_article');
    }
}
