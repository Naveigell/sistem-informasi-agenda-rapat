<?php

namespace App\Http\Requests\Admin\Anggota\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateRequest extends FormRequest {
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
            'wewenang.required'             => 'Wewenang harus diisi',
            'wewenang.in'                   => 'Wewenang harus antara superadmin dan admin'
        ];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'wewenang'      => 'required|string|in:superadmin,admin'
        ];
    }
}
