<?php

namespace App\Http\Requests\Admin\Anggota\Admin;

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

            'email.required'                => 'Email harus diisi',
            'email.email'                   => 'Format email salah',
            'email.min'                     => 'Panjang karakter email minimal 6',
            'email.max'                     => 'Panjang karakter email maksimal 50'
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
            'email'             => 'required|string|email|min:6|max:50'
        ];
    }
}
