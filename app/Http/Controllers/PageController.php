<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ArticleService;

class PageController extends Controller
{
    public function index(){
        $articles = ArticleService::get_published_articles();
        return view('homepage')->with('articles',$articles);
    }

    public function reading_article($id){
        $article = ArticleService::get_article_by_id($id);

        if($article == null || $article->state->current_state != "publish"){
            return redirect()->to("/");
        }

        return view('reading_article')->with('article',$article);
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
