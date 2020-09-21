@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ url('/css/page/superadmin/anggota/edit.css') }}">
@endsection

@section('body')
    <div class="body-section">
        <h2>Edit Anggota</h2>
    </div>

    <div class="body-section">
        <form action="/api/superadmin/anggota/pimpinan/update" method="POST">
            @csrf
            <input name="id" type="text" hidden value="{{ $pimpinan->id_pimpinan_rapat }}">
            <div class="form-group row" style="margin-top: 10px;">
                <label class="col-sm-2">Nama</label>
                <div class="col-sm-9">
                    <input name="nama" type="text" class="form-control" value="{{ old('nama') == null ? $pimpinan->nama_pimpinan : old('nama') }}" placeholder="Tulis nama pimpinan disini"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2">Jabatan</label>
                <div class="col-sm-9">
                    <input name="jabatan" type="text" class="form-control" value="{{ old('jabatan') == null ? $pimpinan->jabatan : old('jabatan') }}" placeholder="Tulis jabatan pimpinan disini"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2">Wewenang</label>
                <div class="col-sm-9">
                    <input type="text" disabled class="form-control" value="Pimpinan Rapat"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2">Jenis Kelamin</label>
                <div class="col-sm-9">
                    <select name="jenis_kelamin" class="form-control">
                        <option {{ old('jenis_kelamin') == 'Laki - laki' || ($pimpinan->jenis_kelamin == 'Laki - laki' && old('jenis_kelamin') == null) ? 'selected' : '' }} value="Laki - laki">Laki - laki</option>
                        <option {{ old('jenis_kelamin') == 'Perempuan' || ($pimpinan->jenis_kelamin == 'Perempuan' && old('jenis_kelamin') == null) ? 'selected' : '' }} value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2">Nomor Telepon</label>
                <div class="col-sm-9">
                    <input name="telp" type="text" class="form-control" value="{{ old('telp') == null ? $pimpinan->no_telepon : old('telp') }}"/>
                </div>
            </div>
            <span class="error-message">
                {{ error_check(['nama', 'jabatan', 'wewenang', 'jenis_kelamin', 'telp'], $errors) }}
                {{ session()->has('error') ? session()->get('error') : null }}
            </span>
            <br/>
            <button type="submit" class="btn btn-md button-success" name="button">
                Simpan Perubahan
            </button>
        </form>
    </div>

    <script>
        var imageButton = document.getElementById('image-file-input-button');
        var imageInput = document.getElementById('image-file-input');

        imageButton.addEventListener('click', function (e) {
            imageInput.click();
        });
    </script>
@endsection
