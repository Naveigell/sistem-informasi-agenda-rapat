<?php

namespace App\Http\Requests\SuperAdmin\Peserta;

use Illuminate\Foundation\Http\FormRequest;

class PesertaUpdateRequest extends FormRequest {
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
            'nama.required'             => 'Nama harus diisi',
            'nama.min'                  => 'Panjang nama minimal 6',
            'nama.max'                  => 'Panjang nama maksimal 30',

            'jabatan.required'          => 'Jabatan harus diisi',
            'jabatan.min'               => 'Panjang jabatan minimal 3',
            'jabatan.max'               => 'Panjang jabatan maksimal 30',

            'jenis_kelamin.required'    => 'Jenis kelamin harus diisi',
            'jenis_kelamin.in'          => 'Jenis kelamin harus antara laki laki atau perempuan'
        ];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'nama'          => 'required|string|min:6|max:30',
            'jabatan'       => 'required|string|min:3|max:30',
            'jenis_kelamin' => 'required|string|in:Laki - laki,Perempuan'
        ];
    }
}
