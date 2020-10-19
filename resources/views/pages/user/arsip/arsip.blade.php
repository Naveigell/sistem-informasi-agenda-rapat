@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ url('/css/page/dashboard/dashboard.css') }}">
    <link rel="stylesheet" href="{{ url('/js/data-tables/datatables.min.css') }}">
@endsection

@section('body')

    <div class="body-section">
        <h4 style="font-weight: bold;">Arsip Rapat</h4>
        <input type="text" id="_token" value="{{ csrf_token() }}" hidden>
    </div>

    <div class="body-section">
        <h2>List Arsip Rapat</h2>
        <br/><br/>
        <table style="margin-top: 30px; font-size: 15px;" class="table" id="arsip-table">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Perihal</th>
                <th scope="col">Nomor Surat</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($arsip as $a)
                <tr>
                    <th scope="row">{{ $number++ }}</th>
                    <td>{{ $a['agenda']->perihal_rapat }}</td>
                    <td>{{ $a['agenda']->rapat_id_nomor_surat }}</td>
                    <td class="col-md-3">
                        <a href="/user/arsip/{{ $a->id_arsip_rapat }}" class="btn btn-md button-secondary" type="button" name="button">Lihat Hasil</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br/>
    </div>

    <script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ url('js/data-tables/datatables.min.js') }}"></script>
    <script src="{{ url('js/sweetalert.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.btn-action-hapus').on('click', function (evt) {
                const id = evt.target.getAttribute('hapus-id');

                swal({
                    title: "Hapus data?",
                    text: "Data tidak akan bisa dikembalikan!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then(function (ok) {
                    if (!ok) return;

                    $.ajax({
                        url: '/api/admin/arsip/delete',
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

            $('#arsip-table').DataTable();
        });
    </script>

    @if(session()->has('success'))
        <script src="{{ url('js/sweetalert.min.js') }}"></script>
        <script>
            swal({
                title: "Success!",
                text: "{{ session()->get('success') }}",
                icon: "success",
                button: "OK",
            })
        </script>
    @endif
@endsection
