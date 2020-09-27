@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ url('/css/page/superadmin/agenda/detail.css') }}">
    <link rel="stylesheet" href="{{ url('/css/page/superadmin/surat/detail.css') }}">
    <link rel="stylesheet" href="{{ url('/js/data-tables/datatables.min.css') }}">
@endsection

@section('body')
    <div class="body-section">
        <h2>Rapat Perihal {{ $data->perihal_rapat }}</h2>
    </div>

    <div class="body-section-container">
        <div class="body-section">
            <h4>Tanggal</h4>
            <span>{{ $data->jadwal_rapat }}</span>
        </div>
        <div class="body-section">
            <h4>Waktu</h4>
            <span>{{ date('H.i', strtotime($data->waktu_rapat)) }} WITA</span>
        </div>
        <div class="body-section">
            <h4>Ruang Rapat</h4>
            <span>{{ $data->ruangan_rapat }}</span>
        </div>
        <div class="body-section">
            <h4>Nama Pimpinan</h4>
            <span>{{ $data->pimpinanRapat->nama_pimpinan }} (Telp {{ $data->pimpinanRapat->no_telepon }})</span> <br/>
        </div>
    </div>

    <div class="body-section col-md-12" style="padding: 30px 55px; margin-top: 20px;">
        <h2>Surat </h2>
        <br/>
        <div class="mail-container">
            <div class="mail-detail">
                <table>
                    <tr>
                        <td>Nomor surat</td>
                        <td>: {{ $data->suratRapat->id_nomor_surat }}</td>
                    </tr>
                    <tr>
                        <td>Lampiran</td>
                        <td>: Surat Penting</td>
                    </tr>
                    <tr>
                        <td>Hal</td>
                        <td>: {{ $data->suratRapat->perihal_surat }}</td>
                    </tr>
                </table>
            </div>
            <br/>
            <br/>
            <div class="mail-to">
                Kepada <br/>
                {{ $data->suratRapat->tujuan_surat }} <br/>
                Di Tempat
            </div>
            <br/>
            <br/>
            <div class="mail-body">
                {!! $data->suratRapat->isi_surat !!}
            </div>
            <br/>
            <br/>
            <br/>
            <div class="mail-from" style="margin-top: 70px;">
                <div class="mail-from-text">
                    <span class="mail-from-position">
                        {{ $data->suratRapat->jabatan_pengirim }}, <span class="main-from-date">{{ \Carbon\Carbon::parse($data->suratRapat->tanggal_surat)->format('d F Y') }}</span>
                    </span>
                    <span class="mail-from-name" style="display: block; margin-top: 120px;">{{ $data->suratRapat->pengirim_surat }}</span>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ url('js/data-tables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#peserta-table').DataTable();
        });
    </script>
@endsection
