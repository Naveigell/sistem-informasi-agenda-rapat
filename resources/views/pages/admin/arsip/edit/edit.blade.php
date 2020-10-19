@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ url('/css/page/admin/arsip/edit.css') }}">
    <script src="{{ url('/js/ckeditor/ckeditor.js') }}"></script>
@endsection

@section('body')
    <div class="body-section">
        <h4>Edit Arsip</h4>
    </div>

    <div class="body-section" style="padding: 6px 15px;">
        <form class="col body-section-container" method="POST" action="/api/admin/arsip/update">
            @csrf
            <input name="id" type="text" hidden readonly value="{{ $arsip->id_arsip_rapat }}">
            <div class="form-group">
                <label>Agenda Rapat</label>
                <input name="agenda" type="text" readonly hidden value="{{ $arsip->agenda->id_rapat }}">
                <input disabled type="text" class="form-control" value="{{ $arsip->agenda->perihal_rapat }} ----- {{ $arsip->agenda->rapat_id_nomor_surat }}">
                <small class="form-text text-muted">Contoh: Pengusulan Calon Pegawai - UD.122/DPP/SP/9/2020</small>
            </div>
            <div class="form-group">
                <label>Hasil Rapat</label>
                <textarea name="hasil" id="hasil-rapat" cols="30" rows="10" class="form-control" placeholder="Masukkan isi surat mu ..">
                    {!! old('hasil') == null ? $arsip->hasil_rapat : old('hasil')  !!}
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

        CKEDITOR.on('instanceReady', function(){

            CKEDITOR.instances['hasil-rapat'].setData('{!! $arsip->hasil_rapat !!}', {
                callback: async function() {
                    await this.checkDirty(); // true
                }
            });
        });
    </script>
@endsection
