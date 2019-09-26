<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LogBO extends Model
{
    protected $table = "users_log_activity";

    public function users(){
        return $this->hasOne('App\Model\User', 'id', 'id_users');
    }
}
