<?php

namespace App\Http\Controllers\Api\SuperAdmin\Anggota;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\Anggota\Pimpinan\PimpinanUpdateRequest;
use App\Models\SuperAdmin\PimpinanRapatModel;
use Illuminate\Http\Request;

class PimpinanController extends Controller {

    private $pimpinanRapatModel;

    public function __construct(){
        $this->pimpinanRapatModel = new PimpinanRapatModel;
    }

    public function showView() {

        $pimpinan = PimpinanRapatModel::all();
        $number = 1;

        return view('pages.superadmin.anggota.pimpinan.pimpinan', compact('pimpinan', 'number'));
    }

    public function insertView(){
        return view('pages.superadmin.anggota.pimpinan.insert.insert');
    }

    public function editView($id) {

        $pimpinan = $this->pimpinanRapatModel->getWithId($id)->first();

        if ($pimpinan == null) return back();

        return view('pages.superadmin.anggota.pimpinan.edit.edit', compact('pimpinan'));
    }

    public function detailView($id){

        $pimpinan = $this->pimpinanRapatModel->getWithId($id)->first();

        if ($pimpinan == null) return back();

        return view('pages.superadmin.anggota.pimpinan.detail.detail', compact('pimpinan'));
    }

    public function update(PimpinanUpdateRequest $request) {

        $updated = $this->pimpinanRapatModel->updatePimpinanRapat(
            $request->id, $request->nama, $request->jabatan, $request->jenis_kelamin, $request->telp
        );

        if (!$updated) {
            return back()->with('error', 'Mengubah data pimpinan rapat gagal');
        }

        return redirect()->to('/superadmin/anggota/pimpinan')->with('success', 'Mengubah data pimpinan rapat berhasil');
    }

    public function delete(Request $request) {

        $deleted = $this->pimpinanRapatModel->deletePimpinanRapat($request->id);

        if (!$deleted) {
            return response()->json(['Terjadi kesalahan saat menghapus pimpinan rapat'], 500);
        }

        return response()->json(['Hapus data berhasil'], 202);
    }
}
