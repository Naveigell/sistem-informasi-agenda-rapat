<?php

namespace App\Http\Controllers\Api\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\Surat\SuratUpdateRequest;
use App\Models\SuperAdmin\SuratRapatModel;
use Illuminate\Http\Request;

class SuratController extends Controller{

    private $suratRapatModel;

    public function __construct(){
        $this->suratRapatModel = new SuratRapatModel;
    }

    public function showView(){

        $surat = SuratRapatModel::all();
        $number = 1;

        return view('pages.superadmin.surat.surat', compact('surat', 'number'));
    }

    public function insertView(){
        return view('pages.superadmin.surat.insert.insert');
    }

    public function editView($id){

        $surat = SuratRapatModel::find($id);
        if ($surat == null) return back();

        return view('pages.superadmin.surat.edit.edit', compact('surat'));
    }

    public function detailView($id){

        $surat = SuratRapatModel::find($id);
        if ($surat == null) return back();

        return view('pages.superadmin.surat.detail.detail', compact('surat'));
    }

    public function delete(Request $request){

        $deleted = $this->suratRapatModel->deleteSuratRapat($request->id);

        if (!$deleted) {
            return response()->json(['Terjadi masalah saat menghapus surat'], 500);
        }

        return response()->json(['Hapus surat berhasil'], 200);
    }

    public function update(SuratUpdateRequest $request){

        $id = $request->id;
        $nomor = $request->nomor;
        $perihal = $request->perihal;
        $tujuan = $request->tujuan;
        $jabatan = $request->jabatan;
        $pengirim = $request->pengirim;
        $tanggal = $request->tanggal;

        $isi = $request->isi;
        $isi = html_filter($isi);

        $updated = $this->suratRapatModel->updateSuratRapat(
            $id, $nomor, $perihal, $tujuan, $jabatan, $pengirim, $tanggal, $isi
        );

        if (!$updated) {
            return back()->with('error', 'Terjadi masalah saat mengupdate surat');
        }
        return redirect()->to('/superadmin/surat')->with('success', 'Surat berhasil diubah');
    }
}
