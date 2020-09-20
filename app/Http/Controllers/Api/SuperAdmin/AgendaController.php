<?php

namespace App\Http\Controllers\Api\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Models\SuperAdmin\AgendaRapatModel;

class AgendaController extends Controller {
    public function showView() {

        $data   = AgendaRapatModel::all();
        $number = 1;

        Carbon::setLocale('id');

        return view('pages.superadmin.agenda.agenda', compact('data','number'));
    }

    public function detailView($id) {
        return view('pages.superadmin.agenda.detail.detail');
    }

    public function editView($id) {
        return view('pages.superadmin.agenda.edit.edit');
    }

    public function insertView() {
        return view('pages.superadmin.agenda.insert.insert');
    }
}
