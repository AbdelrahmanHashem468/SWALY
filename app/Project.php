<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function project_trainees()
    {
        return $this->belongsToMany('App\Project_Trainees');
    }
}
