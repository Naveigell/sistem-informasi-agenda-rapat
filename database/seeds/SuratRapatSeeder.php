<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

use App\Traits\RandomSeeder;

class SuratRapatSeeder extends Seeder {

    use RandomSeeder;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $namaFile   = File::get(app_path('Fakers/Data/nama.json'));
        $namaDecode = json_decode($namaFile);

        $namaPria   = $namaDecode->nama->pria;
        $namaWanita = $namaDecode->nama->wanita;

        $suratFile   = File::get(app_path('Fakers/Data/surat.json'));
        $suratDecode = json_decode($suratFile);

        $surat  = DB::table('surat_rapat');

        for ($i = 0; $i < 200; $i++) {
            $perihal    = $this->random($suratDecode->surat->perihal);
            $tujuan     = $this->random($suratDecode->surat->tujuan);
            $jabatan    = $this->random($suratDecode->surat->jabatan_pengirim);

            $surat->insertOrIgnore([
                'id_nomor_surat'    => $this->nomorSurat(),
                'perihal_surat'     => $perihal,
                'tujuan_surat'      => $tujuan,
                'isi_surat'         => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aperiam cum deserunt dignissimos ducimus error est exercitationem, nam neque. Ad aspernatur at delectus distinctio dolorum, exercitationem necessitatibus nulla quos tenetur!',
                'jabatan_pengirim'  => $jabatan,
                'pengirim_surat'    => $i % 2 == 0 ? $this->randomDouble($namaPria) : $this->randomDouble($namaWanita),
                'tanggal_surat'     => date('Y-m-d')
            ]);
        }
    }
}
