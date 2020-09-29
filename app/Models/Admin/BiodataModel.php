<?php

namespace App\Models\Admin;

use App\Models\User\UserModel;
use Illuminate\Database\Eloquent\Model;

class BiodataModel extends Model {
    protected $table = 'biodata';
    protected $primaryKey = 'id_biodata';

    public function user(){
        return $this->belongsTo(UserModel::class, 'biodata_id_user', 'id_user');
    }
}
