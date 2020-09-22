@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ url('/css/page/superadmin/surat/surat.css') }}">
    <link rel="stylesheet" href="{{ url('/js/data-tables/datatables.min.css') }}">
@endsection

@section('body')
    <div class="body-section">
        <h4 style="font-weight: bold;">Surat</h4>
    </div>

    <div class="body-section">
        <h2>List Surat</h2>
        <input id="_token" type="text" hidden value="{{ csrf_token() }}">
        <br/>
        <table id="surat-table" style="margin-top: 30px; font-size: 15px;" class="table ">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">No Surat</th>
                    <th scope="col">Pengirim</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($surat as $s)
                    <tr>
                        <th scope="row">{{ $number++ }}</th>
                        <td class="">{{ $s->perihal_surat }}</td>
                        <td>{{ $s->id_nomor_surat }}</td>
                        <td>{{ $s->pengirim_surat }}</td>
                        <td class="col-md-3">
                            <a href="/superadmin/surat/{{ $s->id_surat_rapat }}" class="btn btn-md button-secondary" type="button" name="button">Detail</a>
                            <a href="/superadmin/surat/{{ $s->id_surat_rapat }}/edit" class="btn btn-md button-warning" type="button" name="button">Edit</a>
                            <button del-id="{{ $s->id_surat_rapat }}" class="btn btn-md button-primary del-btn" type="button" name="button">Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button class="btn btn-md button-success" type="button" name="button">Tambah Agenda Baru</button>
    </div>

    <script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ url('js/data-tables/datatables.min.js') }}"></script>
    <script src="{{ url('js/sweetalert.min.js') }}"></script>
    <script>

        function del(evt) {

        }

        $(document).ready(function () {

            $('.del-btn').on('click', function (evt){
                const id = evt.target.getAttribute('del-id');
                swal({
                    title: "Hapus data?",
                    text: "Data tidak akan bisa dikembalikan!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then(function (res){

                    if (res == null) return;

                    $.ajax({
                        url: '/api/superadmin/surat/delete',
                        method: 'POST',
                        data: {
                            id: id,
                            _token: $('#_token')[0].value
                        },
                        success: function (res) {

                            if (res == null) return;

                            swal({
                                title: "Success!",
                                text: "Hapus data berhasil!",
                                icon: "success",
                                button: "OK",
                            }).then(function () {
                                window.location.reload();
                            });
                        },
                        error: function (error) {
                            swal({
                                title: `Error! (${error.status})`,
                                text: error.responseJSON[0],
                                icon: "error",
                                button: "OK",
                            });
                        }
                    });
                });
            });

            $('#surat-table').DataTable();
        });
    </script>

    @if(session()->has('success'))
        <script>
            swal("Success!", "{{ session()->get('success') }}");
        </script>
    @endif
@endsection
