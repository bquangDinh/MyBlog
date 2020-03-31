<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleState extends Model
{
    protected $table = 'article_state';

    public function article(){
        return $this->belongsTo('App\Article','article_id');
    }
}
