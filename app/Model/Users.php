<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Hash;
class Users extends Model
{
    //
    protected $table= 'users';
    
    public function register($request){
        
        $username = str_replace(' ', '', strtolower($request->input('username')));
        $countUsername = Users::where("username",$username)->count();
        if($countUsername == 0){
            $objUsers = new Users();
            $objUsers->username = $username;
            $objUsers->name = $request->input('name');
            $objUsers->birthdate = date("Y-m-d",strtotime($request->input('birthdate')));
            $objUsers->password = Hash::make($request->input('password'));
            $objUsers->is_deleted = "N";
            $objUsers->created_at = date("Y-m-d h:i:s");
            $objUsers->updated_at = date("Y-m-d h:i:s");
            if($objUsers->save()){
                return "true";
            }else{
                return "false";
            }
        }else{
            return "exits";
        }
    }
}
