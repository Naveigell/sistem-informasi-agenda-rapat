@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ url('/css/page/superadmin/agenda/edit.css') }}">
@endsection

@section('body')
    <div class="body-section">
        <h4>List Anggota</h4>
    </div>

    <div class="body-section">
        <h4>List Peserta Rapat</h4>
        <table style="margin-top: 30px; font-size: 15px;" class="table ">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nama Peserta</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>
                        <img width="70px" height="70px" src="{{ url('/img/default/avatar.png') }}" alt="Image">
                    </td>
                    <td>John Doe</td>
                    <td>Pimpinan Rapat</td>
                    <td>
                        <button class="btn btn-md button-secondary" type="button" name="button">Detail</button>
                        <button class="btn btn-md button-warning" type="button" name="button">Edit</button>
                        <button class="btn btn-md button-primary" type="button" name="button">Hapus</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2
                    <td>
                        <img width="70px" height="70px" src="{{ url('/img/default/avatar.png') }}" alt="Image">
                    </td>
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
                    <td>
                        <img width="70px" height="70px" src="{{ url('/img/default/avatar.png') }}" alt="Image">
                    </td>
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
