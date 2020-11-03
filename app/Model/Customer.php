<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Customeremail;
use App\Model\Customerimage;
use App\Model\Customerphoneno;
use DB;
class Customer extends Model
{
    //
    protected $table = "customer";

    public function getdatatable(){
        $requestData = $_REQUEST;
        $columns = array(
            0 => 'customer.id',
            1 => 'customer.username',
            2 => 'customer.name',
            3 => 'customer.birthdate',
        );
        $query = Customer ::from('customer')->where('is_deleted',"N");

        if (!empty($requestData['search']['value'])) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
            $searchVal = $requestData['search']['value'];
            $query->where(function($query) use ($columns, $searchVal, $requestData) {
                $flag = 0;
                foreach ($columns as $key => $value) {
                    $searchVal = $requestData['search']['value'];
                    if ($requestData['columns'][$key]['searchable'] == 'true') {
                        if ($flag == 0) {
                            $query->where($value, 'like', '%' . $searchVal . '%');
                            $flag = $flag + 1;
                        } else {
                            $query->orWhere($value, 'like', '%' . $searchVal . '%');
                        }
                    }
                }
            });
        }

        $temp = $query->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);

        $totalData = count($temp->get());
        $totalFiltered = count($temp->get());

        $resultArr = $query->skip($requestData['start'])
                ->take($requestData['length'])
                ->select('customer.id','customer.username','customer.name','customer.birthdate')
                ->get();
        $data = array();
        $i = 0;

        foreach ($resultArr as $row) {
         
            $actionhtml = '';
            $actionhtml = '<a href="'.route('customer-view',$row['id']).'"  class="btn btn-icon primary"  ><i class="fa fa-eye"></i></a>'
                .'<a href="'.route('customer-edit',$row['id']).'"  class="btn btn-icon primary"  ><i class="fa fa-edit"></i></a>'
                . '<a href="" data-toggle="modal" data-target="#basicModal" class="btn btn-icon  deleteCustomer" data-id="' . $row["id"] . '"  ><i class="fa fa-trash" ></i></a>';
            $i++;
            
            
            $nestedData = array();
            $nestedData[] = $i;
            $nestedData[] = $row['username'];
            $nestedData[] = $row['name'];
            $nestedData[] = date("d-m-Y",strtotime($row['birthdate']));
            $nestedData[] = $actionhtml;
            $data[] = $nestedData;
        }
        $json_data = array(
            "draw" => intval($requestData['draw']), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
            "recordsTotal" => intval($totalData), // total number of records
            "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data" => $data   // total data array
        );
        return $json_data;
    }

    public function addCustomer($request){
       
        $username = str_replace(' ', '', strtolower($request->input('username')));
        $countUsername = Customer::where("username",$username)->count();
        // $countUsername  = 0 ;
        if($countUsername == 0){
            $objUsers = new Customer();
            $objUsers->username = $username;
            $objUsers->name = $request->input('name');
            $objUsers->birthdate = date("Y-m-d",strtotime($request->input('dateofbirth')));
            $objUsers->is_deleted = "N";
            $objUsers->created_at = date("Y-m-d h:i:s");
            $objUsers->updated_at = date("Y-m-d h:i:s");
            if($objUsers->save()){
                $id =  $objUsers->id;
                
                for($i = 0 ; $i <count($request->input('phoneno')) ;$i++ ){
                    $objCustomerphoneno = new Customerphoneno();
                    $objCustomerphoneno->customerId =$id;
                    $objCustomerphoneno->phoneno =$request->input('phoneno')[$i];
                    $objCustomerphoneno->created_at = date("Y-m-d h:i:s");
                    $objCustomerphoneno->updated_at = date("Y-m-d h:i:s");
                    $objCustomerphoneno->save();
                }
                for($j = 0 ; $j <count($request->input('email')) ;$j++ ){
                    $objCustomeremail = new Customeremail();
                    $objCustomeremail->customerId =$id;
                    $objCustomeremail->email =$request->input('email')[$j];
                    $objCustomeremail->created_at = date("Y-m-d h:i:s");
                    $objCustomeremail->updated_at = date("Y-m-d h:i:s");
                    $objCustomeremail->save();
                }

                for($k = 0 ; $k <count($request->file('image')) ;$k++ ){
                        $objCustomerimage = new Customerimage();
                        $image = $request->file('image')[$k];
                        $imagename = 'image'.time().$k.'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path('/uploads/customer/image');
                        $image->move($destinationPath, $imagename);    
                        $objCustomerimage->customerimage = $imagename;
                        $objCustomerimage->customerId =$id;
                        $objCustomerimage->created_at = date("Y-m-d h:i:s");
                        $objCustomerimage->updated_at = date("Y-m-d h:i:s");
                        $objCustomerimage->save();
                }
                return "true";
            }else{
                return "false";
            }
        }else{
            return "exits";
        }    
    }

    public function getDetails($id){
        return Customer::select("id","username","name","birthdate")->where("id",$id)->get();
    }

    public function editCustomer($request){
        $username = str_replace(' ', '', strtolower($request->input('username')));
        $countUsername = Customer::where("username",$username)->where("id",'!=',$request->input('editId'))->count();
        // $countUsername  = 0 ;
        if($countUsername == 0){
            $objUsers = Customer::find($request->input('editId'));
            $objUsers->username = $username;
            $objUsers->name = $request->input('name');
            $objUsers->birthdate = date("Y-m-d",strtotime($request->input('dateofbirth')));
            $objUsers->updated_at = date("Y-m-d h:i:s");
            if($objUsers->save()){
                $id =  $request->input('editId');

                DB::table('customer_email')->where('customerId', $id )->delete();
                DB::table('customer_phoneno')->where('customerId', $id )->delete();

                for($i = 0 ; $i <count($request->input('phoneno')) ;$i++ ){
                    $objCustomerphoneno = new Customerphoneno();
                    $objCustomerphoneno->customerId =$id;
                    $objCustomerphoneno->phoneno =$request->input('phoneno')[$i];
                    $objCustomerphoneno->created_at = date("Y-m-d h:i:s");
                    $objCustomerphoneno->updated_at = date("Y-m-d h:i:s");
                    $objCustomerphoneno->save();
                }
                for($j = 0 ; $j <count($request->input('email')) ;$j++ ){
                    $objCustomeremail = new Customeremail();
                    $objCustomeremail->customerId =$id;
                    $objCustomeremail->email =$request->input('email')[$j];
                    $objCustomeremail->created_at = date("Y-m-d h:i:s");
                    $objCustomeremail->updated_at = date("Y-m-d h:i:s");
                    $objCustomeremail->save();
                }
                if(($request->file('image'))){
                    for($k = 0 ; $k <count($request->file('image')) ; $k++ ){
                        $objCustomerimage = new Customerimage();
                        $image = $request->file('image')[$k];
                        $imagename = 'image'.time().$k.'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path('/uploads/customer/image');
                        $image->move($destinationPath, $imagename);    
                        $objCustomerimage->customerimage = $imagename;
                        $objCustomerimage->customerId =$id;
                        $objCustomerimage->created_at = date("Y-m-d h:i:s");
                        $objCustomerimage->updated_at = date("Y-m-d h:i:s");
                        $objCustomerimage->save();
                    }
                }
                
                return "true";
            }else{
                    return "false";
            }
        }else{
            return "exits";
        }
    }

    public function deleteCustomer($data){
            $objUsers = Customer::find($data['id']);
            $objUsers->is_deleted = "Y";
            $objUsers->updated_at = date("Y-m-d h:i:s");
            return $objUsers->save();
    }

    public function getCustomerList(){
        return  Customer ::from('customer')
                        ->leftjoin("customer_email","customer_email.customerId","=","customer.id")
                        ->leftjoin("customer_image","customer_image.customerId","=","customer.id")
                        ->leftjoin("customer_phoneno","customer_phoneno.customerId","=","customer.id")
                        ->where('is_deleted',"N")
                        ->groupBy('customer.id')
                        ->select("customer.username","customer.name","customer.birthdate","customer.id","customer_email.email","customer_image.customerimage","customer_phoneno.phoneno")
                        ->paginate(3);
    }
}
