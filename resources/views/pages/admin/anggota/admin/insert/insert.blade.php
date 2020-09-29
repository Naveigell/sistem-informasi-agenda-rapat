@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ url('/css/page/superadmin/anggota/insert.css') }}">
@endsection

@section('body')
    <div class="body-section">
        <h2>Tambah Admin</h2>
    </div>

    <div class="body-section">
        <form action="/api/superadmin/anggota/admin/insert" method="POST">
            @csrf
            <div class="form-group row" style="margin-top: 10px;">
                <label class="col-sm-2">Username</label>
                <div class="col-sm-9">
                    <input name="username" type="text" class="form-control" value="{{ old('username') }}" placeholder="Tulis Username Disini"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2">Email</label>
                <div class="col-sm-9">
                    <input name="email" type="email" class="form-control" value="{{ old('email') }}" placeholder="Tulis Email Disini"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2"></label>
                <div class="col-sm-9">
                    <small class="form-text text-muted">
                        Note: Password akan secara otomatis bernilai 123456, mintalah user untuk mengubah passwordnya secara mandiri
                    </small>
                </div>
            </div>
            <span class="error-message">
                {{ error_check(['username', 'email'], $errors) }}
                {{ session()->has('error') ? session()->get('error') : null }}
            </span>
            <br/>
            <button type="submit" class="btn btn-md button-success" name="button">
                Tambah Admin
            </button>
        </form>
    </div>
@endsection
