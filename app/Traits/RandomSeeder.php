<?php

namespace App\Traits;

use Carbon\Carbon;

trait RandomSeeder {

    /**
     * Generate random string, given by $data array
     *
     * @param array $data
     * @return string
     */
    public function random(array $data) : string {
        return $data[mt_rand(0, count($data) - 1)];
    }

    public function nip(){
        return rand(111111111111111111, 999999999999999999);
    }

    /**
     * Multiple generate random string, normally to get random name
     *
     * @param array $data
     * @return string
     */
    public function randomDouble(array $data) : string {
        return $this->random($data)." ".$this->random($data);
    }

    /**
     * Generate random string for nomor surat, you can
     * change return value as you like
     *
     * @return string
     */
    public function nomorSurat() : string {
        return "BAPPEDA/".rand(100, 999)."/TGS/".date("Y/His");
    }

    /**
     * Generate random date, get date now and add into given random date
     *
     * @param int $from
     * @param int $to
     * @return string
     */
    public function randomDate($from = 40, $to = 320) : string {
        $date = Carbon::now();
        $randomDay = mt_rand($from, $to);

        return $date->addDays($randomDay)->toDateString();
    }

    /**
     * Generate random time, get time now and add into given random time
     *
     * @param int $from
     * @param int $to
     * @return string
     */
    public function randomTime($from = 400, $to = 1200) : string {
        $time = Carbon::now();
        $randomHour = mt_rand($from, $to);

        return $time->addHours($randomHour)->toTimeString();
    }
}
