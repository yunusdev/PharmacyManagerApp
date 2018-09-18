<?php

namespace App\Model\Admin;

//use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    //

    public function supplier(){

        return $this->belongsTo('App\Model\Admin\Supplier');

    }

    public  function requestProducts(){

        return $this->hasMany('App\Model\Admin\RequestProduct');

    }
}
