<?php

namespace App\Http\Controllers;

use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Model\Access_admin;
Use App\Model\Menu;
class AdminController extends Controller
{

    public function profile(Request $request, $id){
        $admin = User::find($id);
        $menu = Menu::all();
        return view('admin_profile/index',['admin'=>$admin, 'menu'=>$menu]);
    }

    public function access(Request $request, $id){
        $menu = Menu::all();
        $array = [];
        foreach($menu as $loop){
            for($j=1; $j<=3; $j++){
                $test = 'check'.$loop->id.$j;
                $array[]=$request->$test;
            }
        }
        return $request->uid_menu;
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
