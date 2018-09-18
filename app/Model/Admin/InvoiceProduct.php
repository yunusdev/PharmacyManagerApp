<?php

namespace App\Model\Admin;

//use Illuminate\Database\Eloquent\Model;

class InvoiceProduct extends Model
{
    //
    public  function invoice(){

        return $this->belongsTo('App\Model\Admin\Invoice');

    }


}
