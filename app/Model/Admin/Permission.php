<?php

namespace App\Model\Admin;

//use Illuminate\Database\Eloquent\Model;

use App\Model\User\Model;

class Permission extends Model
{
    //

    public function roles(){

        return $this->belongsToMany('App\Model\Admin\Role', 'permission_role');

    }

}
