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
                  <img id="login-logo" src="{{ url('/img/logo_bappeda.png') }}" alt="Logo">
                  <h2>Login Bappeda</h2>
                  <label>Nip</label>
                  <input id="email-input" name="nip" value="{{ old('nip') }}" type="text" placeholder="199405012015051001"/>
                  <br/><br/>
                  <label>Password</label>
                  <input id="password-input" name="password" value="{{ old('password') }}" type="password" placeholder="*****"/> <br/><br/>
                  <div class="display">
                      <div class="left-display">
                          <input name="pimpinan" type="checkbox"/>
                          <span>Login pimpinan</span>
                      </div>
                  </div>
                  @if($errors->has('nip'))
                      <span class="error-message">{{ $errors->first('nip') }}</span>
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
