@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ url('/css/page/admin/agenda/insert.css') }}">
@endsection

@section('body')
    <div class="body-section">
        <h2>Tambah Agenda Rapat</h2>
    </div>

    <div class="body-section">
        <form action="/api/admin/agenda/insert" method="POST">
            @csrf
            <div class="form-group row" style="margin-top: 10px;">
                <label class="col-sm-2">Perihal</label>
                <div class="col-sm-10">
                    <input name="perihal" type="text" class="form-control" value="{{ old('perihal') }}" placeholder="Tulis Perihal Rapat Disini">
                </div>
            </div>
            <div class="form-group row" style="margin-top: 10px;">
                <label class="col-sm-2">Surat</label>
                <div class="col-sm-10">
                    <select name="surat" id="" class="form-control">
                        @foreach($surat as $s)
                            <option value="{{ $s->id_nomor_surat }}">{{ $s->id_nomor_surat }} -- {{ $s->perihal_surat }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row" style="margin-top: 10px;">
                <label class="col-sm-2">Pimpinan Rapat</label>
                <div class="col-sm-10">
                    <select name="pimpinan" id="" class="form-control">
                        @foreach($pimpinan as $p)
                            <option value="{{ $p->id_pimpinan_rapat }}">{{ $p->id_pimpinan_rapat }}. {{ $p->nama_pimpinan }} -- {{ $p->jabatan }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2">Tanggal</label>
                <div class="col-sm-10">
                    <input name="tanggal" value="{{ old('tanggal') }}" type="date" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2">Waktu</label>
                <div class="col-sm-2">
                    <input name="waktu" type="time" value="{{ old('waktu') }}" class="form-control">
                </div>
                <span class="col-sm-1" style="text-align: center;">WITA</span>
            </div>
            <div class="form-group row" style="margin-top: 10px;">
                <label class="col-sm-2">Ruangan</label>
                <div class="col-sm-10">
                    <input name="ruangan" type="text" class="form-control" value="{{ old('ruangan') }}" placeholder="Tulis Ruangan Yang Akan Digunakan Disini">
                </div>
            </div>
            <span class="error-message">
                {{ error_check(['perihal', 'surat', 'pimpinan', 'tanggal', 'waktu', 'ruangan'], $errors) }}
                {{ session()->has('error') ? session()->get('error') : null }}
            </span>
            <br/>
            <button type="submit" class="btn btn-md button-success" name="button">Simpan</button>
        </form>
    </div>

    <div class="body-section">
        <h4>Catatan : list peserta rapat hanya dapat ditambah saat mengedit agenda rapat</h4>
    </div>
@endsection
