<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Users;
use Config;
use Auth;
use Session;
use Validator; 

class Logincontroller extends Controller
{
    //
    function __construct(){

    }

    public function login(Request $request){
        if($request->isMethod('post')){
           
            $validator = $request->validate([
                'username' => 'required|max:255',
                'password' => 'required',
            ]);

            $username = str_replace(' ', '', strtolower($request->input('username')));
            if (Auth::guard('user')->attempt(['username' => $username, 'password' => $request->input('password'), 'is_deleted' => "N"])) {
                
                $loginData = array(
                    'username' => Auth::guard('user')->user()->username,
                    'name' => Auth::guard('user')->user()->name,
                    'birthdate' => Auth::guard('user')->user()->birthdate,
                    'id' => Auth::guard('user')->user()->id
                );

                Session::push( 'logindata', $loginData );
                return redirect('dashboard')->with('success','Well Done login successfully');
                
            }else {
                return redirect()->back()->with('fail','Invalid Id/Password');
            }
           
        }
        $data['title'] = Config::get('constant.PROJECTNAME')." || Login";
        $data['description'] = Config::get('constant.PROJECTNAME')." || Login";
        $data['keywords'] = Config::get('constant.PROJECTNAME')." || Login";
        return view("pages.login.login",$data);
    }



    public function register(Request $request){
        if($request->isMethod('post')){
           
            $validator = $request->validate([
                'username' => 'required|max:255|unique:users',
                'name' => 'required|max:255',
                'password' => 'required',
                'birthdate' => 'required',
            ]);

            $objUser = new Users();
            $result = $objUser->register($request);
            if($result == "true"){
                return redirect('login')->with('success','Your details successfully registered');
            }else{
                if($result == "exits"){
                    return redirect()->back()->with('fail','The username has already been taken.');
                }else{
                    return redirect()->back()->with('fail','Something goes to wrong');
                }
            }
        }
        $data['title'] = Config::get('constant.PROJECTNAME')." || Register";
        $data['description'] = Config::get('constant.PROJECTNAME')." || Register";
        $data['keywords'] = Config::get('constant.PROJECTNAME')." || Register";
        return view("pages.register.register",$data);
    }


    public function logout(Request $request) {
        $this->resetGuard();
        return redirect()->route('login');
    }

    public function resetGuard() {
        Auth::logout();
        Auth::guard('user')->logout();
        Session::forget('logindata');
    }
}
