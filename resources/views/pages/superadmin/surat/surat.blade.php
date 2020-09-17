@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ url('/css/page/surat/surat.css') }}">
@endsection

@section('body')
    <div class="body-section">
        <h4 style="font-weight: bold;">Surat</h4>
    </div>
    <div class="body-section">
        <h2>List Surat</h2>
        <table style="margin-top: 30px; font-size: 15px;" class="table ">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
{{--                <th scope="col">Keterangan Singkat</th>--}}
                <th scope="col">No Surat</th>
                <th scope="col">Pengirim</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td class="col-md-3">Surat Hasil Rapat Keuangan</td>
{{--                <td>Ada 12 pokok bahasan dalam rapat keuangan</td>--}}
                <td>SSD.PT.99/22/AD/189</td>
                <td>johndoe@gmail.com</td>
                <td class="col-md-3">
                    <a href="/superadmin/surat/1" class="btn btn-md button-secondary" type="button" name="button">Detail</a>
                    <a href="/superadmin/surat/1/edit" class="btn btn-md button-warning" type="button" name="button">Edit</a>
                    <button class="btn btn-md button-primary" type="button" name="button">Arsipkan</button>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td class="col-md-3">Rapat Kenaikan Jabatan</td>
{{--                <td>Beberapa Jabatan yang diperkenalkan</td>--}}
                <td>SSD.PT.99/22/AD/100</td>
                <td>johngonnadoe123@gmail.com</td>
                <td class="col-md-3">
                    <a href="/superadmin/surat/1" class="btn btn-md button-secondary" type="button" name="button">Detail</a>
                    <a href="/superadmin/surat/1/edit" class="btn btn-md button-warning" type="button" name="button">Edit</a>
                    <button class="btn btn-md button-primary" type="button" name="button">Arsipkan</button>
                </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td class="col-md-3">Rapat Tentang Investigasi Pangan</td>
{{--                <td>Hingga tanggal 20 Januari 2025, pangan masih belum meningkat</td>--}}
                <td>SSD.PT.99/22/AD/20</td>
                <td>elitglobal666@gmail.com</td>
                <td class="col-md-3">
                    <a href="/superadmin/surat/1" class="btn btn-md button-secondary" type="button" name="button">Detail</a>
                    <a href="/superadmin/surat/1/edit" class="btn btn-md button-warning" type="button" name="button">Edit</a>
                    <button class="btn btn-md button-primary" type="button" name="button">Arsipkan</button>
                </td>
            </tr>
            </tbody>
        </table>
        <button class="btn btn-md button-success" type="button" name="button">Tambah Agenda Baru</button>
    </div>
@endsection
