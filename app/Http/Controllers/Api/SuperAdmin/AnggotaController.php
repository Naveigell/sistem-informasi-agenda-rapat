<?php

namespace App\Http\Controllers\Api\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\Anggota\AnggotaInsertRequest;
use App\Models\SuperAdmin\PimpinanRapatModel;

class AnggotaController extends Controller {

    private $pimpinanModel;

    public function __construct(){
        $this->pimpinanModel = new PimpinanRapatModel;
    }

    public function showView() {
        return view('pages.superadmin.anggota.anggota');
    }

    public function insertView(){
        return view('pages.superadmin.anggota.insert');
    }

    public function insert(AnggotaInsertRequest $request) {

        if ($request->wewenang == 'Pimpinan Rapat') {
            $saved = $this->pimpinanModel->savePimpinanRapat(
                $request->nama, $request->jabatan, $request->jenis_kelamin, $request->telp
            );

            if ($saved) {
                return redirect('/superadmin/anggota/pimpinan')->with('success', 'Tambah pimpinan berhasil');
            }
        }

        return back()->with('error', 'Tambah data gagal')->withInput($request->all());
    }
}
