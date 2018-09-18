<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    //
    public  function receiptProducts(){

        return $this->hasMany('App\Model\Admin\ReceiptProduct');

    }
}
