<?php

namespace App\Http\Controllers\Api\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller {
    public function showView() {
        return view('pages.superadmin.profile.profile');
    }
}
