<?php

namespace App\Http\Controllers\Api\Admin\Anggota;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Anggota\Admin\AdminInsertRequest;
use App\Http\Requests\Admin\Anggota\Admin\AdminUpdateRequest;
use App\Models\Admin\AdminsModel;
use Illuminate\Http\Request;

class AdminsController extends Controller {

    private $adminModel;

    public function __construct(){
        $this->adminModel = new AdminsModel();
    }

    public function showView(){
        $admins = AdminsModel::where('id_user', '!=', session()->get('id'))->get();
        $number = 1;

        return view('pages.admin.anggota.admin.admin', compact('admins', 'number'));
    }

    public function editView($id){

        $admin = AdminsModel::where('id_user', $id)->get()->toArray()[0];

        if ($admin == null)
            return back();

        return view('pages.admin.anggota.admin.edit.edit', compact('admin'));
    }

    public function update(AdminUpdateRequest $request) {
        $id = $request->id;
        $role = $request->wewenang;

        $updated = $this->adminModel->updateRole($id, $role);
        if (!$updated) {
            return back()->with('error', 'Terjadi masalah saat mengupdate data');
        }

        return redirect()->to('/admin/anggota/admin')->with('success', 'Data berhasil diubah');
    }

    public function insertView(){
        return view('pages.admin.anggota.admin.insert.insert');
    }

    private function json($key, $value, $code) {
        return response()->json([
            $key => [$value]
        ], $code);
    }
}
