<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

use App\Traits\RandomSeeder;

class PimpinanRapatSeeder extends Seeder {

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

        $pimpinanRapat = DB::table('pimpinan_rapat');

        for ($i = 0; $i < 100; $i++) {

            // jika kelipatan 2 maka buat nama pria, jika tidak maka buat nama
            // wanita
            $nama = $i % 2 == 0 ? $this->randomDouble($namaPria) : $this->randomDouble($namaWanita);

            $pimpinanRapat->insertOrIgnore([
                'nama_pimpinan' => $nama,
                'jabatan'       => 'Birokrat',
                'jenis_kelamin' => $i % 2 == 0 ? 'Laki - laki' : 'Perempuan',
                'no_telepon'    => "08".rand(1000000000, 9999999999), // random 12 karakter angka untuk membuat no telp,
            ]);
        }
    }
}
