<?php

namespace App\Http\Requests\SuperAdmin\Arsip;

use Illuminate\Foundation\Http\FormRequest;

class ArsipUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function messages() {
        return [
            'agenda.required'           => 'Agenda tidak boleh kosong',
            'agenda.integer'            => 'Agenda harus berupa id angka',
            'agenda.min'                => 'Id agenda minimal 1',

            'hasil.required'            => 'Hasil rapat harus diisi',
            'hasil.min'                 => 'Panjang karakter hasil rapat minimal 3',

            'id.required'               => 'Id tidak boleh kosong',
            'id.integer'                => 'Id harus berupa angka',
            'id.min'                    => 'Id minimal bernilai 1'
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
            'id'                => 'required|integer|min:1',
            'agenda'            => 'required|integer|min:1',
            'hasil'             => 'required|string|min:3'
        ];
    }
}
