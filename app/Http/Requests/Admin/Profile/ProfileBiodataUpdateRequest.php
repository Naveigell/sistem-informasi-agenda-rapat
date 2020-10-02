<?php

namespace App\Http\Requests\Admin\Profile;

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
            'username.required'             => 'Username harus diisi',
            'username.min'                  => 'Panjang karakter username minimal 6',
            'username.max'                  => 'Panjang karakter username maksimal 35'
        ];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'username'              => 'required|string|min:6|max:35'
        ];
    }
}
