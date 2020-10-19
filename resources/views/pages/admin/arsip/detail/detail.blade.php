@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ url('/css/page/admin/arsip/detail.css') }}">
    <link rel="stylesheet" href="{{ url('/js/data-tables/datatables.min.css') }}">
    <style>
        .body-section:last-child {
            margin-top: 780px;
        }
    </style>
@endsection

@section('body')
    <div class="body-section">
        <h4>Detail Arsip</h4>
    </div>

    <div class="body-section">
        <a href="/admin/arsip" class="button-secondary btn btn-md">Kembali</a>
    </div>

    <div class="body-section col-md-12" style="padding: 40px 55px; margin-top: 10px;">
        <div class="mail-container">
            {!! $arsip->hasil_rapat !!}
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
