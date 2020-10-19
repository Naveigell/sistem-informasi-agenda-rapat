<?php

namespace App\Http\Controllers\Api\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\Arsip\ArsipInsertRequest;
use App\Http\Requests\SuperAdmin\Arsip\ArsipUpdateRequest;
use App\Models\SuperAdmin\AgendaRapatModel;
use App\Models\SuperAdmin\ArsipModel;
use Illuminate\Http\Request;

class ArsipController extends Controller {

    private $arsipModel;

    public function __construct(){
        $this->arsipModel = new ArsipModel();
    }

    public function showView(){

        $arsip = $this->arsipModel->getAll();
        $number = 1;

        return view('pages.superadmin.arsip.arsip', compact('arsip', 'number'));
    }

    public function detailView($id) {

        $arsip = $this->arsipModel->getWithId($id)->first();

        return view('pages.superadmin.arsip.detail.detail', compact('arsip'));
    }

    public function insertView(){

        $agenda = AgendaRapatModel::all();

        return view('pages.superadmin.arsip.insert.insert', compact('agenda'));
    }

    public function editView($id){

        $arsip = $this->arsipModel->getWithId($id)->first();

        return view('pages.superadmin.arsip.edit.edit', compact('arsip'));
    }

    public function update(ArsipUpdateRequest $request) {

        $id = $request->id;
        $agenda = $request->agenda;
        $hasil = $request->hasil;
        $hasil = html_filter($hasil);

        $updated = $this->arsipModel->updateArsip($id, $agenda, $hasil);
        if (!$updated) {
            return back()->with('error', 'Arsip gagal diubah');
        }

        return redirect()->to('/superadmin/arsip')->with('success', 'Arsip berhasil diubah');
    }

    public function insert(ArsipInsertRequest $request){

        $agenda = $request->agenda;
        $hasil = $request->hasil;
        $hasil = html_filter($hasil);

        $saved = $this->arsipModel->insertArsip($agenda, $hasil);
        if (!$saved) {
            return back()->with('error', 'Arsip gagal dibuat');
        }

        return redirect()->to('/superadmin/arsip')->with('success', 'Arsip berhasil dibuat');
    }

    public function delete(Request $request){
        $id = $request->id;

        $deleted = $this->arsipModel->deleteArsip($id);
        if (!$deleted) {
            return response()->json(['Terjadi masalah saat menghapus arsip'], 500);
        }

        return response()->json(['Hapus arsip berhasil'], 200);
    }
}
