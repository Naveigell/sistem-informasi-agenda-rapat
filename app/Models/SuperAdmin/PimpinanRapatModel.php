<?php

namespace App\Models\SuperAdmin;

use Illuminate\Database\Eloquent\Model;

class PimpinanRapatModel extends Model {
    protected $primaryKey = 'id_pimpinan_rapat';
    protected $table = 'pimpinan_rapat';

    public function agendaRapat(){
        return $this->hasOne(AgendaRapatModel::class, 'rapat_id_pimpinan_rapat');
    }
}
