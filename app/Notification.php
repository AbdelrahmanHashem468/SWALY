<?php

namespace App;
use DB;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $guarded = [];

    public static function getAllReadProjects()
    {
        return DB::table('projects')
        ->join('notifications', 'projects.id', '=', 'notifications.attachment')
        ->where('notifications.read','=',1)
        ->where('notifications.to_id','=',Auth::User()->id)
        ->where('notifications.type','=',1)->get();
    }
}
