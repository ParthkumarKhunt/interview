<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Model\Customer;
use App\Model\Customeremail;
use App\Model\Customerimage;
use App\Model\Customerphoneno;
class Customercontroller extends Controller
{
    //
    function __construct(){

    }

    public function list(Request $request){
    
        $data['title'] = Config::get( 'constant.PROJECTNAME' ) . " || Customer List";
        $data['description'] = Config::get( 'constant.PROJECTNAME' ) ;
        $data['keywords'] = Config::get( 'constant.PROJECTNAME' ) ;
        $data['css'] = array(
               
        );
        $data['plugincss'] = array(
            'bundles/izitoast/css/iziToast.min.css',
            'bundles/datatables/datatables.min.css',
            'bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css'
        );
        $data['pluginjs'] = array(
            'plugins/validate/jquery.validate.min.js',
            'bundles/izitoast/js/iziToast.min.js',
            'bundles/datatables/datatables.min.js',
            'bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js',
            'bundles/jquery-ui/jquery-ui.min.js',
            'js/page/datatables.js',
            'js/page/toastr.js'
        );
        $data['js'] = array(
            'comman_function.js',
            'ajaxfileupload.js',
            'jquery.form.min.js',
            'customer.js',
        );
        $data['funinit'] = array(
            'Customer.init()',
        );
        $data['header'] = array(
            'title' => 'Customer List',
            'breadcrumb' => array(
                'Dashboard' => route('dashboard'),
                'Customer List' => 'Customer List',
            )
        );

        return view("pages.customer.list",$data);
    }
    public function listpaginate(Request $request){
        $objCustomer = new Customer();
        $data['customerDetails'] = $objCustomer->getCustomerList();
        
        $data['title'] = Config::get( 'constant.PROJECTNAME' ) . " || Customer List Using Paginate" ;
        $data['description'] = Config::get( 'constant.PROJECTNAME' )  . " || Customer List Using Paginate" ;
        $data['keywords'] = Config::get( 'constant.PROJECTNAME' )  . " || Customer List Using Paginate" ;
        $data['css'] = array(
               
        );
        $data['plugincss'] = array(
            'bundles/izitoast/css/iziToast.min.css',
            'bundles/datatables/datatables.min.css',
            'bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css'
        );
        $data['pluginjs'] = array(
            'plugins/validate/jquery.validate.min.js',
            'bundles/izitoast/js/iziToast.min.js',
            'bundles/datatables/datatables.min.js',
            'bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js',
            'bundles/jquery-ui/jquery-ui.min.js',
            'js/page/datatables.js',
            'js/page/toastr.js'
        );
        $data['js'] = array(
            'comman_function.js',
            'ajaxfileupload.js',
            'jquery.form.min.js',
            'customer.js',
        );
        $data['funinit'] = array(
            'Customer.init()',
        );
        $data['header'] = array(
            'title' => 'Customer List',
            'breadcrumb' => array(
                'Dashboard' => route('dashboard'),
                'Customer List' => 'Customer List',
            )
        );

        return view("pages.customer.listpaginate",$data);
    }


