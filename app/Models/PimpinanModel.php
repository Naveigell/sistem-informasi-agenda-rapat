<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * Class PimpinanModel
 * @mixin Builder
 * @package App\Models
 */
class PimpinanModel extends Model {
    protected $table = 'pimpinan_rapat';
    protected $primaryKey = 'id_pimpinan_rapat';

    public function login(string $nip, string $password) {
        return $this->select(['id_pimpinan_rapat', 'username', 'password'])->where([
            'nip'     => $nip
        ]);
    }
}
