<?php

namespace App\Http\Requests\SuperAdmin\Surat;

use Illuminate\Foundation\Http\FormRequest;

class SuratUpdateRequest extends FormRequest {
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
            'nomor.required'                    => 'Nomor surat harus diisi',
            'nomor.min'                         => 'Panjang karakter nomor surat minimal 6',
            'nomor.max'                         => 'Panjang karakter nomor surat maksimal 255',

            'perihal.required'                  => 'Perihal harus diisi',
            'perihal.min'                       => 'Panjang karakter perihal minimal 6',
            'perihal.max'                       => 'Panjang karakter perihal maksimal 120',

            'tujuan.required'                   => 'Tujuan harus diisi',
            'tujuan.min'                        => 'Panjang karakter tujuan minimal 6',
            'tujuan.max'                        => 'Panjang karakter tujuan maksimal 120',

            'jabatan.required'                  => 'Jabatan harus diisi',
            'jabatan.min'                       => 'Panjang karakter jabatan minimal 6',
            'jabatan.max'                       => 'Panjang karakter jabatan maksimal 70',

            'pengirim.required'                 => 'Pengirim harus diisi',
            'pengirim.min'                      => 'Panjang karakter pengirim minimal 6',
            'pengirim.max'                      => 'Panjang karakter pengirim maksimal 70',

            'tanggal.required'                  => 'Tanggal harus diisi',
            'tanggal.date'                      => 'Format tanggal salah',
            'tanggal.min'                       => 'Panjang karakter tanggal minimal 6'
        ];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'nomor'             => 'required|string|min:6|max:255',
            'perihal'           => 'required|string|min:6|max:120',
            'tujuan'            => 'required|string|min:6|max:120',
            'jabatan'           => 'required|string|min:6|max:70',
            'pengirim'          => 'required|string|min:6|max:70',
            'tanggal'           => 'required|date|string|min:6|max:120',
            'isi'               => 'required|string|min:6'
        ];
    }
}
