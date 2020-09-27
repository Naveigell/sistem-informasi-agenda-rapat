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
      @php
        function is($name){
            $arr = explode('.', \Request::route()->getName());
            $first = reset($arr);

            return $name == $first;
        }
      @endphp
      <div class="left-side-bar">
          <h2></h2>
          <a href="/" class="">
              <i class="glyphicon glyphicon-home" style="margin-right: 10px;"></i>
              Dashboard
          </a>
          <a class="{{ is('anggota') ? 'active' : '' }}" parent-sub="anggota" style="cursor: pointer;">
              <i class="glyphicon glyphicon-user" style="margin-right: 10px;"></i>
              Anggota
              <i class="glyphicon glyphicon-triangle-bottom" style="width: 1px; height: 1px; float: right; transform: translateX(-4000%)"></i>
          </a>
          <div class="sub-left-side-bar" child-sub="anggota">
              <a href="/{{ session()->get('role') }}/anggota/admin">
                  Admin
              </a>
              <a href="/{{ session()->get('role') }}/anggota/pimpinan">
                  Pimpinan Rapat
              </a>
          </div>
          <a href="/{{ session()->get('role') }}/arsip" class="{{ is('arsip') ? 'active' : '' }}">
              <i class="glyphicon glyphicon-th-list" style="margin-right: 10px;"></i>
              Arsip
          </a>
          <a href="/{{ session()->get('role') }}/agenda" class="{{ is('agenda') ? 'active' : '' }}">
              <i class="glyphicon glyphicon-calendar" style="margin-right: 10px;"></i>
              Agenda
          </a>
          <a href="/{{ session()->get('role') }}/surat" class="{{ is('surat') ? 'active' : '' }}">
              <i class="glyphicon glyphicon-file" style="margin-right: 10px;"></i>
              Surat
          </a>
          <a href="/{{ session()->get('role') }}/profile"  class="{{ is('profile') ? 'active' : '' }}">
              <i class="glyphicon glyphicon-cog" style="margin-right: 10px;"></i>
              Profil
          </a>
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
