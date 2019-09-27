<?php

namespace App;
use DB;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public static function getAllProjectNotRequested()
    {
    return  DB::table('projects')
            ->LeftJoin('project__requests',function ($leftJoin) {
            $leftJoin->on('projects.id', '=', 'project__requests.project_id')
            ->where('project__requests.MD_id','=',Auth::User()->id);
            })
            ->where('project__requests.MD_id','=',null)
            ->where('projects.MD_id','=',null)
            ->get();
    }



    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function project_trainees()
    {
        return $this->belongsToMany('App\Project_Trainees');
    }
}
