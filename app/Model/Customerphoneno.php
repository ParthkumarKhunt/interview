<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customerphoneno extends Model
{
    //
    protected $table = "customer_phoneno";

    public function getDetails($customerId){
        return Customerphoneno::select("phoneno")->where("customerId",$customerId)->get();
    }
}
