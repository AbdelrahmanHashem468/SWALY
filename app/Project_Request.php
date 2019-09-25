<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_Request extends Model
{
    protected $guarded = [];

    public static function  getRequestByMDIdandProjectId($MD_id , $project_id)
    {
        return Project_Request::where('MD_id',$MD_id)->where('project_id',$project_id)->get();
    }
}
