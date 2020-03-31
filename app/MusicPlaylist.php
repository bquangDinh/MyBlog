<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MusicPlaylist extends Model
{
    protected $table = 'music_playlist';

    public function playlist(){
        return $this->belongsTo('App\Playlist','playlist_id');
    }

    public function track(){
        return $this->hasOne('App\Music','music_id');
    }
}
