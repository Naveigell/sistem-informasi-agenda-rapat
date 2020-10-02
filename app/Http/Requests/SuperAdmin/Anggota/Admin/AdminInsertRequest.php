<?php

namespace App\Http\Requests\SuperAdmin\Anggota\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminInsertRequest extends FormRequest {
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
            'username.required'             => 'Username harus diisi',
            'username.no_spaces'            => 'Dilarang menggunakan spasi dalam username',
            'username.min'                  => 'Panjang karakter username minimal 6',
            'username.max'                  => 'Panjang karakter username maksimal 35',

            'nip.required'                  => 'Nip harus diisi',
            'nip.min'                       => 'Panjang karakter nip minimal 6',
            'nip.max'                       => 'Panjang karakter nip maksimal 50'
        ];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'username'          => 'required|string|no_spaces|min:6|max:35',
            'nip'               => 'required|string|min:6|max:50'
        ];
    }
}
