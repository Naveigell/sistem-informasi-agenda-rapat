@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ url('/css/page/superadmin/anggota/insert.css') }}">
@endsection

@section('body')
    <div class="body-section">
        <h2>Tambah Anggota</h2>
    </div>

    <div class="body-section">
        <div class="form-group row" style="margin-top: 10px;">
            <label class="col-sm-2">Nama</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" value="" placeholder="Tulis Nama Anggota Disini"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2">Jabatan</label>
            <div class="col-sm-9">
                <select class="form-control">
                    <option selected value="Pimpinan Rapat">Pimpinan Rapat</option>
                    <option value="Pegawai">Pegawai</option>
                    <option value="Anggota Rapat">Anggota Rapat</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2">Foto Profil</label>
            <div class="col-sm-2 image-upload-container">
                <div class="image-upload">
                    <img class="form-controlf" src="{{ url('/img/default/avatar.png') }}" alt="">
                    <input type="file" id="image-file-input" accept="image/png, image/jpg, image/jpeg">
                    <button id="image-file-input-button">Tambah Foto</button>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-md button-success" name="button">
            Tambah Anggota
        </button>
    </div>

    <script>
        var imageButton = document.getElementById('image-file-input-button');
        var imageInput = document.getElementById('image-file-input');
        imageButton.addEventListener('click', function (e) {
             imageInput.click();
        });
    </script>
@endsection
