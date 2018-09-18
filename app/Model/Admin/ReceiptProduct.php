<?php

namespace App\Model\Admin;

//use Illuminate\Database\Eloquent\Model;

class ReceiptProduct extends Model
{
    //
    public  function receipt(){

        return $this->belongsTo('App\Model\Admin\Receipt');

    }
}
