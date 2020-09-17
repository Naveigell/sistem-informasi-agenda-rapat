@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ url('/css/page/superadmin/surat/detail.css') }}">
    <style>
        .body-section:last-child {
            margin-top: 780px;
        }
    </style>
@endsection

@section('body')
    <div class="body-section">
        <h4>Detail Surat</h4>
    </div>

    <div class="body-section col-md-12" style="padding: 40px 55px;">
        <div class="mail-container">
            <div class="mail-date">Jakarta, 12 Desember 1990</div>
            <div class="mail-detail">
                <table>
                    <tr>
                        <td>No</td>
                        <td>: 0831/123/SP/PT</td>
                    </tr>
                    <tr>
                        <td>Lampiran</td>
                        <td>: Surat Penting</td>
                    </tr>
                    <tr>
                        <td>Hal</td>
                        <td>: Rapat Dewan Direksi</td>
                    </tr>
                </table>
            </div>
            <br/>
            <br/>
            <div class="mail-to">
                Kepada <br/>
                Yth. Bapak Dewan Direksi <br/>
                Di Tempat
            </div>
            <br/>
            <br/>
            <div class="mail-body">
                <p class="mail-paragraph">
                    Dengan ini  Kepala Dewan Direksi mengundang Dewan Direksi untuk menghadiri Rapat Dewan Direksi yang bertujuan untuk
                    mensosialisasikan kegiatan sekolah serta pemberitahuan tentang peraturan - peraturan di sekolah kami. Rapat ini
                    akan dilaksanakan pada Sabtu 05 September 2200.
                </p>
                <p class="mail-paragraph">
                    Dalam rangka meningkatkan kinerja dan perbaikan alokasi jam kerja. Maka diberitahukan pada seluruh staff dan
                    karyawan PT. Makmur Jaya Abadi agar membaca informasi terbaru tentang perubahan sift agar tidak terjadi
                    kekeliruan. Perubahan jam kerja dapat dilihat pada lampiran surat dan keputusan ini tidak dapat diganggu gugat.
                </p>
                <p class="mail-paragraph">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur eveniet obcaecati perferendis voluptates
                    voluptatum? Accusamus accusantium aliquam asperiores assumenda hic laborum laudantium nam, necessitatibus,
                    officiis reprehenderit sequi, sit totam voluptatem.
                </p>
                <p class="mail-paragraph">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci commodi dignissimos illo magnam veniam
                    veritatis. Adipisci aliquam assumenda debitis, dolorum molestias, necessitatibus quam qui quos, ut vel veniam
                    vero.
                </p>
            </div>
            <br/>
            <br/>
            <br/>
            <div class="mail-from">
                <div class="mail-from-text">
                    <span class="mail-from-position">
                        Dewan Direksi Tertinggi, <span class="main-from-date">12 September 2020</span>
                    </span>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <span class="mail-from-name">Elit Global Official</span>
                </div>
            </div>
        </div>
    </div>

    <div class="body-section">
        <button class="button-secondary btn btn-md">Kembali</button>
        <button class="button-success btn btn-md"><i class="glyphicon glyphicon-print"></i> &nbsp Print</button>
    </div>
@endsection
