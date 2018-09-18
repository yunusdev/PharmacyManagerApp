<?php

namespace App\Model\Admin;

//use Illuminate\Database\Eloquent\Model;

use App\Model\User\Model;

class Role extends Model
{
    //

    public function admins(){

        return $this->belongsToMany('App\Model\Admin\Admin', 'admin_roles');

    }

    public function permissions(){

        return $this->belongsToMany('App\Model\Admin\Permission');

    }

}
