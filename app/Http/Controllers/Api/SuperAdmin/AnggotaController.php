<?php

namespace App\Http\Controllers\Api\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnggotaController extends Controller {
    public function showView() {
        return view('pages.superadmin.anggota.anggota');
    }

    public function insertView(){
        return view('pages.superadmin.anggota.insert.insert');
    }

    public function editView($id) {
        return view('pages.superadmin.anggota.edit.edit');
    }

    public function detailView($id){
        return view('pages.superadmin.anggota.detail.detail');
    }
}
