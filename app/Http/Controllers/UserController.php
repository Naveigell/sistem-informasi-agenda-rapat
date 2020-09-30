<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\PimpinanModel;
use App\Models\UserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * This Controller organize all user needs, like login and logout
 *
 * Controller ini mengatur semua kebutuhan user seperti login dan logout
 *
 * @package App\Http\Controllers
 */
class UserController extends Controller {
    /**
     * Function to get back into previous url, followed by with errors
     * and with input
     *
     * Fungsi untuk kembali ke url sebelumnya, yang diikuti oleh
     * with errors dan with input
     *
     * @param string $key
     * @param string $value
     * @return \Illuminate\Http\RedirectResponse
     */
    private function back(string $key, string $value) {
        return back()->withErrors([
            $key => $value
        ])->withInput(request()->only('email'));
    }

    /**
     * Logout function
     *
     * Fungsi logout
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout() {
        if (Auth::guard('user')->destroy()) {
            return redirect()->to('/login');
        }
    }

    /**
     * Login function
     *
     * Fungsi login
     *
     * @param LoginRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login(LoginRequest $request){

        $nip        = $request->nip;
        $password   = $request->password;

        $model = null;
        if ($request->pimpinan == null) {
            $model = new UserModel;
        }
        else {
            $model = new PimpinanModel;
        }
        $user = $model->login($nip, $password);

        if ($user->exists()) {
            $user = $user->first();

            if (Hash::check($password, $user->password)) {
                // Store the data to Session after validating password
                //
                // Simpan data kedalam Session setelah memvalidasi password

                $id = $user->id_user == null ? $user->id_pimpinan_rapat : $user->id_user;
                $role = $request->pimpinan == null ? $user->role : 'user';

                Auth::guard('user')->store($id, $user->username, $role);
                return redirect($role.'/agenda');
            }

            return $this->back('password', 'Password salah');
        }

        return $this->back('nip', 'Pengguna tidak ditemukan');
    }
}
