@extends('layout.layout')
@section('content')

<div class="section-body">
    
  <div class="row mt-sm-4">
    
    <div class="col-12 col-md-12 col-lg-12">
      <div class="card">
        <div class="padding-20">
          <ul class="nav nav-pills mb-1" id="myTab2" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="customer-tab2" data-toggle="tab" href="#customer" role="tab"
                aria-selected="true">Customer Details</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="email-tab2" data-toggle="tab" href="#email" role="tab"
                aria-selected="false">Customer Email</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="phoneno-tab2" data-toggle="tab" href="#phoneno" role="tab"
                aria-selected="false">Customer Phone No</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="image-tab2" data-toggle="tab" href="#image" role="tab"
                aria-selected="false">Customer Image</a>
            </li>
          </ul>
          <div class="tab-content tab-bordered" id="myTab3Content">
            <div class="tab-pane fade show active" id="customer" role="tabpanel" aria-labelledby="customer-tab2">
              <div class="row">
                <div class="col-md-3 col-6 b-r">
                  <strong>User Name</strong>
                  <br>
                <p class="text-muted">{{ $customerDetails[0]->username }}</p>
                </div>
                <div class="col-md-3 col-6 b-r">
                  <strong>First Name</strong>
                  <br>
                  <p class="text-muted">{{ $customerDetails[0]->name }}</p>
                </div>
                <div class="col-md-3 col-6 b-r">
                  <strong>Date Of Birthday</strong>
                  <br>
                  <p class="text-muted">{{ date("d-m-Y",strtotime($customerDetails[0]->username)) }}</p>
                </div>
               
              </div>
              
            </div>
            <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="email-tab2">
                <div class="row">
                    @php
                        $i = 1;
                    @endphp
                  @foreach($customeremailDetails as $key => $value)
                  <div class="col-md-3 col-6 b-r">
                  <strong>Email {{ $i }}</strong>
                      <br>
                  <p class="text-muted">{{ $value->email }}</p>
                    </div>
                  @php
                      $i++;
                  @endphp
                  @endforeach
                  
                 
                </div> 
            </div>
            <div class="tab-pane fade  " id="phoneno" role="tabpanel" aria-labelledby="phoneno-tab2">
              <div class="row">
                  @php
                      $i = 1;
                  @endphp
                @foreach($customerphoneno as $key => $value)
                <div class="col-md-3 col-6 b-r">
                <strong>Phone No {{ $i }}</strong>
                    <br>
                <p class="text-muted">{{ $value->phoneno }}</p>
                  </div>
                @php
                    $i++;
                @endphp
                @endforeach
                
               
              </div>
              
            </div>
            <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="image-tab2">
                <div class="row">
                    @php
                    $k = 0 ;
                @endphp
                    @foreach($customerimage as $key => $value)                                
                    <div class="row-3 " style="text-align: center !important" id="deleteDiv{{ $k }}">   
                        <img src="{{ asset('public/uploads/customer/image/'.$value->customerimage ) }}" alt="Customer" style="height: 150px;width: 150px;margin: 10px;border: 1px solid black" >
                        
                        </div>
                        @php
                        $k++;
                    @endphp                          
                    @endforeach
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection