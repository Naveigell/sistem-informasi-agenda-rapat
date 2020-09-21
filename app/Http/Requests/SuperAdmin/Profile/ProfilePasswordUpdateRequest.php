<?php

namespace App\Http\Requests\SuperAdmin\Profile;

use Illuminate\Foundation\Http\FormRequest;

class ProfilePasswordUpdateRequest extends FormRequest {
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
            'new.required'          => 'Password baru harus diisi',
            'new.min'               => 'Panjang karakter password baru minimal 6',
            'new.max'               => 'Panjang karakter password baru maksimal 100',

            'old1.required'         => 'Password lama yang pertama harus diisi',
            'old1.min'              => 'Panjang karakter password lama yang pertama minimal 6',
            'old1.max'              => 'Panjang karakter password lama yang pertama maksimal 100',

            'old2.required'         => 'Password lama yang kedua harus diisi',
            'old2.min'              => 'Panjang karakter password lama yang kedua minimal 6',
            'old2.max'              => 'Panjang karakter password lama yang kedua maksimal 100',
            'old2.same'             => 'Password lama pertama dan kedua harus sama',
        ];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'new'       => 'required|string|min:6|max:100',
            'old1'      => 'required|string|min:6|max:100',
            'old2'      => 'required|string|min:6|max:100|same:old1'
        ];
    }
}
