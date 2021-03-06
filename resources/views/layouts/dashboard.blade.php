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
      <style>
          .logo-background {
              background: linear-gradient(rgba(255,255,255,0.95), rgba(255,255,255,0.95)), url("{{ url('img/logo_bappeda_white.jpeg') }}") no-repeat;
              background-size: 100% 100%;
              object-fit: cover;
              filter: alpha(opacity=0.1);
          }
      </style>
  @yield('styles')
  </head>
  <body>
      <header class="header">
          <div class="header-container">
              <img src="{{ url('img/logo_bappeda.png') }}" alt="Bappeda" class="bappeda-logo">
              <span class="header-title">BADAN PERANCANGAN PEMBANGUNAN <br/> DAERAH PROVINSI BALI</span>
          </div>
{{--          <div class="header-account">--}}
{{--              <i class="glyphicon-user glyphicon header-account-icon"></i>--}}
{{--              <span class="header-account-username">--}}
{{--                  {{ session()->get('username') }}--}}
{{--              </span>--}}
{{--              <i style="margin-right: 10px; width: 17px; height: 17px;" class="glyphicon glyphicon-cog"></i>--}}
{{--              <div class="header-account-option" style="">--}}
{{--                  <div class="header-account-option-container">--}}
{{--                      <ul class="dropdown-menu dropdown-container">--}}
{{--                          <li><a href="/{{ session()->get('role') }}/profile" style="padding-top: 10px; padding-bottom: 10px">Profil</a></li>--}}
{{--                          <li><a href="/logout" style="padding-top: 10px; padding-bottom: 10px">Logout</a></li>--}}
{{--                      </ul>--}}
{{--                  </div>--}}
{{--              </div>--}}
{{--          </div>--}}
      </header>
      @php
        function first($name){
            $arr = explode('.', \Request::route()->getName());
            $first = reset($arr);

            return $name == $first;
        }

        function second($name) {
            $arr = explode('.', \Request::route()->getName());

            if (!(count($arr) > 1)) return false;

            $second = $arr[1];

            return $name == $second;
        }
      @endphp
      <div class="left-side-bar">
          <h4 class="left-side-bar-title">
              <span>
                  <i class="glyphicon-user glyphicon header-account-icon"></i>
                  <span class="header-account-username">
                      {{ session()->get('username') }}
                  </span>
              </span>
          </h4>
          <hr class="left-side-separator">
          <a href="/{{ session()->get('role') }}/dashboard" class="{{ first('dashboard') ? 'active' : '' }}">
              <i class="glyphicon glyphicon-home" style="margin-right: 10px;"></i>
              Dashboard
          </a>
          <hr class="left-side-separator">
          @if(session()->get('role') != 'user')
              <a class="{{ first('anggota') ? 'active' : '' }}" parent-sub="anggota" style="cursor: pointer;">
                  <i class="glyphicon glyphicon-user" style="margin-right: 10px;"></i>
                  Anggota
                  <i class="glyphicon glyphicon-triangle-bottom" style="width: 1px; height: 1px; float: right; transform: translateX(-4000%)"></i>
              </a>
              <hr class="left-side-separator">
              <div class="sub-left-side-bar" child-sub="anggota">
                  <a href="/{{ session()->get('role') }}/anggota/admin" class="{{ second('admin') ? 'active' : '' }}">
                      Admin
                  </a>
                  <a href="/{{ session()->get('role') }}/anggota/pimpinan" class="{{ second('pimpinan') ? 'active' : '' }}">
                      Pimpinan Rapat
                  </a>
              </div>
          @endif
          <a href="/{{ session()->get('role') }}/agenda" class="{{ first('agenda') ? 'active' : '' }}">
              <i class="glyphicon glyphicon-calendar" style="margin-right: 10px;"></i>
              Agenda
          </a>
          <hr class="left-side-separator">
          <a href="/{{ session()->get('role') }}/arsip" class="{{ first('arsip') ? 'active' : '' }}">
              <i class="glyphicon glyphicon-inbox" style="margin-right: 10px;"></i>
              Arsip
          </a>
          <hr class="left-side-separator">
          @if(session()->get('role') != 'user')
              <a href="/{{ session()->get('role') }}/surat" class="{{ first('surat') ? 'active' : '' }}">
                  <i class="glyphicon glyphicon-file" style="margin-right: 10px;"></i>
                  Surat
              </a>
              <hr class="left-side-separator">
          @endif
          <a parent-sub="profil" style="cursor: pointer;" class="{{ first('profile') ? 'active' : '' }}">
              <i class="glyphicon glyphicon-cog" style="margin-right: 10px;"></i>
              Profil
              <i class="glyphicon glyphicon-triangle-bottom" style="width: 1px; height: 1px; float: right; transform: translateX(-4000%)"></i>
          </a>
          <hr class="left-side-separator">
          <div class="sub-left-side-bar" child-sub="profil">
              <a href="/{{ session()->get('role') }}/profile" class="{{ first('profile') ? 'active' : '' }}">
                  Biodata
              </a>
              <a href="/logout" class="{{ second('profile') ? 'active' : '' }}">
                  Logout
              </a>
          </div>
      </div>
      <script src="{{ url('js/jquery.min.js') }}"></script>
      <script>
          const parentSub = $('a[parent-sub]');

          parentSub.on('click', function (evt) {
              const attrName = evt.target.getAttribute('parent-sub');
              const childSub = $('div[child-sub="' + attrName + '"]');

              childSub[0].style.display = childSub[0].style.display === 'none' ? 'block' : 'none';
          });
      </script>
      <div class="container">
      @yield('body')
      </div>
  </body>
</html>
