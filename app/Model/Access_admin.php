<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Access_admin extends Model
{
    protected $fillable = ['user_id','menu_id','read','edit','delete'];
}
