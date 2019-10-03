<?php

namespace App\Http\Controllers;

use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Filesystem\Filesystem;
use App\User;
use App\Model\Access_admin;
Use App\Model\Menu;
use App\Model\LogBO;
class AdminController extends Controller
{

    public function profile(Request $request, $id){
        $admin = User::find($id);
        $menu  = Menu::all();
        $allow = Access_admin::where('user_id',Auth::user()->id)->get();
        $access = [];
        $activities = [];
        $log_bo = LogBO::
        join('users', 'users.id', 'users_log_activity.id_users')
        ->join('member', 'member.uid', 'users_log_activity.uid_member')
        ->select('users_log_activity.waktu_proses',
                'users_log_activity.route',
                'users_log_activity.id',
                'users_log_activity.id_users',
                'users.name',
                'member.nama'
        )->paginate(10);  
        
        for($i=0; $i<count($log_bo); $i++){
            if($admin->id == $log_bo[$i]['id_users']){
                $activities[] = $log_bo[$i];
            }
        }
        
        for($i=0; $i<count($menu); $i++){
            $access[] = Access_admin::where('user_id',$admin->id)->where('menu_id',$menu[$i]['id'])->get();
        }
        return view('admin_profile/index',['admin'=>$admin, 'menu'=>$menu, 'access'=>$access, 'activities'=>$activities, 'allow'=>$allow]);

    }
    

    

    public function postRegister(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'no_hp' => 'required',
            'status_admin' => 'required',
        ]);
        
        User::Create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'no_hp' => $request->no_hp,
            'status_admin' => $request->status_admin
        ]);
        
        $menu = Menu::all();
        foreach($menu as $loop){
            Access_admin::create([
                'user_id' => User::max('id'),
                'menu_id' => $loop->id,
            ]);
        }
        

        return redirect('/dashboard')->with('success',$request->name . ' successfuly added');
    }

    public function delete(Request $request, $id){
        
        $user = User::find($id);
        $path = 'Images/admin/'.$user->uid ;
        if (\File::exists($path)) \File::deleteDirectory($path);

        User::find($id)->delete();
        if(Access_admin::where('user_id',$id)->get()){
            DB::table('access_admins')->where('user_id',$id)->delete();
            return redirect('/dashboard')->with('success','Data removed success');
        }
    }
}
