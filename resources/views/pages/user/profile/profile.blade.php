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
        <form action="/api/user/profile/update" method="POST" style="margin-right: 10px;">
            @csrf
            <div class="form-group row" style="margin-top: 40px;">
                <label class="col-sm-2">Nama</label>
                <div class="col-sm-9">
                    <input name="name" type="text" class="form-control" value="{{ old('name') == null ? $profile->nama_pimpinan : old('name') }}" placeholder="Tulis Nama Lengkap Disini"/>
                </div>
            </div>
            <div class="form-group row">
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
                <label class="col-sm-2">Jabatan</label>
                <div class="col-sm-9">
                    <input name="jabatan" type="text" class="form-control" value="{{ old('jabatan') == null ? $profile->jabatan : old('jabatan') }}" placeholder="Tulis Jabatan Disini"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2">Jenis Kelamin</label>
                <div class="col-sm-9">
                    <select class="form-control" name="jenis_kelamin" id="">
                        <option value="Laki - laki">Laki - laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2">No Telp</label>
                <div class="col-sm-9">
                    <input name="no_telepon" type="text" class="form-control" value="{{ old('no_telepon') == null ? $profile->no_telepon : old('no_telepon') }}" placeholder="Tulis Jabatan Disini"/>
                </div>
            </div>
            <span class="error-message">
                {{ error_check(['name', 'username', 'email', 'jabatan', 'jenis_kelamin', 'no_telepon'], $errors) }}
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
        <form action="/api/user/profile/password/update" method="POST">
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
