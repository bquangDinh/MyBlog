<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectMusic extends Model
{
    protected $table = "project_music";

    public function project(){
        return $this->belongsTo('App\Project','project_id');
    }

    public function playlist(){
        return $this->belongsTo('App\Playlist','playlist_id');
    }

    public function track(){
        return $this->belongsTo('App\Music','single_track_id');
    }
}
