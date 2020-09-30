<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="{{ url('/css/root.css') }}">
    <link rel="stylesheet" href="{{ url('/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('/css/page/login/login.css') }}">
  </head>
  <body>
      <div class="login-page-background">
          <div class="login-container" >
              <form class="login-form" method="post" action="/api/login">
                  @csrf
                  <h2>Account Login</h2>
                  <label>Email</label>
                  <input id="email-input" name="email" value="{{ old('email') }}" type="text" placeholder="johndoe@microservice.com"/>
                  <br/><br/>
                  <label>Password</label>
                  <input id="password-input" name="password" value="{{ old('password') }}" type="password" placeholder="*****"/> <br/><br/>
                  <div class="display">
                      <div class="left-display">
                          <input name="pimpinan" type="checkbox"/>
                          <span>Login pimpinan</span>
                      </div>
{{--                      <div class="right-display">--}}
{{--                          <a href="forget">Lupa Password?</a>--}}
{{--                      </div>--}}
                  </div>
                  @if($errors->has('email'))
                      <span class="error-message">{{ $errors->first('email') }}</span>
                  @elseif($errors->has('password'))
                      <span class="error-message">{{ $errors->first('password') }}</span>
                  @endif
                  <button id="login-button" type="submit" class="button-primary">
                      Login
                  </button>
              </form>
          </div>
      </div>
  </body>
</html>
