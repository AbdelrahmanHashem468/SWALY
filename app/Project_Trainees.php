<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_Trainees extends Model
{
    //
    protected $guarded = [];

    public function project()
    {
        return $this->belongsToMany('App\Project');
    }
    public function user()
    {
        return $this->hasOne('App\User','MTS_id');
    }
}
