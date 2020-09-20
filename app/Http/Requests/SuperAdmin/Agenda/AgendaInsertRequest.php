<?php

namespace App\Http\Requests\SuperAdmin\Agenda;

use Illuminate\Foundation\Http\FormRequest;

class AgendaInsertRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Validation error messages
     *
     * Pesan error dari validasi
     *
     * @return array
     */
    public function messages() {
        return [
            'perihal.required'                  => 'Perihal harus diisi',
            'perihal.max'                       => 'Panjang karakter perihal maksimal 40',
            'perihal.min'                       => 'Panjang karakter perihal minimal 10',

            'surat.required'                    => 'Surat harus dipilih',
            'surat.min'                         => 'Panjang surat minimal 5',

            'pimpinan.required'                 => 'Pimpinan rapat harus dipilih',
            'pimpinan.integer'                  => 'Pimpinan harus berupa angka id',
            'pimpinan.min'                      => 'Pimpinan id minimal 1',

            'tanggal.required'                  => 'Tanggal harus diisi',
            'tanggal.date'                      => 'Tanggal harus berupa date format',
            'tanggal.after'                     => 'Tanggal minimal yang dipilih adalah setelah dua hari',

            'waktu.required'                    => 'Waktu harus diisi',
            'waktu.date'                        => 'Waktu harus berupa format tanggal',
            'waktu.date_format'                 => 'Format waktu harus berupa jam',

            'ruangan.required'                  => 'Ruangan rapat harus diisi',
            'ruangan.min'                       => 'Panjang karakter ruangan minimal 6',
            'ruangan.max'                       => 'Panjang karakter ruangan maksimal 255'
        ];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'perihal'           => 'required|string|max:40|min:10',
            'surat'             => 'required|string|min:5',
            'pimpinan'          => 'required|integer|min:1',
            'tanggal'           => 'required|date|after:tomorrow',
            'waktu'             => 'required|date_format:H:i',
            'ruangan'           => 'required|string|min:6|max:255'
        ];
    }
}
