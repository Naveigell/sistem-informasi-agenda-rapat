<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminsModel;
use App\Models\Admin\AgendaRapatModel;
use App\Models\Admin\PimpinanRapatModel;
use App\Models\Admin\SuratRapatModel;

class DashboardController extends Controller {

    private $suratModel;

    public function __construct(){
        $this->suratModel = new SuratRapatModel;
    }

    public function showView(){
        $surat = SuratRapatModel::count();
        $agenda = AgendaRapatModel::count();
        $pimpinan = PimpinanRapatModel::count();
        $admin = AdminsModel::count();

        return view('pages.admin.dashboard.dashboard', compact('surat', 'agenda', 'pimpinan', 'admin'));
    }
}
