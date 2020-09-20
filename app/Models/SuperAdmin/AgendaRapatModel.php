<?php

namespace App\Models\SuperAdmin;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Query\Builder as QueryBuilder;

/**
 * @mixin QueryBuilder
 */
class AgendaRapatModel extends Model {
    protected $table = 'agenda_rapat';
    protected $primaryKey = 'id_rapat';

    /**
     * Save a new agenda rapat into database
     *
     * Simpan agenda rapat baru kedalam database
     *
     * @param $perihal string
     * @param $surat string
     * @param $pimpinan string
     * @param $tanggal string
     * @param $waktu string
     * @param $ruangan string
     * @return bool
     */
    public function saveAgendaRapat($perihal, $surat, $pimpinan, $tanggal, $waktu, $ruangan){
        return $this->insert([
            'perihal_rapat'                 => $perihal,
            'rapat_id_pimpinan_rapat'       => $pimpinan,
            'rapat_id_nomor_surat'          => $surat,
            'jadwal_rapat'                  => $tanggal,
            'waktu_rapat'                   => $waktu,
            'ruangan_rapat'                 => $ruangan
        ]);
    }

    public function updateAgendaRapat($id, $perihal, $surat, $pimpinan, $tanggal, $waktu, $ruangan){
        return $this->where([
            'id_rapat'                      => $id
        ])->update([
            'perihal_rapat'                 => $perihal,
            'rapat_id_pimpinan_rapat'       => $pimpinan,
            'rapat_id_nomor_surat'          => $surat,
            'jadwal_rapat'                  => $tanggal,
            'waktu_rapat'                   => $waktu,
            'ruangan_rapat'                 => $ruangan
        ]);
    }

    /**
     * Get Agenda Rapat and Pimpinan Rapat by given id
     *
     * Ambil Agenda Rapat dan Pimpinan Rapat dari id yang diterima
     *
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getWithId($id) {
        return $this->with('pimpinanRapat')->where([
            'id_rapat'      => $id
        ])->get();
    }

    /**
     * Relationship with Pimpinan Rapat
     *
     * Relationship dengan Pimpinan Rapat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pimpinanRapat(){
        return $this->belongsTo(PimpinanRapatModel::class, 'rapat_id_pimpinan_rapat', 'id_pimpinan_rapat');
    }
}
