<?php

namespace App\Model\Admin;

//use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //

    public function receipt(){

        return $this->belongsTo('App\Model\Admin\Receipt');

    }
}
