<?php

namespace App\Http\Requests\SuperAdmin\Anggota\Pimpinan;

use Illuminate\Foundation\Http\FormRequest;

class PimpinanInsertRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    public function messages() {
        return [
            'nama.required'                         => 'Nama harus diisi',
            'nama.min'                              => 'Panjang nama minimal 6 karakter',
            'nama.max'                              => 'Panjang nama maksimal 255 karakter',

            'username.required'                     => 'Username harus diisi',
            'username.min'                          => 'Panjang username minimal 6 karakter',
            'username.max'                          => 'Panjang username maksimal 70 karakter',

            'jabatan.required'                      => 'Jabatan harus diisi',
            'jabatan.min'                           => 'Panjang jabatan minimal 6 karakter',
            'jabatan.max'                           => 'Panjang jabatan maksimal 255 karakter',

            'jenis_kelamin.required'                => 'Jenis kelamin harus diisi',
            'jenis_kelamin.min'                     => 'Panjang jenis kelamin minimal 6 karakter',
            'jenis_kelamin.max'                     => 'Panjang jenis kelamin maksimal 30 karakter',

            'telp.required'                         => 'Nomor telepon harus diisi',
            'telp.min'                              => 'Panjang nomor telepon minimal 7 karakter',
            'telp.max'                              => 'Panjang nomor telepon maksimal 17 karakter'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'nama'              => 'required|string|min:6|max:255',
            'username'          => 'required|string|min:6|max:30',
            'email'             => 'required|string|min:6|max:70',
            'jabatan'           => 'required|string|min:6|max:255',
            'jenis_kelamin'     => 'required|string|min:6|max:30',
            'telp'              => 'required|string|min:7|max:17'
        ];
    }
}
