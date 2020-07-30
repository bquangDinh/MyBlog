<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ArticleService;
use App\Services\ProjectService;

class PageController extends Controller
{
    public function index(){
        //$articles = ArticleService::get_published_articles();
        //return view('homepage')->with('articles',$articles);

        return view('retro.about_me');
    }

    public function show_about_me_page(){
        return view('about_me');
    }

    public function reading_article($id){
        $article = ArticleService::get_article_by_id($id);

        if($article == null || $article->state->current_state != "Published"){
            return redirect()->to("/");
        }

        return view('reading_article')->with('article',$article);
    }

    public function show_projects_page(){
        $projects = ProjectService::get_projects_by_state("Published");
        return view('projects')->with('projects',$projects);
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

        return view('projects/'.$project->project_source_file);
    }

    public function reading_project($id){
        $project = ProjectService::get_project_by_id($id);

        if($project->state->current_state != "Published"){
            return redirect()->to('/');
        }

        return view('reading_project')->with('project',$project);
    }
}
