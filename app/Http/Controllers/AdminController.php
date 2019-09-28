<?php

namespace App\Http\Controllers;

use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Model\Access_admin;
Use App\Model\Menu;
class AdminController extends Controller
{

    public function profile(Request $request, $id){
        $admin = User::find($id);
        $menu  = Menu::all();

        $menus = Menu::
                join('access_admins', 'access_admins.menu_id', 'menus.id')
                ->get();

        if (count($menus) == count($menu)){
            $menu = Menu::
                join('access_admins', 'access_admins.menu_id', 'menus.id')
                ->get();
            return view('admin_profile/index',['admin'=>$admin, 'menu'=>$menu]);
        }
        else {
            return view('admin_profile/index',['admin'=>$admin, 'menu'=>$menu]);
        }
    }

    public function access(Request $request, $id){
        
        $access_admin   = DB::table('access_admins')->where('user_id',$id)->get();
        $menu1          = Menu::all();
        $menu2          = Menu::
                        join('access_admins', 'access_admins.menu_id', 'menus.id')
                        ->get();

        if (count($access_admin) == null)  {
            for ($i=0; $i<count($menu); $i++){
                    $read   = 'read'.$menu[$i]['id'];
                    $edit   = 'edit'.$menu[$i]['id'];
                    $delete = 'delete'.$menu[$i]['id'];
                DB::table('access_admins')->insert([
                    'user_id'       => $id,
                    'menu_id'       => $i+1,                    
                    'read'          => $request->$read,
                    'edit'          => $request->$edit,
                    'delete'        => $request->$delete,

                ]);
            }
        }
        else{
            for ($i=0; $i<count($menu2); $i++){
                    $read   = 'read'.$menu2[$i]['id'];
                    $edit   = 'edit'.$menu2[$i]['id'];
                    $delete = 'delete'.$menu2[$i]['id'];

                DB::table('access_admins')->where('menu_id',$i+1)->update([
                    'user_id'       => $id,
                    'menu_id'       => $i+1,                    
                    'read'          => $request->$read,
                    'edit'          => $request->$edit,
                    'delete'        => $request->$delete,

                ]);
            }
        }

        // return view('/back_office');
    }
    

    

    public function postRegister(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        
        User::Create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'no_hp' => $request->phone_number,
            'occupation' => $request->occupation
        ]);
        return redirect('/back_office')->with('success',$request->name . ' successfuly added');
    }

    public function delete(Request $request, $id){
        User::find($id)->delete();
        return redirect('/back_office')->with('success','Data removed success');
    }
}
