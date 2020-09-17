<?php

namespace App\Http\Controllers\Api\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuratController extends Controller{
    public function showView(){
        return view('pages.superadmin.surat.surat');
    }

    public function insertView(){
        return view('pages.superadmin.surat.insert.insert');
    }

    public function editView(){
        return view('pages.superadmin.surat.edit.edit');
    }

    public function detailView(){
        return view('pages.superadmin.surat.detail.detail');
    }
}
