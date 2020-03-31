<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';

    public function author(){
        return $this->belongsTo('App\User','author_id');
    }

    public function state(){
        return $this->hasOne('App\ArticleState');
    }

    public function type(){
        return $this->belongsTo('App\ArticleType','type_id');
    }

    public function language(){
        return $this->belongsTo('App\ArticleLanguage','language_id');
    }

    public function cover(){
        return $this->belongsTo('App\Media','cover_id');
    }

    public function music(){
        return $this->hasOne('App\ArticleMusic');
    }
}
