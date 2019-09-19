<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function index(){
        $member = DB::table('member')->get();

        return view('member/index',['member' => $member]);
    }

    public function edit($uid){
        $member = DB::table('member')->where('uid',$uid)->first();
        
        return view('member/edit',['member' => $member]);
    }

    public function update(Request $request){
        DB::table('member')->where('uid',$request->uid)->update([
            'nik'           => $request->nik,
            'nama'          => $request->nama,
            'email'         => $request->email,
            'no_handphone'  => $request->no_handphone,
            'status_hapus'  => $request->status_hapus,
        ]);

        

        return redirect('/member');
    }

    public function delete(Request $request){
        DB::table('member')->where('uid',$request->uid)->update([
            'status_hapus'  => 1,
        ]);
            // echo "ad";
        return redirect('/member');
    }

    public function profil($uid){
        $member = DB::table('member')->where('uid',$uid)->first();
        
        return view('member/profil',['member' => $member]);
    }   
}
