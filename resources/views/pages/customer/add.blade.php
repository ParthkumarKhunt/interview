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
                     <form class="" id="add-customer" enctype="multipart/form-data" method="post">
                        @csrf

                        <div class="form-group">
                           <label>Customer's Username</label>
                           <input type="text" class="form-control" name="username">
                        </div>
                        
                        <div class="form-group">
                           <label>Customer's Name</label>
                           <input type="text" class="form-control" name="name">
                        </div>
                        
                        <div class="form-group">
                           <label>Customer's Date of Birth</label>
                           <input type="text" class="form-control datepicker" name="dateofbirth">
                        </div>
                        <hr>
                            <label class="form-label"><b style="font-weight: 700;font-size: 16px;line-height: 28px;padding-right: 10px;margin-bottom: 0;">Customer's Phone no</b></label>
                            <button type="button" class="btn btn-icon icon-left btn-info pull-right addphoneno" ><i class="fas fa-plus"></i>Add Phone no</button>
                        <hr>
                            
                        <div class="addPhonenodiv">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <input type="input" class="form-control phoneno" name="phoneno[]" placeholder="Please enter Customer's Phone Number">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <label class="form-label"><b style="font-weight: 700;font-size: 16px;line-height: 28px;padding-right: 10px;margin-bottom: 0;">Customer's Email</b></label>
                            <button type="button" class="btn btn-icon icon-left btn-info pull-right addEmail" ><i class="fas fa-plus"></i>Add Email</button>
                        <hr>

                        <div class="addEmaildiv">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <input type="input" class="form-control emailInput" name="email[]" placeholder="Please enter Customer's email">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <label class="form-label"><b style="font-weight: 700;font-size: 16px;line-height: 28px;padding-right: 10px;margin-bottom: 0;">Customer's Images</b></label>
                            <button type="button" class="btn btn-icon icon-left btn-info pull-right addImage" ><i class="fas fa-plus"></i>Add Images</button>
                        <hr>

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