<?php
namespace App\Services;

use App\Article;
use App\ArticleState;
use App\ArticleMusic;
use App\ArticleType;
use App\ArticleLanguage;

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
            $article_state->current_state = "Published";
        }else{
            $article_state->current_state = "Saved";
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

        return $article;
    }   

    public static function get_published_articles(){
        $articles = array();
        $states = ArticleState::where('current_state','Published')->get();
        foreach($states as $state){
            array_push($articles,$state->article);
        }

        return $articles;
    }

    public static function get_article_by_state($state){
        if($state == null){
            return Article::all();
        }

        $articles = array();
        $states = ArticleState::where('current_state',$state)->get();
        foreach($states as $state){
            array_push($articles,$state->article);
        }

        return $articles;
    }

    public static function get_article_by_id($id){
        return Article::find($id);
    }

    public static function get_all_articles(){
        return Article::all();
    }

    public static function hide_article($id){
        $article = Article::find($id);
        if($article == null) return -1;

        //change state of the article
        $article_state = $article->state;
        $article_state->current_state = "Hided";
        $article_state->save();

        return 0;
    }

    public static function unhide_article($id){
        $article = Article::find($id);
        if($article == null) return -1;

        //change state of the article
        $article_state = $article->state;
        $article_state->current_state = "Published";
        $article_state->save();

        return 0;
    }

    public static function delete_article($id){
        $article = Article::find($id);
        if($article == null) return -1;

        $article_music = $article->music;

        if($article_music != null){
            $article_music->delete();
        }

        $article_state = $article->state;

        if($article_state != null){
            $article_state->delete();
        }

        //safely deletion
        $article->delete();

        return 0;
    }

    public static function get_all_article_types(){
        return ArticleType::all();
    }

    public static function get_all_article_languages(){
        return ArticleLanguage::all();
    }

    public static function update_article($request){
        $article = Article::findOrFail($request->article_id);
        $article_state = $article->state;

        if($article_state == null){
            throw new Exception("Unable to find article state");
        }

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

        $article->title = $title;
        $article->language_id = $language_id;
        $article->type_id = $type_id;

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

        if($request->submit_btn == "publish"){
            $article_state->current_state = "Published";
        }else{
            $article_state->current_state = "Saved";
        }

        $article_state->save();

        $article_music = $article->music;

        if($article_music != null){
            //add music 
            $track_id = $request->track_id;
            $playlist_id = $request->playlist_id;

            if($playlist_id != "" || $track_id != ""){
                if($playlist_id != ""){
                    $article_music->playlist_id = $playlist_id;
                }
                
                if($track_id != ""){
                    $article_music->single_track_id = $track_id;
                }

                $article_music->save();
            }
        }

        return $article;
    }
}

?>