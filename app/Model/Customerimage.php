<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
class Customerimage extends Model
{
    //
    protected $table = "customer_image";
    public function getDetails($customerId){
        return Customerimage::select("customerimage","id")->where("customerId",$customerId)->get();
    }

    public function deletePhoto($data){
        return DB::table('customer_image')->where('id', $data['id'])->delete();
    }
}
