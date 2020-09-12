<?php

namespace App\Http\Controllers\Api\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgendaController extends Controller {
    public function index() {
        return view('pages.superadmin.agenda.agenda');
    }

    public function detail($id) {
        return view('pages.superadmin.agenda.detail.detail');
    }
}
