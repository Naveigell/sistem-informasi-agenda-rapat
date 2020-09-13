@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ url('/css/page/superadmin/agenda/edit.css') }}">
@endsection

@section('body')
    <div class="body-section">
        <h2>Edit Agenda Rapat</h2>
    </div>

    <div class="body-section">
        <div class="form-group row" style="margin-top: 10px;">
            <label class="col-sm-1">Perihal</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="Rapat Tentang Penyusunan Laporan Keuangan Semester I">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-1">Tanggal</label>
            <div class="col-sm-10">
                <input type="date" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-1">Waktu</label>
            <div class="col-sm-2">
                <input type="time" class="form-control">
            </div>
            <span class="col-sm-1" style="text-align: center;">-</span>
            <div class="col-sm-2">
                <input type="time" class="form-control">
            </div>
            <span class="col-sm-1" style="text-align: center;">WITA</span>
        </div>
    </div>

    <div class="body-section">
        <h4>List Peserta Rapat</h4>
        <table style="margin-top: 30px; font-size: 15px;" class="table ">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Peserta</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>John Doe</td>
                    <td>Pimpinan Rapat</td>
                    <td>
                        <button class="btn btn-md button-secondary" type="button" name="button">Detail</button>
                        <button class="btn btn-md button-warning" type="button" name="button">Edit</button>
                        <button class="btn btn-md button-primary" type="button" name="button">Hapus</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>John Gonna Doe</td>
                    <td>Peserta</td>
                    <td>
                        <button class="btn btn-md button-secondary" type="button" name="button">Detail</button>
                        <button class="btn btn-md button-warning" type="button" name="button">Edit</button>
                        <button class="btn btn-md button-primary" type="button" name="button">Hapus</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Bedford Jane Doe</td>
                    <td>Peserta</td>
                    <td>
                        <button class="btn btn-md button-secondary" type="button" name="button">Detail</button>
                        <button class="btn btn-md button-warning" type="button" name="button">Edit</button>
                        <button class="btn btn-md button-primary" type="button" name="button">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="button" class="btn btn-md button-success" name="button"> <i class="glyphicon-plus glyphicon"></i> &nbsp Tambah Peserta</button>
    </div>
@endsection
