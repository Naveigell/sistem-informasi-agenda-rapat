@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ url('/css/page/superadmin/anggota/detail.css') }}">
@endsection

@section('body')
    <div class="body-section">
        <h2>Detail Anggota</h2>
    </div>

    <div class="body-section">
        <div class="form-group row" style="margin-top: 10px;">
            <label class="col-sm-2">Nama</label>
            <div class="col-sm-9">
                <input type="text" disabled class="form-control" value="" placeholder="John Doe"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2">Jabatan</label>
            <div class="col-sm-9">
                <input type="text" disabled class="form-control" value="" placeholder="Pimpinan Rapat"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2">Foto Profil</label>
            <div class="col-sm-2 image-upload-container">
                <div class="image-upload">
                    <img class="form-controlf" src="{{ url('/img/default/avatar.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
