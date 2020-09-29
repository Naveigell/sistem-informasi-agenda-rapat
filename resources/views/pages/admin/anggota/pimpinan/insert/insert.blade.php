@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ url('/css/page/superadmin/anggota/insert.css') }}">
@endsection

@section('body')
    <div class="body-section">
        <h2>Tambah Anggota</h2>
    </div>

    <div class="body-section">
        <form action="/api/superadmin/anggota/pimpinan/insert" method="POST">
            @csrf
            <div class="form-group row" style="margin-top: 10px;">
                <label class="col-sm-2">Nama</label>
                <div class="col-sm-9">
                    <input name="nama" type="text" class="form-control" value="{{ old('nama') }}" placeholder="Tulis Nama Pimpinan Disini"/>
                </div>
            </div>
            <div class="form-group row" style="margin-top: 10px;">
                <label class="col-sm-2">Username</label>
                <div class="col-sm-9">
                    <input name="username" type="text" class="form-control" value="{{ old('username') }}" placeholder="Tulis Username Yang Akan Digunakan Disini"/>
                </div>
            </div>
            <div class="form-group row" style="margin-top: 10px;">
                <label class="col-sm-2">Email</label>
                <div class="col-sm-9">
                    <input name="email" type="email" class="form-control" value="{{ old('email') }}" placeholder="Tulis Email Disini"/>
                </div>
            </div>
            <div class="form-group row" style="margin-top: 10px;">
                <label class="col-sm-2"></label>
                <div class="col-sm-9">
                    Note: Email akan digunakan untuk login pemimpin rapat
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2">Jabatan</label>
                <div class="col-sm-9">
                    <input name="jabatan" type="text" class="form-control" value="{{ old('jabatan') }}" placeholder="Tulis Jabatan Disini"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2">Jenis Kelamin</label>
                <div class="col-sm-9">
                    <select name="jenis_kelamin" class="form-control">
                        <option {{ old('jenis_kelamin') == 'Laki - laki' ? 'selected' : '' }} value="Laki - laki">Laki - laki</option>
                        <option {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }} value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2">Nomor Telepon</label>
                <div class="col-sm-9">
                    <input name="telp" type="text" class="form-control" value="{{ old('telp') }}" placeholder="Tulis Nomor Telepon Disini"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2"></label>
                <div class="col-sm-9">
                    Note: Password akan secara otomatis bernilai 123456, mintalah user untuk mengubah passwordnya secara mandiri
                </div>
            </div>
            <span class="error-message">
                {{ error_check(['nama', 'jabatan', 'jenis_kelamin', 'telp'], $errors) }}
                {{ session()->has('error') ? session()->get('error') : null }}
            </span>
            <br/>
            <button type="submit" class="btn btn-md button-success" name="button">
                Tambah Anggota
            </button>
        </form>
    </div>
@endsection
