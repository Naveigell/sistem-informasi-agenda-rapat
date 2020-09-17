@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ url('/css/page/superadmin/surat/insert.css') }}">
    <script src="{{ url('/js/ckeditor/ckeditor.js') }}"></script>
@endsection

@section('body')
    <div class="body-section">
        <h4>Tambah Surat</h4>
    </div>

    <div class="body-section" style="padding: 6px 15px;">
        <form class="col body-section-container">
            <div class="form-group">
                <label>Judul Surat</label>
                <input type="email" class="form-control" placeholder="Masukkan judul surat ..">
                <small class="form-text text-muted">Gunakan judul suratmu</small>
            </div>
            <div class="form-group">
                <label>Nomor Surat</label>
                <input type="text" class="form-control" placeholder="Nomor surat ..">
                <small class="form-text text-muted">Contoh: UD.122/DPP/SP/9/2020</small>
            </div>
            <div class="form-group">
                <label>Lampiran</label>
                <input type="text" class="form-control" placeholder="Lampiran surat ..">
                <small class="form-text text-muted">Contoh: Surat Terbuka</small>
            </div>
            <div class="form-group">
                <label>Hal</label>
                <input type="text" class="form-control" placeholder="Hal ..">
                <small class="form-text text-muted">Contoh: Penting</small>
            </div>
            <div class="form-group">
                <label>Kepada</label>
                <input type="text" class="form-control" placeholder="Tulisa tujuan surat ..">
                <small class="form-text text-muted">Contoh: Bapak Dewan Direksi</small>
            </div>
            <div class="form-group">
                <label>Tanggal Surat</label>
                <input type="date" class="form-control" placeholder="Tanggal surat ..">
                <small class="form-text text-muted">Pilih tanggal surat</small>
            </div>
            <div class="form-group">
                <label>Isi Surat</label>
                <textarea name="" id="isi-surat" cols="30" rows="10" class="form-control" placeholder="Masukkan isi surat mu .."></textarea>
{{--                <input type="email" >--}}
                <small class="form-text text-muted">Buat isi surat</small>
            </div>
            <button type="button" class="btn button-success">Simpan</button>
        </form>
    </div>

    <script>
        CKEDITOR.replace( 'isi-surat' );
    </script>

@endsection
