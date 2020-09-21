@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ url('/css/page/superadmin/profile/profile.css') }}">
@endsection

@section('body')

    <div class="body-section">
        <h2>Profil Admin</h2>
    </div>

    <div class="body-section" style="padding-bottom: 30px;">
        <h3>Biodata</h3>
        <form action="/api/superadmin/profile/update" method="POST" style="margin-right: 10px;">
            @csrf
            <div class="form-group row" style="margin-top: 40px;">
                <label class="col-sm-2">Username</label>
                <div class="col-sm-9">
                    <input name="username" type="text" class="form-control" value="{{ old('username') == null ? $profile->username : old('username') }}" placeholder="Tulis Username Disini"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2">Email</label>
                <div class="col-sm-9">
                    <input name="email" type="email" class="form-control" value="{{ old('email') == null ? $profile->email : old('email') }}" placeholder="Tulis Email Disini"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2">Wewenang</label>
                <div class="col-sm-9">
                    <input disabled type="text" class="form-control" value="{{ $profile->role }}" placeholder=""/>
                </div>
            </div>
            <span class="error-message">
                {{ error_check(['username', 'email'], $errors) }}
                {{ session()->has('biodata-error') ? session()->get('biodata-error') : null }}
            </span>
            <br/>
            <button type="submit" class="btn btn-md button-success" name="button">
                Simpan
            </button>
        </form>
    </div>

    <div class="body-section" style="margin-top: 30px; padding-bottom: 30px;">
        <h3>Ubah Password</h3>
        <form action="/api/superadmin/profile/password/update" method="POST">
            @csrf
            <div class="form-group row" style="margin-top: 40px;">
                <label class="col-sm-2">Password Baru</label>
                <div class="col-sm-5">
                    <input name="new" type="password" class="form-control" placeholder="Password baru ..."/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2">Password Lama</label>
                <div class="col-sm-5">
                    <input name="old1" type="password" class="form-control" placeholder="Password lama ..."/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2">Ulangi Password Lama</label>
                <div class="col-sm-5">
                    <input name="old2" type="password" class="form-control" placeholder="Ulangi password lama ..."/>
                </div>
            </div>
            <span class="error-message">
                {{ error_check(['new', 'old1', 'old2'], $errors) }}
                {{ session()->has('password-error') ? session()->get('password-error') : null }}
            </span>
            <br/>
            <button type="submit" class="btn btn-md button-success">
                Ubah
            </button>
        </form>
    </div>

    @if(session()->has('success'))
        <script src="{{ url('js/jquery.min.js') }}"></script>
        <script src="{{ url('js/sweetalert.min.js') }}"></script>
        <script>
            swal({
                title: "Success!",
                text: "{{ session()->get('success') }}",
                icon: "success",
                button: "OK",
            }).then(function (response) {
                window.location.reload();
            });
        </script>
    @endif
@endsection
