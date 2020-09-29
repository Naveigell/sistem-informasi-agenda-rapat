<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;

/**
 * Class AdminsModel
 * @mixin Builder
 * @package App\Models\SuperAdmin
 */
class AdminsModel extends Model {
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $hidden = ['password'];

    public function updateRole($id, $role) {
        return $this->where('id_user', $id)->update([
            'role' => $role
        ]);
    }

    public function createAdmin($username, $email) {
        return $this->insert([
            'username'      => $username,
            'email'         => $email,
            'password'      => Hash::make('123456')
        ]);
    }

    public function deleteAdmin($id) {
        return $this->where('id_user', $id)->delete();
    }
}
