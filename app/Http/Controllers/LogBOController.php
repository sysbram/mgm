<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\LogBO;
use App\User;
use App\Model\Access_admin;
Use App\Model\Menu;

class LogBOController extends Controller
{
    public function index(){
        $allow = Access_admin::where('user_id',Auth::user()->id)->get();
        $log_bo = LogBO::
        join('users', 'users.id', 'users_log_activity.id_users')
        ->join('member', 'member.uid', 'users_log_activity.uid_member')
        ->select('users_log_activity.waktu_proses',
                'users_log_activity.route',
                'users_log_activity.id',
                'users.name',
                'member.nama'
        )->paginate(2);      

        return view('/log_bo/index',['log_bo' => $log_bo, 'allow'=>$allow]);
    }
}
