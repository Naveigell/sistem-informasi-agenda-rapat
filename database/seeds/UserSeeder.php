<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Traits\RandomSeeder;

class UserSeeder extends Seeder {
    use RandomSeeder;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $namaFile   = File::get(app_path('Fakers/Data/nama.json'));
        $namaDecode = json_decode($namaFile);

        $internetFile   = File::get(app_path('Fakers/Data/internet.json'));
        $internetDecode = json_decode($internetFile);

        $namaPria   = $namaDecode->nama->pria;
        $namaWanita = $namaDecode->nama->wanita;

        $prefix   = $internetDecode->email;

        $user = DB::table('users');
        $role = ['user', 'admin', 'superadmin'];

        for ($i = 0; $i < 40; $i++) {
            $separator = $this->random(['_', '.', '']);
            $nama = $i % 2 == 0 ?
                $this->random($namaPria).$separator.$this->random($namaPria) :
                $this->random($namaWanita).$separator.$this->random($namaWanita);

            $email = strtolower(str_replace(' ', '', $nama.rand(0, 9999)."@".$this->random($prefix)));

            $user->insertOrIgnore([
                'username'      => strtolower($nama),
                'email'         => $email,
                'password'      => Hash::make('123456'),
                'remember_token'=> Str::random(60),
                'role'          => $this->random($role),
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ]);
        }
    }
}
