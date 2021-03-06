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
        <form class="col body-section-container" method="POST" action="/api/superadmin/surat/insert">
            @csrf
            <div class="form-group">
                <label>Nomor Surat</label>
                <input name="nomor" type="text" value="{{ old('nomor') }}" class="form-control" placeholder="Nomor surat ..">
                <small class="form-text text-muted">Contoh: UD.122/DPP/SP/9/2020</small>
            </div>
            <div class="form-group">
                <label>Perihal</label>
                <input name="perihal" type="text" value="{{ old('perihal') }}" class="form-control" placeholder="Hal ..">
                <small class="form-text text-muted">Contoh: Permohonan rapat</small>
            </div>
            <div class="form-group">
                <label>Kepada/Tujuan</label>
                <input name="tujuan" type="text" value="{{ old('tujuan') }}" class="form-control" placeholder="Tulisa tujuan surat ..">
                <small class="form-text text-muted">Contoh: Bapak Dewan Direksi</small>
            </div>
            <div class="form-group">
                <label>Jabatan Pengirim</label>
                <input name="jabatan" type="text" value="{{ old('jabatan') }}" class="form-control" placeholder="Jabatan pengirim ..">
                <small class="form-text text-muted">Tulis jabatan pengirim</small>
            </div>
            <div class="form-group">
                <label>Nama Pengirim</label>
                <input name="pengirim" type="text" value="{{ old('pengirim') }}" class="form-control" placeholder="Nama pengirim ..">
                <small class="form-text text-muted">Tulis nama pengirim</small>
            </div>
            <div class="form-group">
                <label>Tanggal Surat</label>
                <input name="tanggal" type="date" value="{{ old('tanggal') }}" class="form-control" placeholder="Tanggal surat ..">
                <small class="form-text text-muted">Pilih tanggal surat</small>
            </div>
            <div class="form-group">
                <label>Isi Surat</label>
                <textarea name="isi" id="isi-surat" cols="30" rows="10" class="form-control" placeholder="Masukkan isi surat mu ..">
                    {!! old('isi') !!}
                </textarea>
                <small class="form-text text-muted">Buat isi surat</small>
            </div>
            <span class="error-message">
                {{ error_check(['nomor', 'perihal', 'tujuan', 'jabatan', 'pengirim', 'tanggal', 'isi'], $errors) }}
                {{ session()->has('error') ? session()->get('error') : null }}
            </span>
            <br/>
            <button type="submit" class="btn button-success">Simpan</button>
        </form>
    </div>

    <script>
        CKEDITOR.replace( 'isi-surat' );
    </script>

@endsection
