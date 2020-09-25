<?php

namespace App\Models\SuperAdmin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class PesertaRapatModel
 * @mixin Builder
 * @package App\Models\SuperAdmin
 */
class PesertaRapatModel extends Model {
    protected $table = 'peserta_rapat';
    protected $primaryKey = 'id_peserta_rapat';

    public function agendaRapat(){
        return $this->belongsTo(AgendaRapatModel::class, 'peserta_rapat_id_rapat', 'id_rapat');
    }

    public function getAt($id) {
        return $this->where('id_peserta_rapat', $id)->first();
    }

    public function deletePesertaRapat($id){
        return $this->where('id_peserta_rapat', $id)->delete();
    }

    public function updatePesertaRapat($id, $nama, $jabatan, $jenis_kelamin){
        return $this->where('id_peserta_rapat', $id)->update([
            'nama_peserta'          => $nama,
            'jabatan_peserta'       => $jabatan,
            'jenis_kelamin'         => $jenis_kelamin
        ]);
    }

    public function insertPesertaRapat($id_rapat, $nama, $jabatan, $jenis_kelamin){
        return $this->insert([
            'peserta_rapat_id_rapat'=> $id_rapat,
            'nama_peserta'          => $nama,
            'jabatan_peserta'       => $jabatan,
            'jenis_kelamin'         => $jenis_kelamin
        ]);
    }
}
