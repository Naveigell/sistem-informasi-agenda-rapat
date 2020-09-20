@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ url('/css/page/superadmin/agenda/detail.css') }}">
    <link rel="stylesheet" href="{{ url('/js/data-tables/datatables.min.css') }}">
@endsection

@section('body')
    <div class="body-section">
        <h2>Rapat Perihal {{ $data->perihal_rapat }}</h2>
    </div>

    <div class="body-section-container">
        <div class="body-section">
            <h4>Tanggal</h4>
            <span>{{ $data->jadwal_rapat }}</span>
        </div>
        <div class="body-section">
            <h4>Waktu</h4>
            <span>{{ date('H.i', strtotime($data->waktu_rapat)) }} WITA</span>
        </div>
        <div class="body-section">
            <h4>Ruang Rapat</h4>
            <span>{{ $data->ruangan_rapat }}</span>
        </div>
        <div class="body-section">
            <h4>Jumlah peserta</h4>
            <span>100 Orang</span>
        </div>
    </div>

    <div class="body-section">
        <h4>List Peserta Rapat</h4>
        <br/>
        <table id="peserta-table" style="margin-top: 30px; font-size: 15px;" class="table ">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Peserta</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>John Doe</td>
                    <td>Pimpinan Rapat</td>
                    <td>
                        <button class="btn btn-md button-secondary" type="button" name="button">Detail</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>John Gonna Doe</td>
                    <td>Peserta</td>
                    <td>
                        <button class="btn btn-md button-secondary" type="button" name="button">Detail</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Bedford Jane Doe</td>
                    <td>Peserta</td>
                    <td>
                        <button class="btn btn-md button-secondary" type="button" name="button">Detail</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ url('js/data-tables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#peserta-table').DataTable();
        });
    </script>
@endsection
