<?php

namespace App\Http\Controllers\Api\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgendaController extends Controller {
    public function showView() {
        return view('pages.superadmin.agenda.agenda');
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
