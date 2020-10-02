@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ url('/css/page/superadmin/anggota/insert.css') }}">
@endsection

@section('body')
    <div class="body-section">
        <h2>Tambah Admin</h2>
    </div>

    @php
        function selected($name, $admin) {
            return $admin['role'] == $name ? 'selected' : '';
        }
    @endphp

    <div class="body-section">
        <form action="/api/superadmin/anggota/admin/update" method="POST">
            @csrf
            <input name="id" type="text" readonly hidden value="{{ $admin['id_user'] }}">
            <div class="form-group row" style="margin-top: 10px;">
                <label class="col-sm-2">Username</label>
                <div class="col-sm-9">
                    <input disabled type="text" class="form-control" value="{{ $admin['username'] }}" placeholder="Tulis Username Disini"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2">Email</label>
                <div class="col-sm-9">
                    <input disabled type="text" class="form-control" value="{{ $admin['nip'] }}" placeholder="Tulis Nip Disini"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2">Wewenang</label>
                <div class="col-sm-9">
                    <select class="form-control" name="wewenang" id="">
                        <option {{ selected('admin', $admin) }} value="admin">Admin</option>
                        <option {{ selected('superadmin', $admin) }} value="superadmin">Super Admin</option>
                    </select>
                </div>
            </div>
            <span class="error-message">
                {{ error_check(['username', 'nip'], $errors) }}
                {{ session()->has('error') ? session()->get('error') : null }}
            </span>
            <br/>
            <button type="submit" class="btn btn-md button-success" name="button">
                Edit Admin
            </button>
        </form>
    </div>
@endsection
