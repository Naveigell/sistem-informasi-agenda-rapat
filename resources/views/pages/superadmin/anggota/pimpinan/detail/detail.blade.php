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
                <input type="text" disabled class="form-control" value="" placeholder="{{ $pimpinan->nama_pimpinan }}"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2">Jabatan</label>
            <div class="col-sm-9">
                <input type="text" disabled class="form-control" value="" placeholder="{{ $pimpinan->jabatan }}"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2">Wewenang</label>
            <div class="col-sm-9">
                <input type="text" disabled class="form-control" value="" placeholder="Pimpinan Rapat"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2">Jenis Kelamin</label>
            <div class="col-sm-9">
                <input type="text" disabled class="form-control" value="" placeholder="{{ $pimpinan->jenis_kelamin }}"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2">Nomor Telepon</label>
            <div class="col-sm-9">
                <input type="text" disabled class="form-control" value="" placeholder="{{ $pimpinan->no_telepon }}"/>
            </div>
        </div>
        <a href="/superadmin/anggota/pimpinan" class="btn btn-md button-success">Kembali</a>
    </div>
@endsection
