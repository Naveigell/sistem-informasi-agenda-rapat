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
            </tr>
            </thead>
            <tbody>
            @foreach($admins as $admin)
                <tr>
                    <th scope="row">{{ $number++ }}</th>
                    <td>{{ $admin->username }}</td>
                    <td>{{ $admin->nip }}</td>
                    <td>{{ $admin->role }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ url('js/data-tables/datatables.min.js') }}"></script>
    <script src="{{ url('js/sweetalert.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#admin-table').DataTable();
        });
    </script>

    @if(session()->has('success'))
        <script>
            swal("Success!", "{{ session()->get('success') }}");
        </script>
    @endif
@endsection
