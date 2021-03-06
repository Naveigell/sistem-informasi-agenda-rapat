<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Profile\ProfileBiodataUpdateRequest;
use App\Http\Requests\User\Profile\ProfilePasswordUpdateRequest;
use App\Models\User\ProfileModel;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller {
    private $profileModel;

    public function __construct(){
        $this->profileModel = new ProfileModel;
    }

    public function showView() {

        $profile = $this->profileModel->getWithId(session()->get('id'));

        return view('pages.user.profile.profile', compact('profile'));
    }

    public function updateBiodata(ProfileBiodataUpdateRequest $request) {

        $updated = $this->profileModel->updateBiodata(
            session()->get('id'), $request->name, $request->username, $request->jabatan, $request->jenis_kelamin, $request->no_telepon
        );

        if (!$updated) {
            return back()->with('biodata-error', 'Terjadi masalah saat mengubah biodata');
        }

        session()->put('username', $request->username);
        return back()->with('success', 'Biodata berhasil diubah');
    }

    public function updatePassword(ProfilePasswordUpdateRequest $request){

        $id = session()->get('id');

        // ambil password dari db
        $user = $this->profileModel->getPassword($id);

        // jika user tidak ditemukan, berarti ada masalah pada akun ini
        if ($user == null)
            return back()->with('password-error', 'Terjadi masalah pada akun ini');

        // cek jika password baru dan lama sama
        if (Hash::check($request->old1, $user->password)) {

            $updated = $this->profileModel->updatePassword($id, Hash::make($request->new));
            if (!$updated) {
                return back()->with('password-error', 'Terjadi masalah saat mengubah password');
            }

            return back()->with('success', 'Ubah password berhasil');
        }

        return back()->with('password-error', 'Password lama salah');
    }
}
