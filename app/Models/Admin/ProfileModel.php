<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProfileModel
 * @mixin QueryBuilder
 * @package App\Models\SuperAdmin
 */
class ProfileModel extends Model {
    protected $table = 'users';
    protected $primaryKey = 'id_user';

    public function getWithId($id) {
        return $this->select(['id_user', 'username', 'email', 'role'])->where([
            'id_user' => $id
        ])->first();
    }

    public function updateBiodata($id, $username, $email){
        return $this->where([
            'id_user'       => $id
        ])->update([
            'username'      => $username,
            'email'         => $email
        ]);
    }

    public function getPassword($id) {
        return $this->where([
            'id_user'   => $id
        ])->first();
    }

    public function updatePassword($id, $password) {
        return $this->where([
            'id_user'   => $id
        ])->update([
            'password'  => $password
        ]);
    }
}
