<?php

namespace App\Model\Admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    public function roles(){

        return $this->belongsToMany('App\Model\Admin\Role', 'admin_roles');

    }

//    public function getNameAttribute($value){
//
//        return ucfirst($value);
//
//    }

    public function photo(){

        return $this->belongsTo('App\Model\User\Photo');

    }

    protected $fillable = [
        'name', 'email', 'password','phone', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


}
