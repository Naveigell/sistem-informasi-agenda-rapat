@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ url('/css/page/superadmin/arsip/insert.css') }}">
    <script src="{{ url('/js/ckeditor/ckeditor.js') }}"></script>
@endsection

@section('body')
    <div class="body-section">
        <h4>Tambah Arsip</h4>
    </div>

    <div class="body-section" style="padding: 6px 15px;">
        <form class="col body-section-container" method="POST" action="/api/superadmin/arsip/insert">
            @csrf
            <div class="form-group">
                <label>Agenda Rapat</label>
                <select name="agenda" id="" class="form-control">
                    @foreach($agenda as $a)
                        <option value="{{ $a->id_rapat }}">{{ $a->perihal_rapat }} ----------- {{ $a->rapat_id_nomor_surat }}</option>
                    @endforeach
                </select>
                <small class="form-text text-muted">Contoh: Pengusulan Calon Pegawai - UD.122/DPP/SP/9/2020</small>
            </div>
            <div class="form-group">
                <label>Hasil Rapat</label>
                <textarea name="hasil" id="hasil-rapat" cols="30" rows="10" class="form-control" placeholder="Masukkan isi surat mu ..">
                    {!! old('hasil') !!}
                </textarea>
                <small class="form-text text-muted">Buat hasil rapat</small>
            </div>
            <span class="error-message">
                {{ error_check(['agenda', 'hasil'], $errors) }}
                {{ session()->has('error') ? session()->get('error') : null }}
            </span>
            <br/>
            <button type="submit" class="btn button-success">Simpan</button>
        </form>
    </div>

    <script>
        CKEDITOR.replace( 'hasil-rapat' );
    </script>
@endsection
