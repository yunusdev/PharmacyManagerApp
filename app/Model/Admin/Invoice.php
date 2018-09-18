<?php

namespace App\Model\Admin;

//use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //

    public  function invoiceProducts(){

        return $this->hasMany('App\Model\Admin\InvoiceProduct');

    }
}
