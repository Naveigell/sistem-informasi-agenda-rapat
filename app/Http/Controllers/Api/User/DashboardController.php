<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\User\AgendaRapatModel;
use Illuminate\Http\Request;

class DashboardController extends Controller {
    public function showView(){

        $agenda = (new AgendaRapatModel())->getAll(session()->get('id'))->count();

        return view('pages.user.dashboard.dashboard', compact('agenda'));
    }
}
