<?php

namespace App\Models\SuperAdmin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class SuratRapatModel
 * @mixin Builder
 * @package App\Models\SuperAdmin
 */
class SuratRapatModel extends Model {
    protected $table = 'surat_rapat';
    protected $primaryKey = 'id_surat_rapat';

    public function updateSuratRapat($id, $nomor, $perihal, $tujuan, $jabatan, $pengirim, $tanggal, $isi){
        return $this->where([
            'id_surat_rapat'            => $id
        ])->update([
            'id_nomor_surat'            => $nomor,
            'perihal_surat'             => $perihal,
            'tujuan_surat'              => $tujuan,
            'isi_surat'                 => $isi,
            'jabatan_pengirim'          => $jabatan,
            'pengirim_surat'            => $pengirim,
            'tanggal_surat'             => $tanggal
        ]);
    }

    public function insertSuratRapat($nomor, $perihal, $tujuan, $jabatan, $pengirim, $tanggal, $isi){
        return $this->insert([
            'id_nomor_surat'            => $nomor,
            'perihal_surat'             => $perihal,
            'tujuan_surat'              => $tujuan,
            'isi_surat'                 => $isi,
            'jabatan_pengirim'          => $jabatan,
            'pengirim_surat'            => $pengirim,
            'tanggal_surat'             => $tanggal
        ]);
    }

    public function deleteSuratRapat($id) {
        return $this->where([
            'id_surat_rapat'            => $id
        ])->delete();
    }

    public function agendaRapat(){
        return $this->hasOne(AgendaRapatModel::class, 'rapat_id_nomor_surat');
    }
}
