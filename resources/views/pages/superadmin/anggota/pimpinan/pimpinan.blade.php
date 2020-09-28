@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ url('/css/page/dashboard/dashboard.css') }}">
    <link rel="stylesheet" href="{{ url('/js/data-tables/datatables.min.css') }}">
@endsection

@section('body')
    <div class="body-section">
        <h4>List Anggota</h4>
        <input type="text" id="_token" hidden value="{{ csrf_token() }}">
    </div>

    <div class="body-section">
        <h4>List Pimpinan Rapat</h4> <br/>
        <table id="anggota-table" style="margin-top: 30px; font-size: 15px;" class="table ">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Peserta</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Telp</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pimpinan as $p)
                    <tr>
                        <th scope="row">{{ $number++ }}</th>
                        <td>{{ $p->nama_pimpinan }}</td>
                        <td>{{ $p->jabatan }}</td>
                        <td>{{ $p->jenis_kelamin }}</td>
                        <td>{{ $p->no_telepon }}</td>
                        <td class="col-md-3">
                            <a href="pimpinan/{{ $p->id_pimpinan_rapat }}" class="btn btn-md button-secondary" type="button">Detail</a>
                            <a href="pimpinan/{{ $p->id_pimpinan_rapat }}/edit" class="btn btn-md button-warning" type="button">Edit</a>
                            <button del-id="{{ $p->id_pimpinan_rapat }}" class="btn btn-md button-primary del-btn" type="button">Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="pimpinan/insert" type="button" class="btn btn-md button-success" name="button">
            <i class="glyphicon-plus glyphicon"></i> &nbsp Tambah Anggota
        </a>
    </div>

    <script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ url('js/data-tables/datatables.min.js') }}"></script>
    <script src="{{ url('js/sweetalert.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.del-btn').on('click', function (evt){
                const id = evt.target.getAttribute('del-id');

                if (id !== undefined || id !== null) {
                    swal({
                        title: "Hapus data?",
                        text: "Data tidak akan bisa dikembalikan!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((response) => {

                        if (response == null) return;

                        $.ajax({
                            url: '/api/superadmin/anggota/pimpinan/delete',
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
                                    icon: "warning",
                                    button: "OK",
                                });
                            }
                        });
                    });
                }
            });
            $('#anggota-table').DataTable();
        });
    </script>

    @if(session()->has('success'))
        <script>
            swal("Success!", "{{ session()->get('success') }}");
        </script>
    @endif
@endsection
