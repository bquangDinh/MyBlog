<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\ArticleService;

class SearchController extends Controller
{
    public function search(Request $request){
        //get searching term
        $q = $request->term;
        $searched_articles = ArticleService::search_article($q);

        return view('retro.homepage')->with('articles',$searched_articles)->with('search_term', $q);
    }
}
