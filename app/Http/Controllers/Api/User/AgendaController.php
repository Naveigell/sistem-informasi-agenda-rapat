<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\User\AgendaRapatModel;
use Illuminate\Http\Request;

class AgendaController extends Controller {

    private $agendaRapat;

    public function __construct(){
        $this->agendaRapat = new AgendaRapatModel;
    }

    public function showView(){
        $data = $this->agendaRapat->getAll(session()->get('id'));
        $number = 1;

        return view('pages.user.agenda.agenda', compact('data', 'number'));
    }

    public function detailView($id) {

        $data = $this->agendaRapat->getWithId($id)->first();
        $date = \Carbon\Carbon::parse($data->jadwal_rapat);

        $data->pimpinan = $data->pimpinan->toArray();
        $data->surat = $data->surat->toArray();

        $data->jadwal_rapat = $date->day." ".$date->monthName." ".$date->year;

        return view('pages.user.agenda.detail.detail', compact('data'));
    }
}
