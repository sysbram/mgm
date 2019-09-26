<?php

namespace App\Model;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = "member";

    // protected $fillable = ['nik', 'nama', 'email', 'status_hapus', 'no_handphone'];
}
