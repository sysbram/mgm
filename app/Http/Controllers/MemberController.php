<?php

namespace App\Http\Controllers;

use App\Model\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Spatie\Activitylog\Models\Activity;
use App\Model\Access_admin;
use App\Model\Member_verify;

class MemberController extends Controller
{
    public function index(){
        $member = member::orderBy('uid')->paginate(10);
        $access = Access_admin::where('user_id',Auth::user()->id)->where('menu_id',3)->get();
        return view('member/index',['member' => $member, 'access' => $access]);
    }

    public function edit($uid){
        $member = DB::table('member')->where('uid',$uid)->first();
        
        return view('member/edit',['member' => $member]);
    }

    public function update(Request $request, $uid){
        DB::table('member')->where('uid',$request->uid)->update([
            'nik'           => $request->nik,
            'nama'          => $request->nama,
            'email'         => $request->email,
            'no_handphone'  => $request->no_handphone,
            'status_hapus'  => $request->status_hapus,
        ]);

        $mytime = Carbon::now('Asia/Jakarta');

        $nama_member = DB::table('member')->where('uid', $uid)->first();

        DB::table('users_log_activity')->insert([
            'id_users'      => Auth::user()->id,
            'uid_member'    => $uid,
            'waktu_proses'  => $mytime->toDateTimeString(),
            'route'         => 'Update',
        ]);
        return redirect('/member')->with('updated_success', 'Member '.$request->nama.' has been Updated');
    }

    public function delete(Request $request, $uid){
        DB::table('member')->where('uid',$request->uid)->update([
            'status_hapus'  => 1,
        ]);

        $member_data = DB::table('member')->where('uid',$uid)->first();
        
        $mytime = Carbon::now('Asia/Jakarta');

        DB::table('users_log_activity')->insert([
            'id_users'      => Auth::user()->id,
            'uid_member'    => $uid,
            'waktu_proses'  => $mytime->toDateTimeString(),
            'route'         => 'Delete',
        ]);
        return redirect('/member')->with('deleted_success', 'Member '.$member_data->nama.' has been Deleted');
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

        return view('member/profil',[
            'member_parent'     => $member_parent, 
            'member_child'      => $member_child,
            'member_grandchild' => $member_grandchild,
            'link_back'         => $link_back,          
        ]);
    }
    
    public function review(Request $request, $uid){
        $member = Member::where('uid', $uid)->get();
        $member_uid = $member[0]['uid'];
        $verify = Member_verify::where('member_uid', $member_uid)->get();
        return view('member/review', ['member'=>$member, 'verify' => $verify]);
    }

    public function decline(Request $request, $id){
        $verify = Member_verify::find($id);
        $verify->verify_info = $request->verify_info;
        $verify->save();
        return 'success decline';
    }
}
