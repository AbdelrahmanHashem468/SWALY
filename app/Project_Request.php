<?php

namespace App;
use DB;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Project_Request extends Model
{
    protected $guarded = [];

    public static function  getRequestByMDIdandProjectId( $MD_id , $project_id )
    {
        return Project_Request::where( 'MD_id' , $MD_id )->where( 'project_id' , $project_id )->get();
    }

    public static function getAllProjectRequested()
    {
        return DB::table('projects')
        ->join('project__requests', 'projects.id', '=', 'project__requests.project_id')
        ->join('users', 'project__requests.MD_id', '=', 'users.id')
        ->where('projects.customer_id','=',Auth::User()->id)
        ->orderBy('project__requests.project_id', 'desc')
        ->get();
    }

    public function User()
    {
        return $this->hasOne('App\User');
    }
}