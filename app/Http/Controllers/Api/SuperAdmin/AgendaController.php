<?php

namespace App\Http\Controllers\Api\SuperAdmin;

use App\Http\Controllers\Controller;

use App\Http\Requests\SuperAdmin\Agenda\AgendaInsertRequest;
use App\Http\Requests\SuperAdmin\Agenda\AgendaUpdateRequest;

use App\Models\SuperAdmin\AgendaRapatModel;
use App\Models\SuperAdmin\PimpinanRapatModel;
use App\Models\SuperAdmin\SuratRapatModel;

class AgendaController extends Controller {

    private $agendaRapatModel;

    public function __construct(){
        $this->agendaRapatModel = new AgendaRapatModel;
    }

    public function showView() {

        $data   = AgendaRapatModel::all();
        $number = 1;

        return view('pages.superadmin.agenda.agenda', compact('data','number'));
    }

    public function detailView($id) {

        $data = $this->agendaRapatModel->getWithId($id)->first();
        $date = \Carbon\Carbon::parse($data->jadwal_rapat);

        $data->jadwal_rapat = $date->day." ".$date->monthName." ".$date->year;

        return view('pages.superadmin.agenda.detail.detail', compact('data'));
    }

    public function editView($id) {

        $data   = $this->agendaRapatModel->getWithId($id)->first();
        $surat  = SuratRapatModel::all();
        $pimpinan   = PimpinanRapatModel::all();

        return view('pages.superadmin.agenda.edit.edit', compact('data', 'surat', 'pimpinan'));
    }

    public function insertView() {

        $surat      = SuratRapatModel::all();
        $pimpinan   = PimpinanRapatModel::all();

        return view('pages.superadmin.agenda.insert.insert', compact('surat', 'pimpinan'));
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

        return redirect()->to('/superadmin/agenda')->with('success', 'Agenda berhasil dibuat');
    }

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

        return redirect()->to('/superadmin/agenda')->with('success', 'Agenda berhasil diubah');
    }
}
