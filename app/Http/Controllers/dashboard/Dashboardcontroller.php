<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Users;
use Config;
class Dashboardcontroller extends Controller
{
    //
    function __construct(){

    }

    public function dashboard (){
        $data['title'] = Config::get('constant.PROJECTNAME')." || Dashboard";
        $data['description'] = Config::get('constant.PROJECTNAME')." || Dashboard";
        $data['keywords'] = Config::get('constant.PROJECTNAME')." || Dashboard";
        $data['header'] = array(
            'title' => 'Dashboard',
            'breadcrumb' => array(
                'Dashboard' => 'Dashboard',
            )
        );
        return view("pages.dashboard.dashboard",$data);
    }
}
