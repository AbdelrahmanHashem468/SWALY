<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_Trainees extends Model
{
    //

    public function project()
    {
        return $this->belongsToMany('App\Project');
    }
    public function user()
    {
        return $this->hasOne('App\User');
    }
}
