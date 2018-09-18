<?php

namespace App\Model\Admin;

//use Illuminate\Database\Eloquent\Model;

class RequestProduct extends Model
{
    //
    public  function request(){

        return $this->belongsTo('App\Model\Admin\Request');

    }

}
