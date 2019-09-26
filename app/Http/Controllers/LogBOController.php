<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\LogBO;
use App\Model\Users;

class LogBOController extends Controller
{
    public function index(){
        $log_bo = DB::table('users_log_activity')
        ->join('users', 'users.id', 'users_log_activity.id_users')
        ->get();
        // $log_bo = DB::table('users_log_activity')->join('user', 'users.id', '=', 'users_log_activity.id_users');

        $log_bo2 = LogBO::all();
        $asd = Users::find($log_bo2[0]['id_users']);
        
        // echo "<pre>";
        // print_r($log_bo);die;        

        return view('/log_bo/index',['log_bo' => $log_bo]);
    }
}
