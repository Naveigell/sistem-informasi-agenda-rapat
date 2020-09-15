@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ url('/css/page/superadmin/setting/setting.css') }}">
@endsection

@section('body')
    <div class="body-section">
        <h4>Pengaturan</h4>
    </div>

    <div class="row" style="padding: 6px 15px;">
        <div class="col-md-12 body-section-independent">
            <div class="col-sm-3 image-upload-container">
                <div class="image-upload">
                    <img class="form-controlf" src="{{ url('/img/default/avatar.png') }}" alt="">
                    <input type="file" id="image-file-input" accept="image/png, image/jpg, image/jpeg">
                    <button id="image-file-input-button">Pilih Foto</button>
                    <span class="upload-image-information">
                        Besar file: maksimum 10.000.000 bytes (10 Megabytes). <br/> Ekstensi file yang diperbolehkan: .jpg, .jpeg, .png
                    </span>
                    <span class="upload-image-information">

                    </span>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="account-information-container">
                    <form>
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="email" class="form-control" placeholder="Masukkan nama lengkap ..">
                            <small class="form-text text-muted">Gunakan nama lengkapmu</small>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="email" class="form-control" placeholder="Masukkan username mu ..">
                            <small class="form-text text-muted">Gunakan username mu</small>
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <input disabled value="Super Admin" type="text" class="form-control" placeholder="Password">
                            <small class="form-text text-muted">Jabatan tidak bisa diubah disini</small>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="" id="" class="form-control">
                                <option value="Laki - laki">Laki - laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <small class="form-text text-muted">Pilih jenis kelaminmu</small>
                        </div>
                        <button type="button" class="btn button-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        var imageButton = document.getElementById('image-file-input-button');
        var imageInput = document.getElementById('image-file-input');

        imageButton.addEventListener('click', function (e) {
            imageInput.click();
        });
    </script>

@endsection
