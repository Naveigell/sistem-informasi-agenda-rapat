<?php

namespace App\Http\Controllers\Api\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User\UserModel;

use App\Http\Requests\SuperAdmin\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function login(LoginRequest $request){

        $email      = $request->email;
        $password   = $request->password;

        $model = new UserModel;
        $user = $model->login($email, $password);

        if ($user->exists()) {
            $user = $user->first();

            if (Hash::check($password, $user->password)) {
                // Store the data to Session after validating password
                //
                // Simpan data kedalam Session setelah memvalidasi password

                Auth::guard('user')->store($user->id_user, $user->role);
                return redirect($user->role.'/agenda');
            }

            return $this->back('password', 'Password salah');
        }

        return $this->back('email', 'Pengguna tidak ditemukan');
    }
}
