@extends('layout.layout')
@section('content')
<div class="section-body">
   <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
         <div class="card">
            <div class="card-header">
               <h4>Add Customer</h4>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                     <form class="" id="edit-customer" enctype="multipart/form-data" method="post">
                        @csrf
                        <input type="hidden" class="form-control" name="editId" value="{{ $customerDetails[0]->id }}">

                        <div class="form-group">
                           <label>Customer's Username</label>
                        <input type="text" class="form-control" name="username" value="{{ $customerDetails[0]->username }}">
                        </div>
                        
                        <div class="form-group">
                           <label>Customer's Name</label>
                           <input type="text" class="form-control" name="name" value="{{ $customerDetails[0]->name }}">
                        </div>
                        
                        <div class="form-group">
                           <label>Customer's Date of Birth</label>
                           <input type="text" class="form-control datepicker" name="dateofbirth" value="{{ $customerDetails[0]->birthdate }}">
                        </div>
                        <hr>
                            <label class="form-label"><b style="font-weight: 700;font-size: 16px;line-height: 28px;padding-right: 10px;margin-bottom: 0;">Customer's Phone no</b></label>
                            <button type="button" class="btn btn-icon icon-left btn-info pull-right addphoneno" ><i class="fas fa-plus"></i>Add Phone no</button>
                        <hr>
                            
                        <div class="addPhonenodiv">
                            @php
                                $i = 0 ;
                            @endphp
                            @foreach($customerphoneno as $key => $value)
                                @if($i == 0)
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                            <input type="input" class="form-control phoneno" name="phoneno[]" placeholder="Please enter Customer's Phone Number" value="{{ $value->phoneno }}">
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="removeDiv">
                                        <div class="row pull-right">
                                        <button type="button" class="btn btn-icon icon-left btn-danger  removePhoneno"><i class="fas fa-minus"></i>Remove Phone number</button></div>
                                        <br><br><div class="row ">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                
                                                <input type="input" class="form-control phoneno" name="phoneno[]" placeholder="Please enter Customer Phone Number" value="{{ $value->phoneno }}">
                                            </div>
                                        </div>
                                        </div>               
                                    </div>
                                @endif
                                @php
                                    $i++ ;
                                @endphp
                                
                            @endforeach
                            
                        </div>

                        <hr>
                        <label class="form-label"><b style="font-weight: 700;font-size: 16px;line-height: 28px;padding-right: 10px;margin-bottom: 0;">Customer's Email</b></label>
                            <button type="button" class="btn btn-icon icon-left btn-info pull-right addEmail" ><i class="fas fa-plus"></i>Add Email</button>
                        <hr>

                        <div class="addEmaildiv">
                            @php
                                $j = 0 ;
                            @endphp
                            @foreach($customeremailDetails as $key => $value)
                                @if($j == 0)
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <input type="input" class="form-control emailInput" name="email[]" placeholder="Please enter Customer's email" value="{{ $value->email }}">
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="removeEmailDiv">
                                    <div class="row pull-right">
                                    <button type="button" class="btn btn-icon icon-left btn-danger  removeEmail"><i class="fas fa-minus"></i>Remove Email</button></div>
                                    <br><br><div class="row ">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <input type="input" class="form-control emailInput" name="email[]" placeholder="Please enter Customer email" value="{{ $value->email }}">
                                        </div>
                                    </div>
                                    </div>  
                                </div>
                                @endif
                                @php
                                    $j++ ;
                                @endphp
                                
                            @endforeach
                            
                        </div>

                        <hr>
                        <label class="form-label"><b style="font-weight: 700;font-size: 16px;line-height: 28px;padding-right: 10px;margin-bottom: 0;">Customer's Images</b></label>
                            <button type="button" class="btn btn-icon icon-left btn-info pull-right addImage" ><i class="fas fa-plus"></i>Add Images</button>
                        <hr>
                        <div class="card-body">
                            <div class="row">
                                @php
                                    $k = 0 ;
                                @endphp
                            @foreach($customerimage as $key => $value)                                
                            <div class="row-3 " style="text-align: center !important" id="deleteDiv{{ $k }}">   
                                <img src="{{ asset('public/uploads/customer/image/'.$value->customerimage ) }}" alt="Customer" style="height: 150px;width: 150px;margin: 10px;border: 1px solid black" >
                                <br>
                                <center>
                                    <div class="row " style="text-align: center !important;margin: 10px;">
                                        <a href="#" class="deletePhoto" data-toggle="modal" data-target="#basicModal" data-id="{{ $value->id}}" data-deleteDiv="deleteDiv{{ $k }}">
                                            <button type="button"   class="btn btn-icon icon-left btn-danger  "  ><i class="fas fa-trash"></i>Delete Photo</button>
                                        </a>
                                    </div>
                                </center>
                                </div>
                                @php
                                $k++;
                            @endphp                          
                            @endforeach
                            </div>
                        </div>
                        <div class="addImagediv">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <input type="file" class="form-control image" name="image[]" placeholder="Please enter Customer's image" accept="image">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                           <button class="btn btn-primary" type="submit">Save Changes</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection