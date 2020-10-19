<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class ArsipModel
 * @mixin Builder
 * @package App\Models\SuperAdmin
 */
class ArsipModel extends Model {
    protected $table = 'arsip_rapat';
    protected $primaryKey = 'id_arsip_rapat';

    public function getAll(){
        return $this->with('agenda')->get();
    }

    public function getWithId($id) {
        return $this->with('agenda')->where('id_arsip_rapat', $id)->get();
    }

    public function deleteArsip($id) {
        return $this->where('id_arsip_rapat', $id)->delete();
    }

    public function updateArsip($id, $agenda, $hasil) {
        return $this->where('id_arsip_rapat', $id)->update([
            'arsip_rapat_id_agenda_rapat'       => $agenda,
            'hasil_rapat'                       => $hasil,
            'updated_at'                        => date('Y-m-d H:i:s')
        ]);
    }

    public function insertArsip($agenda, $hasil) {
        return $this->insert([
            'arsip_rapat_id_agenda_rapat'       => $agenda,
            'hasil_rapat'                       => $hasil,
            'created_at'                        => date('Y-m-d H:i:s'),
            'updated_at'                        => date('Y-m-d H:i:s')
        ]);
    }

    public function agenda(){
        return $this->belongsTo(AgendaRapatModel::class, 'arsip_rapat_id_agenda_rapat', 'id_rapat');
    }
}
