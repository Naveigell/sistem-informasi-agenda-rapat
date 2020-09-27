<?php

namespace App\Http\Controllers\Api\SuperAdmin\Anggota;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdmin\Anggota\Admin\AdminInsertRequest;
use App\Http\Requests\SuperAdmin\Anggota\Admin\AdminUpdateRequest;
use App\Models\SuperAdmin\AdminsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminsController extends Controller {

    private $adminModel;

    public function __construct(){
        $this->adminModel = new AdminsModel();
    }

    public function showView(){
        $admins = AdminsModel::where('id_user', '!=', session()->get('id'))->get();
        $number = 1;

        return view('pages.superadmin.anggota.admin.admin', compact('admins', 'number'));
    }

    public function editView($id){

        $admin = AdminsModel::where('id_user', $id)->get()->toArray()[0];

        if ($admin == null)
            return back();

        return view('pages.superadmin.anggota.admin.edit.edit', compact('admin'));
    }

    public function update(AdminUpdateRequest $request) {
        $id = $request->id;
        $role = $request->wewenang;

        $updated = $this->adminModel->updateRole($id, $role);
        if (!$updated) {
            return back()->with('error', 'Terjadi masalah saat mengupdate data');
        }

        return redirect()->to('/superadmin/anggota/admin')->with('success', 'Data berhasil diubah');
    }

    public function insert(AdminInsertRequest $request){
        $saved = $this->adminModel->createAdmin($request->username, $request->email);
        if (!$saved) {
            return back()->with('error', 'Terjadi masalah saat menambah admin');
        }
        return redirect()->to('/superadmin/anggota/admin')->with('success', 'Data berhasil ditambahkan');
    }

    public function delete(Request $request){
        $id = $request->id;

        $deleted = $this->adminModel->deleteAdmin($id);
        if (!$deleted) {
            return $this->json('message', 'Terjadi kesalahan saat menghapus data', 500);
        }
        return $this->json('message', 'Hapus admin berhasil', 200);
    }

    public function insertView(){
        return view('pages.superadmin.anggota.admin.insert.insert');
    }

    private function json($key, $value, $code) {
        return response()->json([
            $key => [$value]
        ], $code);
    }
}
