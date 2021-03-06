<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ArticleService;
use App\Services\ProjectService;

class PageController extends Controller
{
    public function index(){
        $articles = ArticleService::get_published_articles();
        //return view('homepage')->with('articles',$articles);

        return view('retro.homepage')->with('articles',$articles);
    }

    public function show_about_me_page(){
        return view('retro.about_me');
    }

    public function reading_article($id){
        $article = ArticleService::get_article_by_id($id);

        if($article == null || $article->state->current_state != "Published"){
            return redirect()->to("/");
        }

        return view('retro.reading_article')->with('article',$article);
    }

    public function show_projects_page(){
        $projects = ProjectService::get_projects_by_state("Published");
        return view('retro.experiments')->with('experiments',$projects);
    }

    public function show_portfolio_page(){
        //TODO: about me page
    }

    public function show_gallery_page(){
        //TODO: gallery page
    }

    public function show_project($id){
        $project = ProjectService::get_project_by_id($id);

        if($project->state->current_state != "Published"){
            return redirect()->to('/');
        }

        return view('experiments.'.$project->project_source_file.'.index')->with('experiment',$project);
    }

    public function reading_project($id){
        $project = ProjectService::get_project_by_id($id);

        if($project->state->current_state != "Published"){
            return redirect()->to('/');
        }

        return view('retro.reading_experiment')->with('experiment',$project);
    }
}
