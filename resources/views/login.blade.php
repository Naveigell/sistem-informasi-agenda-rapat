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
                  <h2>Account Login</h2>
                  <label>Email</label>
                  <input id="email-input" type="text" placeholder="johndoe@microservice.com"/>
                  <br/><br/>
                  <label>Password</label>
                  <input id="password-input" type="password" placeholder="*****"/> <br/><br/>
                  <div class="display">
                      <div class="left-display">
                          <input type="checkbox"/>
                          <span>Ingat saya</span>
                      </div>
                      <div class="right-display">
                          <a href="forget">Lupa Password?</a>
                      </div>
                  </div>
                  <span class="error-message">Akun tidak ditemukan</span>
                  <button id="login-button" type="button" class="button-primary">
                      Login
                  </button>
              </form>
          </div>
      </div>
  </body>
</html>
