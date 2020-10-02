@extends('layouts.dashboard')

@section('styles')
    <style>
        .body-section-container {
            width: 100%;
            height: 100px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-top: 20px;
            align-items: stretch;
        }

        .body-section-container > .body-section {
            margin-top: 0;
            width: calc((100% / 4) - 5px);
            height: 100%;
            text-align: center;
            text-decoration: none;
            color: #222;
        }

        .body-section > a {
            color: #222;
            text-decoration: none;
        }

        .body-section > div {
            display: flex;
            align-items: center;
        }

        .body-section > h4 {
            font-size: 23px;
        }

        .body-section > span {
            font-size: 16px;
        }

        .dashboard-sub-title {
            font-size: 18px;
            display: block;
        }
    </style>
@endsection

@section('body')
    <div class="body-section">
        <h2>Dashboard Super Admin</h2>
        <span class="dashboard-sub-title">Selamat datang di Sistem Informasi BAPPEDA Bali</span> <br/>
        <span><i class="glyphicon glyphicon-calendar"></i> &nbsp Hari ini tanggal {{ date('d M Y') }}</span>
    </div>

    <div class="body-section">
        <a href="/{{ session()->get('role') }}/agenda" class="">
            <h4><i class="glyphicon-calendar glyphicon"></i>&nbsp {{ $agenda }} Total agenda rapat yang ada</h4>
            <span>Klik disini untuk melihat agenda.</span>
        </a>
    </div>

    <div class="body-section">
        <a href="/{{ session()->get('role') }}/surat" class="">
            <h4><i class="glyphicon-file glyphicon"></i>&nbsp {{ $surat }} Total Surat yang ada</h4>
            <span>Klik disini untuk melihat surat.</span>
        </a>
    </div>

    <div class="body-section">
        <a href="/{{ session()->get('role') }}/anggota/pimpinan" class="">
            <h4><i class="glyphicon-user glyphicon"></i>&nbsp {{ $pimpinan }} Total Pimpinan Rapat yang ada</h4>
            <span>Klik disini untuk melihat daftar pimpinan.</span>
        </a>
    </div>

    <div class="body-section">
        <a href="/{{ session()->get('role') }}/anggota/admin" class="">
            <h4><i class="glyphicon-user glyphicon"></i>&nbsp {{ $admin }} Total Admin yang ada</h4>
            <span>Klik disini untuk melihat daftar admin.</span>
        </a>
    </div>
@endsection
