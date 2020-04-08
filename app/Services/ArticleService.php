<?php
namespace App\Services;

use App\Article;
use App\ArticleState;
use App\ArticleMusic;

use App\Services\MediaService;
use URL;

class ArticleService{
    public static function create_article($request, $author_id){
        //create article instance
        $title = $request->article_name;
        $language_id = $request->article_language;
        $type_id = $request->article_type;
        $cover_id = $request->cover_id;
        $cover_file = $request->file('cover_file');
        $content = $request->article_content;
        $description = $request->description;

        //calculate reading time
        $time = str_word_count($content) / 300;
        $total_seconds = intval($time) * 60 + intval(($time - intval($time)) * 60);
        $duration = $total_seconds;

        $article = new Article;
        $article->title = $title;
        $article->language_id = $language_id;
        $article->type_id = $type_id;
        $article->author_id = $author_id;
        
        if($cover_id != ""){
            $article->cover_id = $cover_id;
        }else if($cover_file != null){
            $image = MediaService::add_image($cover_file);
            $article->cover_id = $image->id;
        }

        $article->content = $content;
        $article->description = $description;
        $article->duration = $duration;

        $article->save();

        //create article state
        $article_state = new ArticleState;
        $article_state->article_id = $article->id;

        if($request->submit_btn == "publish"){
            $article_state->current_state = "publish";
        }else{
            $article_state->current_state = "save";
        }

        $article_state->save();

        //add music 
        $track_id = $request->track_id;
        $playlist_id = $request->playlist_id;

        if($playlist_id != "" || $track_id != ""){
            $article_music = new ArticleMusic;

            $article_music->article_id = $article->id;

            if($playlist_id != ""){
                $article_music->playlist_id = $playlist_id;
            }
            
            if($track_id != ""){
                $article_music->single_track_id = $track_id;
            }

            $article_music->save();
        }
    }   

    public static function get_published_articles(){
        $articles = array();
        $states = ArticleState::where('current_state','publish')->get();
        foreach($states as $state){
            array_push($articles,$state->article);
        }

        return $articles;
    }

    public static function get_article_by_id($id){
        return Article::find($id);
    }
}

?>