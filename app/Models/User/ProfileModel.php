<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * Class ProfileModel
 * @mixin Builder
 * @package App\Models\User
 */
class ProfileModel extends Model {
    protected $table = 'pimpinan_rapat';
    protected $primaryKey = 'id_pimpinan_rapat';

    public function getWithId($id) {
        return $this->select(['id_pimpinan_rapat', 'nama_pimpinan', 'username', 'email', 'jabatan', 'jenis_kelamin', 'no_telepon'])->where([
            'id_pimpinan_rapat' => $id
        ])->first();
    }

    public function updateBiodata($id, $name, $username, $email, $jabatan, $jenis_kelamin, $no_telp){
        return $this->where([
            'id_pimpinan_rapat'         => $id
        ])->update([
            'nama_pimpinan'             => $name,
            'username'                  => $username,
            'email'                     => $email,
            'jabatan'                   => $jabatan,
            'jenis_kelamin'             => $jenis_kelamin,
            'no_telepon'                => $no_telp
        ]);
    }

    public function getPassword($id) {
        return $this->where([
            'id_pimpinan_rapat'   => $id
        ])->first();
    }

    public function updatePassword($id, $password) {
        return $this->where([
            'id_pimpinan_rapat'   => $id
        ])->update([
            'password'  => $password
        ]);
    }
}
