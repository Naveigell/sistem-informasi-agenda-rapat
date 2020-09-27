@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ url('/css/page/superadmin/surat/detail.css') }}">
    <link rel="stylesheet" href="{{ url('/js/data-tables/datatables.min.css') }}">
    <style>
        .body-section:last-child {
            margin-top: 780px;
        }
    </style>
@endsection

@section('body')
    <div class="body-section">
        <h4>Detail Surat</h4>
    </div>

    <div class="body-section">
        <a href="/superadmin/surat" class="button-secondary btn btn-md">Kembali</a>
{{--        <button class="button-success btn btn-md" data-toggle="modal" data-target=".bd-example-modal-lg">Kirim</button>--}}
    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div style="padding: 30px;"  class="modal-content">
                <h2>Kirim kepada</h2>
                <br/>
                <table id="penerima-table" style="margin-top: 30px; font-size: 15px;" class="table ">
                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Username penerima</th>
                        <th scope="col">Wewenang</th>
                        <th scope="col">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td class="">perihal surat</td>
                        <td>nomor surat</td>
                        <td>
                            <button class="btn btn-md button-success">Kirim</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="body-section col-md-12" style="padding: 40px 55px; margin-top: 10px;">
        <div class="mail-container">
{{--            <div class="mail-date">Jakarta, 12 Desember 1990</div>--}}
            <div class="mail-detail">
                <table>
                    <tr>
                        <td>Nomor surat</td>
                        <td>: {{ $surat->id_nomor_surat }}</td>
                    </tr>
                    <tr>
                        <td>Lampiran</td>
                        <td>: Surat Penting</td>
                    </tr>
                    <tr>
                        <td>Hal</td>
                        <td>: {{ $surat->perihal_surat }}</td>
                    </tr>
                </table>
            </div>
            <br/>
            <br/>
            <div class="mail-to">
                Kepada <br/>
                {{ $surat->tujuan_surat }} <br/>
                Di Tempat
            </div>
            <br/>
            <br/>
            <div class="mail-body">
                {!! $surat->isi_surat !!}
            </div>
            <br/>
            <br/>
            <br/>
            <div class="mail-from" style="margin-top: 70px;">
                <div class="mail-from-text">
                    <span class="mail-from-position">
                        {{ $surat->jabatan_pengirim }}, <span class="main-from-date">{{ \Carbon\Carbon::parse($surat->tanggal_surat)->format('d F Y') }}</span>
                    </span>
                    <span class="mail-from-name" style="display: block; margin-top: 120px;">{{ $surat->pengirim_surat }}</span>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ url('js/data-tables/datatables.min.js') }}"></script>
    <script src="{{ url('css/bootstrap/js/bootstrap.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#penerima-table').DataTable();
        });
    </script>
@endsection
