<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Login</title>


  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/apple-touch-icon.png') }}" />
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon-32x32.png') }}" />
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon-16x16.png') }}" />
  <link rel="icon" type="image/x-icon" href="{{ URL::asset('/favicon.ico') }}" />
  <link rel="manifest" href="{{ asset('assets/images/site.webmanifest') }}" />

  @vite(['resources/js/app.js'])

</head>

<body>


  <div class="container-fluid d-flex align-items-center justify-content-center">
    <div class="card mb-3 shadow p-3 mb-5 bg-body-tertiary rounded container">
      <div class="row g-0">
        <div class="col-md-4">
          <div class="card-body sign-in-wrapper justify-content-center">
            <h1 class="mb-3 login-title">Sign-In</h1>

            <form class="needs-validation" id="loginForm" method="post" action="{{ url('login/login-verification') }}">
              @csrf

              <!--- Username Textfield --->
              <div class="form-group mb-4 username-textfield">
                <label for="username" class="form-label mb-2">Username</label>
                <input type="text" name="username" id="username"
                  class="form-control @error('username') is-invalid @enderror" placeholder="Enter your Username"
                  required />
                @error('username')
                @foreach($errors->get('username') as $messuser)
                <span class="invalid-feedback">{{ $messuser }}</span>
                @endforeach
                @enderror
              </div><!--- Closing of form-group mb-4 username-textfield --->



              <!--- Password Textfield with Eye Icon --->
              <div class="form-group mb-5">
                <label for="password" class="form-label mb-2">Password</label>
                <span class="eye-container" id="eyeIcon">
                  <i class="bi bi-eye-slash-fill"></i>
                </span>
                <div class="input-group">
                  <input type="password" name="password" id="password"
                    class="form-control @error('password') is-invalid @enderror" placeholder="Enter your Password"
                    required />
                  @error('password')
                  @foreach($errors->get('password') as $messpass)
                  <span class="invalid-feedback">{{ $messpass }}</span>
                  @endforeach
                  @enderror
                </div>
              </div><!--- Closing of form-group mb-4 password-textfield --->



              <!--- Forgot Password Link --->
              <div class="d-flex justify-content-between align-items-center mb-5">
                <input type="submit" id="sign-in" class="btn btn-primary btn-lg" value="Sign-In" />
                <a href="#!" class="forgot-password-link">Forgot Password?</a>
              </div><!--- Closing of d-flex justify-content-between align-items-center mb-5 --->
            </form>
          </div><!-- Closing of card-body sign-in-wrapper justify-content-center --->
        </div><!-- Closing of col-md-4 -->

        <div class="col-md-6 image-container">
          <img src="{{ url('assets/images/Login-Card-Image.png') }}" alt="Login Card Image" />
        </div><!--- Closing of col-md-6 image-container --->

      </div><!-- Closing of row g-0 --->
    </div><!--- Closing of card mb-3 shadow p-3 mb-5 bg-body-tertiary rounded container --->
  </div><!--- Closing of container-fluid d-flex align-items-center justify-content-center --->
</body>

</html>