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
        'name', 'email', 'password','phonenumber','role','image_name',
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

    public function projectCustomer()
    {
        return $this->hasMany('App\Project','customer_id');
    }
    
    public function projectMD()
    {
        return $this->hasMany('App\Project','MD_id');
    }
    
    public function projectMTL()
    {
        return $this->hasMany('App\Project','MTL_id');
    }

    public function project_Trainees()
    {
        return $this->belongsTo('App\Project_Trainees');
    }

    public function project_Request()
    {
        return $this->hasMany('App\Project_Request');
    }


    
}
