<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\LogBO;
use App\Model\Users;

class LogBOController extends Controller
{
    public function index(){
        $log_bo = LogBO::
        join('users', 'users.id', 'users_log_activity.id_users')
        ->join('member', 'member.uid', 'users_log_activity.uid_member')
        ->select('users_log_activity.waktu_proses',
                'users_log_activity.route',
                'users.name',
                'member.nama'
        )->get();      

        return view('/log_bo/index',['log_bo' => $log_bo]);
    }
}
