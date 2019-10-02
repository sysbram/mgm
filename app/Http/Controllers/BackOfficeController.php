<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use \App\User;
use \App\Model\Access_admin;
use \App\Model\Menu;
use App\Model\Member;

class BackOfficeController extends Controller
{
    public function index(){

        $member = Member::whereRaw('id_status <= 15')->get();
        return view('back_office/index', compact('member'));
    }

}