    public function add (Request $request){

        if ($request->isMethod( 'post' )) {
            $objCustomer = new Customer();
            $result = $objCustomer->addCustomer($request);
            if ($result == "true") {
                $return['status'] = 'success';
                $return['message'] = 'Customer detailsss added successfully.';
                $return['redirect'] = route('customer-list');
            } else {
                if ($result == "exits") {
                    $return['status'] = 'error';
                    $return['message'] = 'The username has already been taken.';
                }else{
                    $return['status'] = 'error';
                    $return['message'] = 'Something goes to wrong';
                }
            }
            echo json_encode($return);
            exit;
        }
        $data['title'] = Config::get( 'constant.PROJECTNAME' ) . " || Add customer";
        $data['description'] = Config::get( 'constant.PROJECTNAME' ). " || Add customer";
        $data['keywords'] = Config::get( 'constant.PROJECTNAME' ). " || Add customer";
        $data['css'] = array(
            
        );
        $data['plugincss'] = array(
            'bundles/izitoast/css/iziToast.min.css',
            "bundles/bootstrap-daterangepicker/daterangepicker.css",
            "bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css",
            "bundles/select2/dist/css/select2.min.css",
            "bundles/jquery-selectric/selectric.css",
            "bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css",
            "bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css",
        );
        $data['pluginjs'] = array(
            'plugins/validate/jquery.validate.min.js',
            'bundles/izitoast/js/iziToast.min.js',
            "bundles/cleave-js/dist/cleave.min.js",
            "bundles/cleave-js/dist/addons/cleave-phone.us.js",
            "bundles/jquery-pwstrength/jquery.pwstrength.min.js",
            "bundles/bootstrap-daterangepicker/daterangepicker.js",
            "bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js",
            "bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js",
            "bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js",
            "bundles/select2/dist/js/select2.full.min.js",
            "bundles/jquery-selectric/jquery.selectric.min.js",
            "js/page/forms-advanced-forms.js",
            'js/page/toastr.js'
        );
        $data['js'] = array(
            'comman_function.js',
            'ajaxfileupload.js',
            'jquery.form.min.js',
            'customer.js',
        );
        $data['funinit'] = array(
            'Customer.add()',
        );

        $data['header'] = array(
            'title' => 'Add customer ',
            'breadcrumb' => array(
                'Dashboard' => route('dashboard'),
                'Clinet List' => route('customer-list'),
                'Add customer' => 'Add customer',
            )
        );
        return view('pages.customer.add', $data);
    }
    public function edit (Request $request,$id){

        if ($request->isMethod( 'post' )) {
            $objCustomer = new Customer();
            $result = $objCustomer->editCustomer($request);
            if ($result == "true") {
                $return['status'] = 'success';
                $return['message'] = 'Customer details edited successfully.';
                $return['redirect'] = route('customer-list');
            } else {
                if ($result == "exits") {
                    $return['status'] = 'error';
                    $return['message'] = 'The username has already been taken.';
                }else{
                    $return['status'] = 'error';
                    $return['message'] = 'Something goes to wrong';
                }
            }
            echo json_encode($return);
            exit;
        }
        $objCustomer = new Customer();
        $data['customerDetails'] = $objCustomer->getDetails($id);
        
        $objCustomeremail = new Customeremail();
        $data['customeremailDetails'] = $objCustomeremail->getDetails($id);

        
        $objCustomerimage = new Customerimage();
        $data['customerimage'] = $objCustomerimage->getDetails($id);

        $objCustomerphoneno = new Customerphoneno();
        $data['customerphoneno'] = $objCustomerphoneno->getDetails($id);

        
        $data['title'] = Config::get( 'constant.PROJECTNAME' ) . " || Edit customer";
        $data['description'] = Config::get( 'constant.PROJECTNAME' ). " || Edit customer";
        $data['keywords'] = Config::get( 'constant.PROJECTNAME' ). " || Edit customer";
        $data['css'] = array(
            
        );
        $data['plugincss'] = array(
            'bundles/izitoast/css/iziToast.min.css',
            "bundles/bootstrap-daterangepicker/daterangepicker.css",
            "bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css",
            "bundles/select2/dist/css/select2.min.css",
            "bundles/jquery-selectric/selectric.css",
            "bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css",
            "bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css",
        );
        $data['pluginjs'] = array(
            'plugins/validate/jquery.validate.min.js',
            'bundles/izitoast/js/iziToast.min.js',
            "bundles/cleave-js/dist/cleave.min.js",
            "bundles/cleave-js/dist/addons/cleave-phone.us.js",
            "bundles/jquery-pwstrength/jquery.pwstrength.min.js",
            "bundles/bootstrap-daterangepicker/daterangepicker.js",
            "bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js",
            "bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js",
            "bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js",
            "bundles/select2/dist/js/select2.full.min.js",
            "bundles/jquery-selectric/jquery.selectric.min.js",
            "js/page/forms-advanced-forms.js",
            'js/page/toastr.js'
        );
        $data['js'] = array(
            'comman_function.js',
            'ajaxfileupload.js',
            'jquery.form.min.js',
            'customer.js',
        );
        $data['funinit'] = array(
            'Customer.edit()',
        );

        $data['header'] = array(
            'title' => 'Edit customer ',
            'breadcrumb' => array(
                'Dashboard' => route('dashboard'),
                'Clinet List' => route('customer-list'),
                'Edit customer' => 'Edit customer',
            )
        );
        return view('pages.customer.edit', $data);
    }

    public function view(Request $request,$id){
        $objCustomer = new Customer();
        $data['customerDetails'] = $objCustomer->getDetails($id);
        
        $objCustomeremail = new Customeremail();
        $data['customeremailDetails'] = $objCustomeremail->getDetails($id);

        
        $objCustomerimage = new Customerimage();
        $data['customerimage'] = $objCustomerimage->getDetails($id);

        $objCustomerphoneno = new Customerphoneno();
        $data['customerphoneno'] = $objCustomerphoneno->getDetails($id);

        $data['title'] = Config::get( 'constant.PROJECTNAME' ) . " || View customer";
        $data['description'] = Config::get( 'constant.PROJECTNAME' ). " || View customer";
        $data['keywords'] = Config::get( 'constant.PROJECTNAME' ). " || View customer";
        $data['css'] = array(
            
        );
        $data['plugincss'] = array(
            
        );
        $data['pluginjs'] = array(
            
        );
        $data['js'] = array(
           
        );
        $data['funinit'] = array(
           
        );

        $data['header'] = array(
            'title' => 'View customer ',
            'breadcrumb' => array(
                'Dashboard' => route('dashboard'),
                'Clinet List' => route('customer-list'),
                'View customer' => 'View customer',
            )
        );
        return view('pages.customer.view', $data);
    }
    public function ajaxAction(Request $request){
        $action = $request->input('action');

        switch ($action) {
            case 'getdatatable':
                $objCustomer = new Customer();
                $list = $objCustomer->getdatatable();
                    
                echo json_encode($list);
                break;

            case 'deletePhoto':
                $objCustomerimage = new Customerimage();
                $result = $objCustomerimage->deletePhoto($request->input('data'));
                return $result;
                break;
                
            case 'deleteCustomer':
                $data = $request->input('data');
                $objCustomer = new Customer();
                $result = $objCustomer->deleteCustomer($request->input('data'));
                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Customer deleteted successfully.';
                    $return['redirect'] = route('customer-list');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'Wrong';
                }
                return json_encode($return);
                break;
        }
    }
}
