<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Surat\SuratInsertRequest;
use App\Http\Requests\Admin\Surat\SuratUpdateRequest;
use App\Models\Admin\SuratRapatModel;
use Illuminate\Http\Request;

class SuratController extends Controller{

    private $suratRapatModel;

    public function __construct(){
        $this->suratRapatModel = new SuratRapatModel;
    }

    public function showView(){

        $surat = SuratRapatModel::all();
        $number = 1;

        return view('pages.admin.surat.surat', compact('surat', 'number'));
    }

    public function insertView(){
        return view('pages.admin.surat.insert.insert');
    }

    public function editView($id){

        $surat = SuratRapatModel::find($id);
        if ($surat == null) return back();

        return view('pages.admin.surat.edit.edit', compact('surat'));
    }

    public function detailView($id){

        $surat = SuratRapatModel::find($id);
        if ($surat == null) return back();

        return view('pages.admin.surat.detail.detail', compact('surat'));
    }

    public function delete(Request $request){

        $deleted = $this->suratRapatModel->deleteSuratRapat($request->id);

        if (!$deleted) {
            return response()->json(['Terjadi masalah saat menghapus surat'], 500);
        }

        return response()->json(['Hapus surat berhasil'], 200);
    }

    public function insert(SuratInsertRequest $request) {

        $nomor = $request->nomor;
        $perihal = $request->perihal;
        $tujuan = $request->tujuan;
        $jabatan = $request->jabatan;
        $pengirim = $request->pengirim;
        $tanggal = $request->tanggal;

        $isi = $request->isi;
        $isi = html_filter($isi);

        $saved = $this->suratRapatModel->insertSuratRapat(
            $nomor, $perihal, $tujuan, $jabatan, $pengirim, $tanggal, $isi
        );

        if (!$saved) {
            return back()->with('error', 'Terjadi masalah saat mengupdate surat');
        }
        return redirect()->to(session()->get('role').'/surat')->with('success', 'Surat berhasil dibuat');
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
        return redirect()->to(session()->get('role').'/surat')->with('success', 'Surat berhasil diubah');
    }
}
