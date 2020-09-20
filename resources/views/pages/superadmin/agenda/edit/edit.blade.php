@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ url('/css/page/superadmin/agenda/edit.css') }}">
@endsection

@section('body')
    <div class="body-section">
        <h2>Edit Agenda Rapat</h2>
    </div>

    <div class="body-section">
        <form action="/api/superadmin/agenda/update" method="POST">
            @csrf
            <input name="id" type="text" readonly style="display: none;" value="{{ $data->id_rapat }}">
            <div class="form-group row" style="margin-top: 10px;">
                <label class="col-sm-1">Perihal</label>
                <div class="col-sm-10">
                    <input name="perihal" type="text" class="form-control" value="{{ $data->perihal_rapat }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-1">Surat</label>
                <div class="col-sm-10">
                    <select name="surat" class="form-control">
                        @foreach($surat as $s)
                            <option {{ $s->id_nomor_surat == $data->rapat_id_nomor_surat ? 'selected' : '' }} value="{{ $s->id_nomor_surat }}">{{ $s->id_nomor_surat }} -- {{ $s->perihal_surat }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-1">Pimpinan Rapat</label>
                <div class="col-sm-10">
                    <select name="pimpinan" id="" class="form-control">
                        @foreach($pimpinan as $p)
                            <option {{ $p->id_pimpinan_rapat == $data->rapat_id_pimpinan_rapat ? 'selected' : '' }} value="{{ $p->id_pimpinan_rapat }}">{{ $p->id_pimpinan_rapat }}. {{ $p->nama_pimpinan }} -- {{ $p->jabatan }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-1">Tanggal</label>
                <div class="col-sm-10">
                    <input name="tanggal" type="date" class="form-control" value="{{ $data->jadwal_rapat }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-1">Waktu</label>
                <div class="col-sm-2">
                    <input name="waktu" type="time" class="form-control" value="{{ Carbon\Carbon::parse($data->waktu_rapat)->format('H:i') }}">
                </div>
                <span class="col-sm-1" style="text-align: center;">WITA</span>
            </div>
            <div class="form-group row">
                <label class="col-sm-1">Ruangan</label>
                <div class="col-sm-10">
                    <input name="ruangan" type="text" class="form-control" value="{{ $data->ruangan_rapat }}">
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
