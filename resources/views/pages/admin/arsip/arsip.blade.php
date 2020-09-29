@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ url('/css/page/dashboard/dashboard.css') }}">
@endsection

@section('body')

    <div class="body-section">
        <h4 style="font-weight: bold;">Arsip Rapat</h4>
    </div>

    <div class="body-section">
        <h2>List Arsip Rapat</h2>
        <table style="margin-top: 30px; font-size: 15px;" class="table ">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Perihal</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Ruang Rapat</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Rapat Tentang Penyusunan Laporan Keuangan Semester I</td>
                    <td>09.00 - 12.00 WITA</td>
                    <td>Gedung Bapetnas, Lt 4</td>
                    <td class="col-md-3">
                        <button class="btn btn-md button-secondary" type="button" name="button">Detail</button>
                        <button class="btn btn-md button-primary" type="button" name="button">Batalkan Arsip</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Rapat Tentang PKLN PT. Tanjung Power</td>
                    <td>19.00 - 20.00 WITA</td>
                    <td>Aula Gedung Satlantas</td>
                    <td class="col-md-3">
                        <button class="btn btn-md button-secondary" type="button" name="button">Detail</button>
                        <button class="btn btn-md button-primary" type="button" name="button">Batalkan Arsip</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Rapat Tentang Investigasi Pangan</td>
                    <td>17.00 - 18.00 WITA</td>
                    <td>Di tengah Lapangan Puputan Renon</td>
                    <td class="col-md-3">
                        <button class="btn btn-md button-secondary" type="button" name="button">Detail</button>
                        <button class="btn btn-md button-primary" type="button" name="button">Batalkan Arsip</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
