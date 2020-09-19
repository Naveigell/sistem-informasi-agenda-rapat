<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

use App\Traits\RandomSeeder;

class AgendaRapatSeeder extends Seeder {

    use RandomSeeder;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $rapatFile      = File::get(app_path('Fakers/Data/rapat.json'));
        $rapatDecode    = json_decode($rapatFile);

        $suratFile      = File::get(app_path('Fakers/Data/surat.json'));
        $suratDecode    = json_decode($suratFile);

        $agenda     = DB::table('agenda_rapat');
        $surat      = DB::table('surat_rapat')->get(['id_nomor_surat']);
        $pimpinan   = DB::table('pimpinan_rapat')->get(['id_pimpinan_rapat']);

        $surat      = collect($surat)->map(function ($item, $index) {
            return $item->id_nomor_surat;
        })->toArray();

        $pimpinan   = collect($pimpinan)->map(function ($item, $index) {
            return $item->id_pimpinan_rapat;
        })->toArray();

        for ($i = 0; $i < 300; $i++) {
            $idPimpinan = $this->random($pimpinan);
            $idSurat    = $this->random($surat);
            $perihal    = $this->random($suratDecode->surat->perihal);
            $jadwal     = $this->randomDate();
            $waktu      = $this->randomTime();
            $ruangan    = $this->random($rapatDecode->ruangan);

            $agenda->insertOrIgnore([
                'rapat_id_pimpinan_rapat'   => $idPimpinan,
                'rapat_id_nomor_surat'      => $idSurat,
                'perihal_rapat'             => $perihal,
                'jadwal_rapat'              => $jadwal,
                'waktu_rapat'               => $waktu,
                'ruangan_rapat'             => $ruangan,
                'created_at'                => date('Y-m-d H:i:s'),
                'updated_at'                => date('Y-m-d H:i:s')
            ]);
        }
    }
}
