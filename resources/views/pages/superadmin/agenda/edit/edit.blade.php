@extends('layouts.dashboard')

@section('styles')
{{--    <link rel="stylesheet" href="{{ url('/css/page/superadmin/agenda/edit.css') }}">--}}
    <link rel="stylesheet" href="{{ url('/js/data-tables/datatables.min.css') }}">
@endsection

@section('body')
    <div class="body-section">
        <h2>Edit Agenda Rapat</h2>
    </div>
    <input id="_token" type="text" hidden value="{{ csrf_token() }}">

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
        <h2>List Peserta Rapat</h2>
        <br/>
        <table id="agenda-table" style="margin-top: 30px; font-size: 15px;" class="table ">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Peserta</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
                @php
                    $pesertaNumber = 1;
                @endphp
                @foreach($peserta as $p)
                    <tr>
                        <th scope="row">{{ $pesertaNumber++ }}</th>
                        <td class="col-md-2">{{ $p['nama_peserta'] }}</td>
                        <td>{{ $p['jabatan_peserta'] }}</td>
                        <td>{{ $p['jenis_kelamin'] }}</td>
                        <td class="col-md-3">
                            <button class="btn btn-md button-warning btn-action-edit" type="button" edit-id="{{ $p['id_peserta_rapat'] }}" name="button">Edit</button>
                            <button class="btn btn-md button-primary btn-action-delete" type="button" delete-id="{{ $p['id_peserta_rapat'] }}" name="button">Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br/>
        <button id="btn-action-add" class="btn btn-md button-success">Tambah Peserta Baru</button>
    </div>

    <div id="add-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form class="col body-section-container" style="padding: 30px;">
                    <h3>Tambah Peserta</h3>
                    <br/>
                    <div class="form-group">
                        <label>Nama Peserta</label>
                        <input id="nama_peserta1" type="text" name="nama" class="form-control" placeholder="Nama peserta ..">
                        <small class="form-text text-muted">Contoh: John Doe</small>
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <input id="jabatan1" type="text" name="jabatan" class="form-control" placeholder="Jabatan ..">
                        <small class="form-text text-muted">Contoh: Birokrat</small>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin1">
                            <option value="Laki - laki">Laki - laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <small class="form-text text-muted">Contoh: Laki - laki</small>
                    </div>
                    <span class="error-message"></span>
                    <button id="btn-action-save-peserta" type="button" class="btn button-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form class="col body-section-container" style="padding: 30px;">
                    <input type="text" hidden id="id_peserta" value="">
                    <h3>Edit Data Peserta</h3>
                    <br/>
                    <div class="form-group">
                        <label>Nama Peserta</label>
                        <input id="nama_peserta" type="text" name="nama" class="form-control" placeholder="Nama peserta ..">
                        <small class="form-text text-muted">Contoh: John Doe</small>
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <input id="jabatan" type="text" name="jabatan" class="form-control" placeholder="Jabatan ..">
                        <small class="form-text text-muted">Contoh: Birokrat</small>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                            <option value="Laki - laki">Laki - laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <small class="form-text text-muted">Contoh: Laki - laki</small>
                    </div>
                    <span class="error-message"></span>
                    <button id="btn-action-edit-peserta" type="button" class="btn button-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ url('css/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/data-tables/datatables.min.js') }}"></script>
    <script src="{{ url('js/sweetalert.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            const nama = $('#nama_peserta')[0];
            const jabatan = $('#jabatan')[0];
            const jenisKelamin = $('#jenis_kelamin')[0];

            $('#btn-action-add').on('click', function (evt) {
                $('#add-modal').modal('show');
            })

            $('#btn-action-save-peserta').on('click', function (evt) {
                const nama1 = $('#nama_peserta1')[0];
                const jabatan1 = $('#jabatan1')[0];
                const jenisKelamin1 = $('#jenis_kelamin1')[0];

                $.ajax({
                    url: '/api/superadmin/peserta/insert',
                    method: 'POST',
                    data: {
                        nama: nama1.value,
                        jabatan: jabatan1.value,
                        jenis_kelamin: jenisKelamin1.value,
                        peserta_rapat_id_rapat: '{{ $data->id_rapat }}',
                        _token: $('#_token')[0].value
                    },
                    success: function (response) {
                        swal({
                            title: "Success!",
                            text: "Tambah data peserta berhasil",
                            icon: "success",
                            button: "OK",
                        }).then(function () {
                            window.location.reload();
                        });
                    },
                    error: function (error) {
                        const object = error.responseJSON;
                        const message = object[Object.keys(object)[0]][0];
                        swal({
                            title: `Gagal! (${error.status})`,
                            text: message,
                            icon: "error",
                            button: "OK",
                        });
                        console.log(error)
                    }
                })
            });

            $('.btn-action-delete').on('click', function (evt) {
                const id = evt.target.getAttribute('delete-id');

                swal({
                    title: "Hapus Peserta Rapat?",
                    text: "Data tidak akan bisa dikembalikan",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then(function (ok) {
                    if (ok == null) return;

                    $.ajax({
                        url: '/api/superadmin/peserta/delete',
                        method: 'POST',
                        data: {
                           id: id,
                           _token: $('#_token')[0].value
                        },
                        success: function (response) {
                            swal({
                                title: "Success!",
                                text: "Hapus data peserta berhasil",
                                icon: "success",
                                button: "OK",
                            }).then(function () {
                                window.location.reload();
                            });
                        },
                        error: function (error) {
                            swal({
                                title: `Gagal! (${error.status})`,
                                text: "Hapus data peserta gagal",
                                icon: "error",
                                button: "OK",
                            });
                        }
                    });
                });
            });

            $('#btn-action-edit-peserta').on('click', function (evt) {
                const id = $('#id_peserta')[0].value;

                $.ajax({
                    url: '/api/superadmin/peserta/update',
                    method: 'POST',
                    data: {
                        id: id,
                        nama: nama.value,
                        jabatan: jabatan.value,
                        jenis_kelamin: jenisKelamin.value,
                        _token: $('#_token')[0].value
                    },
                    success: function (response) {
                        $('#edit-modal').modal('hide');
                        swal({
                            title: "Success!",
                            text: "Ubah data peserta berhasil",
                            icon: "success",
                            button: "OK",
                        }).then(function () {
                            window.location.reload();
                        });
                    },
                    error: function (error) {
                        const object = error.responseJSON;
                        const message = object[Object.keys(object)[0]][0];
                        swal({
                            title: `Gagal! (${error.status})`,
                            text: message,
                            icon: "error",
                            button: "OK",
                        });
                    }
                });
            });

            $('.btn-action-edit').on('click', function (evt) {
                const id = evt.target.getAttribute('edit-id');

                $.ajax({
                    url: '/api/superadmin/peserta/' + id,
                    data: {
                        id: id
                    },
                    success: function (response) {

                        $('#edit-modal').modal('show');
                        $('#id_peserta')[0].value = id;

                        nama.value = response.nama_peserta;
                        jabatan.value = response.jabatan_peserta;
                        jenisKelamin.value = response.jenis_kelamin;
                    },
                    error: function (error) {
                        console.log(error)
                    }
                })
            });

            $('#agenda-table').DataTable();
        });
    </script>
@endsection
