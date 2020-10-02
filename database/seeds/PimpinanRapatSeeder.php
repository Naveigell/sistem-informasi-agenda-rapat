<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        $admins = DB::table('users');

        $internetFile   = File::get(app_path('Fakers/Data/internet.json'));
        $internetDecode = json_decode($internetFile);

        $prefix   = $internetDecode->email;

        for ($i = 0; $i < 100; $i++) {

            $separator = $this->random(['_', '.', '']);

            // jika kelipatan 2 maka buat nama pria, jika tidak maka buat nama
            // wanita
            $nama = $i % 2 == 0 ?
                $this->random($namaPria)." ".$this->random($namaPria) :
                $this->random($namaWanita)." ".$this->random($namaWanita);

            $email = strtolower(str_replace(' ', '', str_replace(" ", $separator, $nama).rand(0, 9999)."@".$this->random($prefix)));

            $nip = $this->nip();
            $adminExists = $admins->where('nip', $nip)->exists();

            if ($adminExists) continue;

            $pimpinanRapat->insertOrIgnore([
                'username'      => strtolower(str_replace(" ", $separator, $nama)),
                'nip'           => $nip,
                'password'      => Hash::make('123456'),
                'nama_pimpinan' => $nama,
                'jabatan'       => 'Birokrat',
                'jenis_kelamin' => $i % 2 == 0 ? 'Laki - laki' : 'Perempuan',
                'no_telepon'    => "08".rand(1000000000, 9999999999), // random 12 karakter angka untuk membuat no telp,
            ]);
        }
    }
}
