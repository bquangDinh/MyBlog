<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('homepage');
    }

    public function show_projects_page(){
        return view('projects');
    }

    public function show_portfolio_page(){
        //TODO: about me page
    }

    public function show_gallery_page(){
        //TODO: gallery page
    }
}
