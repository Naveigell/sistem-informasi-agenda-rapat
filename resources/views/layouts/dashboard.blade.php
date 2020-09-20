<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="{{ url('/css/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('/css/root.css') }}">
    <link rel="stylesheet" href="{{ url('/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('/css/page/layouts/header.css') }}">
    <link rel="stylesheet" href="{{ url('/css/page/layouts/dashboard.css') }}">
    <link rel="stylesheet" href="{{ url('/css/page/layouts/container.css') }}">
  @yield('styles')
  </head>
  <body>
      <header class="header">
          <div class="header-account">
              <img src="{{ url('/img/default/avatar.png') }}" alt="">
              <span class="header-account-username">Avataaars</span>
              <i style="margin-right: 10px; width: 17px; height: 17px;" class="glyphicon glyphicon-cog"></i>
              <div class="header-account-option" style="">
                  <div class="header-account-option-container">
                      <ul class="dropdown-menu dropdown-container">
                          <li><a href="/logout">Logout</a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </header>
      <div class="left-side-bar">
          <h2></h2>
          <span>
              <i class="glyphicon glyphicon-home" style="margin-right: 10px;"></i>
              Dashboard
          </span>
          <span>
              <i class="glyphicon glyphicon-user" style="margin-right: 10px;"></i>
              Pegawai
          </span>
          <span>
              <i class="glyphicon glyphicon-th-list" style="margin-right: 10px;"></i>
              Arsip
          </span>
          <span class="active">
              <i class="glyphicon glyphicon-calendar" style="margin-right: 10px;"></i>
              Agenda
          </span>
          <span>
              <i class="glyphicon glyphicon-file" style="margin-right: 10px;"></i>
              Surat
          </span>
          <span>
              <i class="glyphicon glyphicon-bell" style="margin-right: 10px;"></i>
              Notifikasi
          </span>
          <span>
              <i class="glyphicon glyphicon-cog" style="margin-right: 10px;"></i>
              Pengaturan
          </span>
      </div>
      <div class="container">
      @yield('body')
      </div>
  </body>
</html>
