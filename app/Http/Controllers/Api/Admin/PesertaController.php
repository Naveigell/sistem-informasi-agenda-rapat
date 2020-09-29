<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Peserta\PesertaInsertRequest;
use App\Http\Requests\Admin\Peserta\PesertaUpdateRequest;
use App\Models\Admin\PesertaRapatModel;
use Illuminate\Http\Request;

class PesertaController extends Controller {

    private $pesertaModel;

    public function __construct(){
        $this->pesertaModel = new PesertaRapatModel;
    }

    public function getAt($id) {
        $peserta = $this->pesertaModel->getAt($id);

        if ($peserta == null)
            return back();

        return $peserta;
    }

    public function update(PesertaUpdateRequest $request) {

        $id = $request->id;
        $nama = $request->nama;
        $jabatan = $request->jabatan;
        $jenisKelamin = $request->jenis_kelamin;

        $updated = $this->pesertaModel->updatePesertaRapat($id, $nama, $jabatan, $jenisKelamin);

        if ($updated) {
            return $this->json('message', 'Update data peserta berhasil', 200);
        }
        return $this->json('message', 'Terjadi kesalahan saat mengubah data', 500);
    }

    public function insert(PesertaInsertRequest $request){
        $nama = $request->nama;
        $jabatan = $request->jabatan;
        $jenisKelamin = $request->jenis_kelamin;
        $id_rapat = $request->peserta_rapat_id_rapat;

        $inserted = $this->pesertaModel->insertPesertaRapat($id_rapat, $nama, $jabatan, $jenisKelamin);

        if ($inserted) {
            return $this->json('message', 'Tambah data peserta berhasil', 200);
        }
        return $this->json('message', 'Terjadi kesalahan saat menambah peserta', 500);
    }

    public function delete(Request $request) {
        $deleted = $this->pesertaModel->deletePesertaRapat($request->id);

        if (!$deleted) {
            return $this->json('message', 'Terjadi kesalahan saat menghapus data', 500);
        }
        return $this->json('message', 'Hapus data peserta berhasil', 200);
    }

    private function json($key, $value, $code) {
        return response()->json([
            $key => [$value]
        ], $code);
    }
}
