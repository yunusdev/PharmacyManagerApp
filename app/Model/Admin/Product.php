<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function photo(){

        return $this->belongsTo('App\Model\User\Photo');

    }

}
