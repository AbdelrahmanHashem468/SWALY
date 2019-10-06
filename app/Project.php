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



    public static function getProjectModule()
{
        $project=DB::table('projects')
        ->where('MTL_id','!=',null)
        ->where('customer_id','=',Auth::User()->id)
        ->join('project__trainees','id','=','project__trainees.project_id')
        ->join('users as usersc','customer_id','=','usersc.id')
        ->join('users as usersMD','MD_id','=','usersMD.id')
        ->join('users as usersMTL','MTL_id','=','usersMTL.id')
        ->join('users as usersTrain','project__trainees.MTS_id','=','usersTrain.id')
        ->select(
            'projects.project_name as pname',
            'projects.desc as pdesc',
            'projects.image_name as pimage',
            'projects.customer_id as pcusId',
            'projects.MD_id as pMdId',
            'projects.MTL_id as pMtlId',
            'projects.deadline as pdeadLine',
            'usersc.name as cusName',
            'usersMD.name as mdName',
            'usersMTL.name as mtlName',
            'usersTrain.name as trainName'
        )
        ->get();
    return $project;
}


    public static function getCustomernNamebyid($id)
    {
        return User::find($id) ;
    }

    public function CustomerUser()
    {
        return $this->belongsTo('App\User','customer_id');
    }

    public function MDUser()
    {
        return $this->belongsTo('App\User','MD_id');
    }


    public function MTLUser()
    {
        return $this->belongsTo('App\User','MTL_id');
    }

    public function project_trainees()
    {
        return $this->belongsToMany('App\Project_Trainees');
    }

    public function project_Request()
    {
        return $this->hasMany('App\Project_Request');
    }
}
