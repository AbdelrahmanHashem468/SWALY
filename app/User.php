<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phonenumber','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getAllCustomers()
    {
        return User::where('role','=','1')->get();
    }

    public function project()
    {
        return $this->hasMany('App\Project');
    }
    public function project_Request()
    {
        return $this->hasMany('App\Project_Request');
    }


    public function project_Trainees()
    {
        return $this->belongsTo('App\Project_Trainees');
    }
}
