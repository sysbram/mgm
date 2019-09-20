<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $fillable = [
        'email',
        'password',
        'name',
        'last_login',
    ];
}
