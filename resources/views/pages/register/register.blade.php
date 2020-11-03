@extends('layout.login')
@section('content')
<div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand login-brand-color">
            	<img alt="image" src="{{ asset('public/assets/img/logo.png') }}" />
              Grexsan
            </div>
            <div class="card card-auth">
              <div class="card-header card-header-auth">
                <h4>Register</h4>
              </div>
              <div class="card-body">
               
                @if($message = Session::get('fail'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                    </div>
                @endif
                
               
                @if($message = Session::get('success'))
                    
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                    </div>
                
                @endif
                
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" id="register-form" > @csrf
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="username">Username</label>
                      <input id="username" type="text" class="form-control" name="username" autofocus>
                    </div>
                    <div class="form-group col-6">
                        <label for="name">Name</label>
                        <input id="name" type="name" class="form-control" name="name">
                    </div>
                  </div>
                  
                  <div class="row">

                    <div class="form-group col-6">
                        <label for="date-of-birth" class="d-block">Date of Birth</label>
                        <input id="date-of-birth" type="date" class="form-control" name="birthdate">
                    </div>

                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength" name="password">
                      
                    </div>
                    
                  </div>
                 
                  <div class="form-group">
                    <button type="submit" class="btn btn-auth-color btn-lg btn-block">
                        Register
                    </button>
                  </div>
                </form>
              </div>
              <div class="mb-4 text-muted text-center">
                    Already Registered? <a href="{{ route('login') }}">Login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  @endsection