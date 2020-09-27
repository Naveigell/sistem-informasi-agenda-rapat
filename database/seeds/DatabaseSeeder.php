<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call(UserSeeder::class);
        $this->call(PimpinanRapatSeeder::class);
        $this->call(SuratRapatSeeder::class);
        $this->call(AgendaRapatSeeder::class);
        $this->call(PesertaRapatSeeder::class);
    }
}
