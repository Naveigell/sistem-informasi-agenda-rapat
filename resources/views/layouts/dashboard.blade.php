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
              <span class="header-account-username">{{ session()->get('username') }}</span>
              <i style="margin-right: 10px; width: 17px; height: 17px;" class="glyphicon glyphicon-cog"></i>
              <div class="header-account-option" style="">
                  <div class="header-account-option-container">
                      <ul class="dropdown-menu dropdown-container">
                          <li><a href="/{{ session()->get('role') }}/profile" style="padding-top: 10px; padding-bottom: 10px">Profil</a></li>
                          <li><a href="/logout" style="padding-top: 10px; padding-bottom: 10px">Logout</a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </header>
      <div class="left-side-bar">
          <h2></h2>
          <a href="/">
              <i class="glyphicon glyphicon-home" style="margin-right: 10px;"></i>
              Dashboard
          </a>
          <a href="/{{ session()->get('role') }}/anggota">
              <i class="glyphicon glyphicon-user" style="margin-right: 10px;"></i>
              Anggota
          </a>
          <a href="/{{ session()->get('role') }}/arsip">
              <i class="glyphicon glyphicon-th-list" style="margin-right: 10px;"></i>
              Arsip
          </a>
          <a href="/{{ session()->get('role') }}/agenda" class="active">
              <i class="glyphicon glyphicon-calendar" style="margin-right: 10px;"></i>
              Agenda
          </a>
          <a href="/{{ session()->get('role') }}/surat">
              <i class="glyphicon glyphicon-file" style="margin-right: 10px;"></i>
              Surat
          </a>
          <a href="/{{ session()->get('role') }}/notifikasi">
              <i class="glyphicon glyphicon-bell" style="margin-right: 10px;"></i>
              Notifikasi
          </a>
          <a href="/{{ session()->get('role') }}/pengaturan">
              <i class="glyphicon glyphicon-cog" style="margin-right: 10px;"></i>
              Pengaturan
          </a>
      </div>
      <div class="container">
      @yield('body')
      </div>
  </body>
</html>
