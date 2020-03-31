<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleMusic extends Model
{
    protected $table = 'article_music';

    public function article(){
        return $this->belongsTo('App\Article','article_id');
    }

    public function playlist(){
        return $this->belongsTo('App\Playlist','playlist_id');
    }

    public function track(){
        return $this->belongsTo('App\Music','single_track_id');
    }
}
