@extends('layout.login')
@section('content')

<div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand login-brand-color">
            	<img alt="image" src="{{ asset('public/assets/img/logo.png') }}" />
              Grexsan
            </div>
            <div class="card card-auth">
              <div class="card-header card-header-auth">
                <h4>Login</h4>
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
                <form method="POST"   id="login-form">@csrf
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="username" class="form-control" name="username" tabindex="1"  autofocus placeholder="Please enter your username">
                    
                  </div>
                  <div class="form-group">
                    <label for="email">Password</label>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2"  placeholder="Please enter your password">
                    
                  </div>
                  
                  <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-block btn-auth-color" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
                
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
            Don't have an account? <a href="{{ route('register') }}">Create One</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection