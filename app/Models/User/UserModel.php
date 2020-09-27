<?php

namespace App\Models\User;
use App\Models\SuperAdmin\BiodataModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;

/**
 * @mixin QueryBuilder
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
     * @return UserModel
     */
    public function login(string $email, string $password) {
        return $this->select(['id_user', 'username', 'role', 'password'])->where([
            'email'     => $email
        ]);
    }

    public function biodata(){
        return $this->hasOne(BiodataModel::class, 'biodata_id_user');
    }
}
