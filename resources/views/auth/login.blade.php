@extends('layouts.masterlogin', ['title' => 'Masuk'])
@section('Helpdesk','Helpdesk')
@section('content')
<div  >
  <div id="app">
    <section class="section" >
   

<div class="col-12 col-md-4 offset-lg-3 col-xl-4 offset-xl-4">
<div class="card card-primary center " style="margin-left: auto; margin-right: auto; margin-booton: auto; margin-top: 30px;">
  <div id="sample-login">
    <form method="POST" action="{{ route('login') }}">
      <div class="login-brand" >
        <img alt="Logo Pemkot" src="/buku/logokotabogor.gif" width="80" height="100">
      </div>
      <div class="card-header">
        <h4>{{ __('Login') }}</h4>
      </div>
      <div class="card-body pb-0">
        @csrf
        <div class="form-group">
          <label>{{ __('Username') }}</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fas fa-user"></i>
              </div>
            </div>
            <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
              @error('username')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
        </div>

        <!--password-->
        <div class="form-group">
          <label>{{ __('Password') }}</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fas fa-lock"></i>
              </div>
            </div>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
              @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
          </div>

          <!--Tampilkan Password-->
          <input type="checkbox" onclick="myFunction()"> Tampilkan Password
            <script>
              function myFunction() {
                var x = document.getElementById("password");
                if (x.type === "password") {
                  x.type = "text";
                } else {
                  x.type = "password";
                }
                }
            </script>
        </div>

        {{-- <div class="form-group mb-0">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" name="remember" class="custom-control-input" id="remember-me" {{ old('remember') ? 'checked' : '' }}>
            <label class="custom-control-label" for="remember-me">{{ __('Remember Me') }}</label>
            <a href="{{ route('register') }} "  class=" icon-left text-primary ml-5">Belum punya akun?</a>
          </div>
        </div> --}}
      </div>
      <div class="card-footer">
        {{-- <button type="submit" onclick="$.cardProgress('#sample-login', {dismiss: true,onDismiss: function() {alert('Dismissed :)')}});return false;" class="btn btn-primary">{{ __('Login') }}</button> --}}
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
              {{ __('Login') }}
          </button>
        </div>
        
      </div>
    </form>
  </div>
</div>
</div>
</section>
</div>
</div>


@endsection