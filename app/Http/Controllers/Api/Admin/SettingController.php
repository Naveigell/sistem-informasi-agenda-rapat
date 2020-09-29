<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;

class SettingController extends Controller {
    public function showView(){
        return view('pages.admin.setting.setting');
    }
}
