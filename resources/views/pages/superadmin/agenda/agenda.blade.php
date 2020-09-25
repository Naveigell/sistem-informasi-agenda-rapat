@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ url('/css/page/dashboard/dashboard.css') }}">
    <link rel="stylesheet" href="{{ url('/js/data-tables/datatables.min.css') }}">
@endsection

@section('body')
    <div class="body-section">
        <h4 style="font-weight: bold;">Agenda Rapat</h4>
    </div>

    <div class="body-section">
        <h2>List Agenda Rapat</h2>
        <br/>
        <table id="agenda-table" style="margin-top: 30px; font-size: 15px;" class="table ">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Perihal</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Ruang Rapat</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $agenda)
                    @php
                        $date = Carbon\Carbon::parse($agenda->jadwal_rapat);
                    @endphp
                    <tr>
                        <th scope="row">{{ $number++ }}</th>
                        <td class="col-md-2">{{ $agenda->perihal_rapat }}</td>
                        <td>
                            {{ $date->day }}
                            {{ $date->monthName }}
                            {{ $date->year }}
                        </td>
                        <td>{{ date('H:i', strtotime($agenda->waktu_rapat)) }} WITA</td>
                        <td>{{ $agenda->ruangan_rapat }}</td>
                        <td class="col-md-3">
                            <a href="/superadmin/agenda/{{ $agenda->id_rapat }}" class="btn btn-md button-secondary" type="button" name="button">Detail</a>
                            <a href="/superadmin/agenda/{{ $agenda->id_rapat }}/edit" class="btn btn-md button-warning" type="button" name="button">Edit</a>
                            <button class="btn btn-md button-primary" type="button" name="button">Arsipkan</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br/>
        <a class="btn btn-md button-success" href="/superadmin/agenda/insert">Tambah Agenda Baru</a>
    </div>

    <script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ url('js/data-tables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#agenda-table').DataTable();
        });
    </script>

    @if(session()->has('success'))
        <script src="{{ url('js/sweetalert.min.js') }}"></script>
        <script>
            swal("Success!", "{{ session()->get('success') }}");
        </script>
    @endif
@endsection
