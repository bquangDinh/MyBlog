<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $table = 'playlist';

    public function tracks(){
        return $this->hasMany('App\MusicPlaylist');
    }
}
