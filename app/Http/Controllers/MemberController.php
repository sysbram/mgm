<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function index(){
        $member = DB::table('member')->orderBy('uid')->get();

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
            'referral_code_parent'  => $request->referral_code_parent,
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
        $member_parent = DB::table('member')
                        ->where('uid',$uid)
                        ->where('status_hapus','N')
                        ->first();

        $link_back = DB::table('member')
                    ->where('referral_code',$member_parent->referral_code_parent)
                    ->where('status_hapus','N')
                    ->first();

        $member_child = DB::table('member')
                        ->where('referral_code_parent',$member_parent->referral_code)
                        ->where('status_hapus','N')
                        ->get();

        for ($i=0; $i<3; $i++){
            if(!empty($member_child[$i])){
                if (array_key_exists('referral_code',$member_child[$i])){
                    $member_grandchild[$i] = DB::table('member')
                                        ->where('referral_code_parent',$member_child[$i]->referral_code)
                                        ->where('status_hapus','N')
                                        ->get();
                }
                
            }
            else{
                $member_grandchild[$i] = [];
            }   
        }
        // for ($i=0; $i<=count($member_grandchild); $i++){
        //     if(count($member_grandchild[$i]) == 0){
        //         unset($member_grandchild[$i]);
        //     }
        // }
        // echo "<pre>";
        // // echo $member_parent->referral_code;

        // // echo "\n";
        // // print_r($member_child);
        // print_r($member_grandchild);
        // die;

        return view('member/profil',[
            'member_parent'     => $member_parent, 
            'member_child'      => $member_child,
            'member_grandchild' => $member_grandchild,
            'link_back'         => $link_back,          
        ]);
    }   
}
