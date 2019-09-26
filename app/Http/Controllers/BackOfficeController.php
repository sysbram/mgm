<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\User;

class BackOfficeController extends Controller
{
    public function index(){

        $admin = User::all();
        return view('back_office/index', ['admin' => $admin]);
    }

    // public function update(Request $request){
    //     DB::table('users')->where('id',$request->id)->update([
    //         'name'          => $request->name,
    //         'email'         => $request->email,
    //         'no_handphone'  => $request->no_handphone,
    //         'status_hapus'  => $request->status_hapus,
    //     ]);   

    //     return redirect('/back_office');
    // }

    // public function delete(Request $request){
    //     DB::table('users')->where('id',$request->id)->update([
    //         'status_hapus'  => 1,
    //     ]);
        
    //     return redirect('/back_office');
    // }

}
