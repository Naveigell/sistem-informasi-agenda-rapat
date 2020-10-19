<?php

use Illuminate\Database\Seeder;

class ArsipRapatSeeder extends Seeder {
    use \App\Traits\RandomSeeder;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $arsip = File::get(app_path('Fakers/Data/arsip.json'));
        $arsip = json_decode($arsip);

        $table = \Illuminate\Support\Facades\DB::table('arsip_rapat');
        $agenda = \Illuminate\Support\Facades\DB::select(\Illuminate\Support\Facades\DB::raw('SELECT * FROM agenda_rapat LIMIT 0, 49'));

        for ($i = 0; $i < count($agenda); $i++) {
            $id = $agenda[$i]->id_rapat;
            $ar = $this->random($arsip->arsip);

            $table->insert([
                'arsip_rapat_id_agenda_rapat'   => $id,
                'hasil_rapat'                   => $ar,
                'created_at'                    => date('Y-m-d H:i:s'),
                'updated_at'                    => date('Y-m-d H:i:s')
            ]);
        }
    }
}
