<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * Class UserModel
 * @mixin Builder
 * @package App\Models
 */
class UserModel extends Model {
    protected $table = 'users';
    protected $primaryKey = 'id_user';

    /**
     * Function to retrieve id_user, role and password from
     * database, then validate the data on controller
     *
     * Fungsi untuk mengambil id_user, role dan password dari
     * database dan kemudian memvalidasinya di controller
     *
     * @param string $email
     * @param string $password
     * @return \App\Models\UserModel
     */
    public function login(string $email, string $password) {
        return $this->select(['id_user', 'username', 'role', 'password'])->where([
            'email'     => $email
        ]);
    }
}
