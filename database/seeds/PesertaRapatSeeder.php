<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

use App\Traits\RandomSeeder;

class PesertaRapatSeeder extends Seeder {
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

        $peserta = DB::table('peserta_rapat');

        for ($j = 1; $j <= 100; $j++) {
            $to = rand(25, 40);

            for ($i = 0; $i < $to; $i++){
                // jika kelipatan 2 maka buat nama pria, jika tidak maka buat nama
                // wanita
                $nama = $i % 2 == 0 ? $this->randomDouble($namaPria) : $this->randomDouble($namaWanita);

                $peserta->insertOrIgnore([
                    'peserta_rapat_id_rapat'    => $j,
                    'nama_peserta'              => $nama,
                    'jabatan_peserta'           => 'Karyawan',
                    'jenis_kelamin'             => $i % 2 == 0 ? 'Laki - laki' : 'Perempuan'
                ]);
            }
        }
    }
}
