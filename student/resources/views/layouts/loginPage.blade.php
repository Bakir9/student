<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <title>Laravel</title>

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Changa|Passion+One&display=swap" rel="stylesheet">
        <!--KRAJ-->
        <!-- Font awesome -->
        <link href="fontawesome/css/all.min.css" rel="stylesheet">
        <!-- KRAJ-->
        <!--Sweet Alert
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>-->
        <!--Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Baloo&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Chau+Philomene+One:ital@1&display=swap" rel="stylesheet">
    </head>
   <body class="hold-transition login-page">
    <div class="row">
      <div class="col-lg-4"></div>
      <div class="col-lg-3">
        <div class="login-box" style="margin-top: 35%">
          <div class="login-box">
            <a href="#" class="login-logo"><span class="logo-arrow"><</span> Student Service <span class="logo-arrow">></span></a>
          </div>
          <!-- /.login-logo -->
          <div class="card">
            <div class="card-body login-card-body">
              @if(Session::has('success'))
              <div class="alert alert-success">
                {{ Session::get('success') }}
                @php
                    Session::forget('success');
                @endphp
              </div>
            @endif

            @if (count($errors) > 0)
              <div class="alert alert-danger" >
                <ul style="margin-bottom: 0; list-style:none; padding-left: 15px;">
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
              <p class="login-box-msg" style="text-align: center">Sign in to start your session</p>
        
              <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                  <input type="text" class="form-control @error('username') border border-danger @enderror" name="username" id="username" value="{{ old('username') }}" placeholder="Username">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" class="form-control @error('password') border border-danger @enderror" name="password" id="password" placeholder="Password">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-8">
                    <div class="icheck-primary">
                      <input type="checkbox" id="remember">
                      <label for="remember">
                        Remember Me
                      </label>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                  </div>
                  <!-- /.col -->
                </div>
              </form>
        
              <div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-primary">
                  <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                  <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                </a>
              </div>
              <!-- /.social-auth-links -->
        
              <p class="mb-1">
                <a href="forgot-password.html">I forgot my password</a>
              </p>
              <p class="mb-0">
                <a href="register.html" class="text-center">Register a new membership</a>
              </p>
            </div>
            <!-- /.login-card-body -->
          </div>
        </div>
      </div>
    </div>
  





   
