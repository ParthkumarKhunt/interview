@extends('layout.layout')
@section('content')


  
      
    <div class="row">
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
      <div class="card">
          <br>
        <div class="buttons pull-right">
            <a href="{{ route('customer-add') }}" class="btn btn-warning icon-right " style="float: right"><i class="fa fa-plus"></i> Add Customer</a>
        </div>

        <div class="card-body mt-4 mb-4">
          <div class="table-responsive">
            <table class="table">
                <tr>
                    <th class="media">
                       Customer Details
                    </th>
                    <th>Email</th>
                    <th>Phone No</th>
                    <th>Date of Birth</th>
                    <th>
                        Action
                    </th>
                    
                  </tr>
                  @if(count($customerDetails) > 0)
                    @foreach($customerDetails as $key => $value)
                    <tr>
                        <td class="media">
                            <img alt="image" class="mr-3 mt-2 image-square" width="70" height="70" src="{{ asset('public/uploads/customer/image/'.$value->customerimage ) }}">
                            <div class="media-body">
                            <div class="media-tab-title">{{ $value->username }}</div>
                                <div class="text-job text-muted">{{ $value->name }}</div>
                            </div>
                        </td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->phoneno }}</td>
                        <td>{{ date("d-m-Y",strtotime($value->birthdate)) }}</td>
                        <td>
                            <a href="{{ route('customer-view',$value->id ) }}" class="btn btn-info " style="color: white">View</a>
                            <a href="{{ route('customer-edit',$value->id ) }}" class="btn btn-success" style="color: white">Edit</a>
                            <a href="" data-toggle="modal" data-target="#basicModal" class="btn btn-danger  deleteCustomer" style="color: white" data-id=""  >Delete</a>
                        </td>
                        
                    </tr>
                    @endforeach
                @else
                <tr>
                    <td colspan="5" style="text-align: center;color: red">
                        No data available in table
                    </td>
                </tr>
                @endif
              

              

            </table>
            {{ $customerDetails->links() }}
          </div>
        </div>
      </div>
    </div>
    
    
  </div>
@endsection