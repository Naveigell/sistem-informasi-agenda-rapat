@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ url('/css/page/dashboard/dashboard.css') }}">
    <link rel="stylesheet" href="{{ url('/js/data-tables/datatables.min.css') }}">
@endsection

@section('body')
    <div class="body-section">
        <h4>List Admin</h4>
        <input type="text" id="_token" hidden value="{{ csrf_token() }}">
    </div>

    <div class="body-section logo-background">
        <h4>List Admin</h4>
        <table id="admin-table" style="margin-top: 30px; font-size: 15px;" class="table ">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Username</th>
                <th scope="col">Nip</th>
                <th scope="col">Wewenang</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($admins as $admin)
                <tr>
                    <th scope="row">{{ $number++ }}</th>
                    <td>{{ $admin->username }}</td>
                    <td>{{ $admin->nip }}</td>
                    <td>{{ $admin->role }}</td>
                    <td class="col-md-3">
                        <a href="admin/{{ $admin->id_user }}/edit" class="btn btn-md button-warning" type="button">Edit</a>
                        <button del-id="{{ $admin->id_user }}" class="btn btn-md button-primary del-btn" type="button">Hapus</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="admin/insert" type="button" class="btn btn-md button-success" name="button">
            <i class="glyphicon-plus glyphicon"></i> &nbsp Tambah Admin
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
                            url: '/api/superadmin/anggota/admin/delete',
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
            $('#admin-table').DataTable();
        });
    </script>

    @if(session()->has('success'))
        <script>
            swal("Success!", "{{ session()->get('success') }}");
        </script>
    @endif
@endsection
