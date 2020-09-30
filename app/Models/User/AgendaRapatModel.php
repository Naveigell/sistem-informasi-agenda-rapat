<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * Class AgendaRapatModel
 * @mixin Builder
 * @package App\Models\User
 */
class AgendaRapatModel extends Model {
    protected $table = 'agenda_rapat';
    protected $primaryKey = 'id_agenda_rapat';

    public function getAll($id){
        return $this->where('rapat_id_pimpinan_rapat', $id)->with('surat')->get();
    }

    public function getWithId($id) {
        return $this->where('id_rapat', $id)->with('surat')->with('pimpinan')->get();
    }

    public function surat(){
        return $this->hasOne(SuratRapatModel::class, 'id_nomor_surat', 'rapat_id_nomor_surat');
    }

    public function pimpinan(){
        return $this->hasOne(PimpinanRapatModel::class, 'id_pimpinan_rapat', 'rapat_id_pimpinan_rapat');
    }
}
