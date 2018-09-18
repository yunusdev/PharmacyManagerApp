<?php

namespace App\Model\Admin;

//use Illuminate\Database\Eloquent\Model;

class Receive extends Model
{
    //
    public function photo(){

        return $this->belongsTo('App\Model\User\Photo');

    }

    public function supplier(){

        return $this->belongsTo('App\Model\Admin\Supplier');

    }


}
