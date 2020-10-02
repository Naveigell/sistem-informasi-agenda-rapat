<?php

namespace App\Http\Controllers\Api\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\SuperAdmin\SuratRapatModel;
use App\Models\SuperAdmin\AgendaRapatModel;
use App\Models\SuperAdmin\PimpinanRapatModel;
use App\Models\SuperAdmin\AdminsModel;
use Illuminate\Http\Request;

class DashboardController extends Controller {
    public function showView(){
        $surat = SuratRapatModel::count();
        $agenda = AgendaRapatModel::count();
        $pimpinan = PimpinanRapatModel::count();
        $admin = AdminsModel::count();

        return view('pages.superadmin.dashboard.dashboard', compact('surat', 'agenda', 'pimpinan', 'admin'));
    }
}
