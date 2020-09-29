<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Facades\Hash;

/**
 * @mixin QueryBuilder
 */
class PimpinanRapatModel extends Model {
    protected $primaryKey = 'id_pimpinan_rapat';
    protected $table = 'pimpinan_rapat';

    /**
     * Relationship with Agenda Rapat Model
     *
     * Relationship dengan Agenda Rapat Model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function agendaRapat(){
        return $this->hasOne(AgendaRapatModel::class, 'rapat_id_pimpinan_rapat');
    }

    public function getWithId($id) {
        return $this->where([
            'id_pimpinan_rapat'      => $id
        ])->get();
    }

    public function deletePimpinanRapat($id) {
        return $this->where([
            'id_pimpinan_rapat'     => $id
        ])->delete();
    }

    public function updatePimpinanRapat($id, $nama, $jabatan, $jenis_kelamin, $no_telp){
        return $this->where([
            'id_pimpinan_rapat'     => $id
        ])->update([
            'nama_pimpinan'         => $nama,
            'jabatan'               => $jabatan,
            'jenis_kelamin'         => $jenis_kelamin,
            'no_telepon'            => $no_telp
        ]);
    }

    /**
     * Insert pimpinan rapat
     *
     * @param $nama string
     * @param $jabatan string
     * @param $jenis_kelamin string
     * @param $no_telp string
     * @return bool
     */
    public function savePimpinanRapat($nama, $username, $email, $jabatan, $jenis_kelamin, $no_telp){
        return $this->insert([
            'nama_pimpinan'         => $nama,
            'username'              => $username,
            'email'                 => $email,
            'password'              => Hash::make('123456'),
            'jabatan'               => $jabatan,
            'jenis_kelamin'         => $jenis_kelamin,
            'no_telepon'            => $no_telp
        ]);
    }
}
