<?php

namespace App\Http\Controllers\Api\SuperAdmin;

use App\Http\Controllers\Controller;

class SettingController extends Controller {
    public function showView(){
        return view('pages.superadmin.setting.setting');
    }
}
