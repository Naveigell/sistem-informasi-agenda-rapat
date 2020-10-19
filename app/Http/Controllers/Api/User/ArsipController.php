<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Arsip\ArsipInsertRequest;
use App\Http\Requests\User\Arsip\ArsipUpdateRequest;
use App\Models\User\AgendaRapatModel;
use App\Models\User\ArsipModel;
use Illuminate\Http\Request;

class ArsipController extends Controller {

    private $arsipModel;

    public function __construct(){
        $this->arsipModel = new ArsipModel();
    }

    public function showView(){

        $arsip = $this->arsipModel->getAll();
        $number = 1;

        return view('pages.user.arsip.arsip', compact('arsip', 'number'));
    }

    public function detailView($id) {

        $arsip = $this->arsipModel->getWithId($id)->first();

        return view('pages.user.arsip.detail.detail', compact('arsip'));
    }
}
