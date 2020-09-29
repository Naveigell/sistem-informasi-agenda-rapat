<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\Agenda\AgendaInsertRequest;
use App\Http\Requests\Admin\Agenda\AgendaUpdateRequest;

use App\Models\Admin\AgendaRapatModel;
use App\Models\Admin\PimpinanRapatModel;
use App\Models\Admin\SuratRapatModel;
use Illuminate\Http\Request;

class AgendaController extends Controller {

    private $agendaRapatModel;

    public function __construct(){
        $this->agendaRapatModel = new AgendaRapatModel;
    }

    public function showView() {

        $data   = AgendaRapatModel::all();
        $number = 1;

        return view('pages.admin.agenda.agenda', compact('data','number'));
    }

    public function detailView($id) {

        $data = $this->agendaRapatModel->getWithId($id)->first();
        $date = \Carbon\Carbon::parse($data->jadwal_rapat);

        $data->jadwal_rapat = $date->day." ".$date->monthName." ".$date->year;

        return view('pages.admin.agenda.detail.detail', compact('data'));
    }

    public function editView($id) {

        $data   = $this->agendaRapatModel->getWithId($id)->first();
        $surat  = SuratRapatModel::all();
        $pimpinan   = PimpinanRapatModel::all();
        $peserta    = $this->agendaRapatModel->getPesertaRapat($id)->toArray()[0]['peserta_rapat'];

        return view('pages.admin.agenda.edit.edit', compact('data', 'surat', 'pimpinan', 'peserta'));
    }

    public function insertView() {

        $surat      = SuratRapatModel::all();
        $pimpinan   = PimpinanRapatModel::all();

        return view('pages.admin.agenda.insert.insert', compact('surat', 'pimpinan'));
    }

    /**
     * Insert new Agenda into database
     *
     * masukkan agenda baru ke dalam database
     *
     * @param AgendaInsertRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function insert(AgendaInsertRequest $request){
        $perihal    = $request->perihal;
        $surat      = $request->surat;
        $pimpinan   = $request->pimpinan;
        $tanggal    = $request->tanggal;
        $waktu      = $request->waktu;
        $ruangan    = $request->ruangan;

        $saved      = $this->agendaRapatModel->saveAgendaRapat($perihal, $surat, $pimpinan, $tanggal, $waktu, $ruangan);
        if (!$saved) {
            return back()->with('error', 'Agenda gagal dibuat');
        }

        return redirect()->to('/admin/agenda')->with('success', 'Agenda berhasil dibuat');
    }

    public function delete(Request $request) {
        $id = $request->id;

        $deleted = $this->agendaRapatModel->deleteAgenda($id);
        if (!$deleted) {
            return response()->json(['Terjadi masalah saat menghapus agenda'], 500);
        }

        return response()->json(['Hapus agenda berhasil'], 200);
    }

    /**
     * Update Agenda
     *
     * @param AgendaUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AgendaUpdateRequest $request) {
        $id         = $request->id;
        $perihal    = $request->perihal;
        $surat      = $request->surat;
        $pimpinan   = $request->pimpinan;
        $tanggal    = $request->tanggal;
        $waktu      = $request->waktu;
        $ruangan    = $request->ruangan;

        $updated = $this->agendaRapatModel->updateAgendaRapat(
            $id, $perihal, $surat, $pimpinan, $tanggal, $waktu, $ruangan
        );

        if (!$updated) {
            return back()->with('error', 'Agenda gagal diubah');
        }

        return redirect()->to('/admin/agenda')->with('success', 'Agenda berhasil diubah');
    }
}
