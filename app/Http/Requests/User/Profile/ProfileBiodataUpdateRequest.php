<?php

namespace App\Http\Requests\User\Profile;

use Illuminate\Foundation\Http\FormRequest;

class ProfileBiodataUpdateRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * @return array
     */
    public function messages() {
        return [
            'name.required'                 => 'Nama lengkap harus diisi',
            'name.min'                      => 'Panjang karakter nama lengkap minimal 6',
            'name.max'                      => 'Panjang karakter nama lengkap maksimal 60',

            'username.required'             => 'Username harus diisi',
            'username.min'                  => 'Panjang karakter username minimal 6',
            'username.max'                  => 'Panjang karakter username maksimal 35',

            'jabatan.required'              => 'Jabatan harus diisi',
            'jabatan.min'                   => 'Panjang karakter jabatan minimal 3',
            'jabatan.max'                   => 'Panjang karakter jabatan maksimal 255',

            'jenis_kelamin.required'        => 'Jenis kelamin harus diisi',
            'jenis_kelamin.in'              => 'Jenis kelamin harus antara laki - laki atau perempuan',

            'no_telepon.required'           => 'No telepon harus diisi',
            'no_telepon.min'                => 'Panjang no telepon minimal 7',
            'no_telepon.max'                => 'Panjang no telepon maksimal 17'
        ];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name'                  => 'required|string|min:6|max:60',
            'username'              => 'required|string|min:6|max:35',
            'jabatan'               => 'required|string|min:3|max:255',
            'jenis_kelamin'         => 'required|string|in:Laki - laki,Perempuan',
            'no_telepon'            => 'required|string|min:7|max:17'
        ];
    }
}
