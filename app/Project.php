<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Project extends Model
{
    protected $table = "project";

    public function cover(){
        return $this->belongsTo('App\Media','cover_id');
    }

    public function author(){
        return $this->belongsTo('App\User','author_id');
    }

    public function state(){
        return $this->hasOne('App\ProjectState');
    }

    public function type(){
        return $this->belongsTo('App\ArticleType','type_id');
    }

    public function language(){
        return $this->belongsTo('App\ArticleLanguage','language_id');
    }

    public function music(){
        return $this->hasOne('App\ProjectMusic');
    }

    public function formattedCreatedAt(){
        return Carbon::parse($this->created_at)->toFormattedDateString();
    }
}
