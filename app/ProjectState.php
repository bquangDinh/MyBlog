<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectState extends Model
{
    protected $table = "project_state";

    public function project(){
        return $this->belongsTo('App\Project','project_id');
    }
}
