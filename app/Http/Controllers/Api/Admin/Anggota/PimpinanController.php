<?php

namespace App\Http\Controllers\Api\Admin\Anggota;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Anggota\Pimpinan\PimpinanInsertRequest;
use App\Http\Requests\Admin\Anggota\Pimpinan\PimpinanUpdateRequest;
use App\Models\Admin\PimpinanRapatModel;
use Illuminate\Http\Request;

class PimpinanController extends Controller {

    private $pimpinanRapatModel;

    public function __construct(){
        $this->pimpinanRapatModel = new PimpinanRapatModel;
    }

    public function showView() {

        $pimpinan = PimpinanRapatModel::all();
        $number = 1;

        return view('pages.admin.anggota.pimpinan.pimpinan', compact('pimpinan', 'number'));
    }

    public function detailView($id){

        $pimpinan = $this->pimpinanRapatModel->getWithId($id)->first();

        if ($pimpinan == null) return back();

        return view('pages.admin.anggota.pimpinan.detail.detail', compact('pimpinan'));
    }
}
