<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customeremail extends Model
{
    //
    protected $table = "customer_email";
    public function getDetails($customerId){
        return Customeremail::select("email")->where("customerId",$customerId)->get();
    }
}
