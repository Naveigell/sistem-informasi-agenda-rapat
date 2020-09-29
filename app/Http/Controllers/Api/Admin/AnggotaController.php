<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Anggota\AnggotaInsertRequest;
use App\Models\Admin\PimpinanRapatModel;

class AnggotaController extends Controller {

    private $pimpinanModel;

    public function __construct(){
        $this->pimpinanModel = new PimpinanRapatModel;
    }

    public function showView() {
        return view('pages.admin.anggota.anggota');
    }

    public function insertView(){
        return view('pages.admin.anggota.insert');
    }

    public function insert(AnggotaInsertRequest $request) {


    }
}
