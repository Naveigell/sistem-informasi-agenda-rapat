<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
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
            'email.required'            => 'Email tidak boleh kosong',
            'email.min'                 => 'Panjang email minimal 6 karakter',

            'password.required'         => 'Password tidak boleh kosong',
            'password.min'              => 'Panjang password minimal 6 karakter'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {

        return [
            'email'     => 'required|string|min:6',
            'password'  => 'required|string|min:6'
        ];
    }
}
