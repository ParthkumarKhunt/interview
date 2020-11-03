@extends('layout.layout')
@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        
        <div class="card-body">
            <div class="buttons pull-right">
                <a href="{{ route('customer-add') }}" class="btn btn-warning icon-right "><i class="fa fa-plus"></i> Add Customer</a>
                </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="customer-list" style="width:100%;">@csrf
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Username</th> 
                        <th>Name</th>
                        <th>DOB</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                <tbody>
                    
                </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection