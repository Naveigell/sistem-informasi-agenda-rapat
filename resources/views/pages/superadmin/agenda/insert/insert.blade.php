@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ url('/css/page/superadmin/agenda/insert.css') }}">
@endsection

@section('body')
    <div class="body-section">
        <h2>Tambah Agenda Rapat</h2>
    </div>

    <div class="body-section">
        <div class="form-group row" style="margin-top: 10px;">
            <label class="col-sm-1">Perihal</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="" placeholder="Tulis Perihal Rapat Disini">
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
        <button type="button" class="btn btn-md button-success" name="button">Simpan</button>
    </div>

    <div class="body-section">
        <h4>Catatan : list peserta rapat hanya dapat ditambah saat mengedit agenda rapat</h4>
    </div>
@endsection
