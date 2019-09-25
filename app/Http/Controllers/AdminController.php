<?php

namespace App\Http\Controllers;

use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class AdminController extends Controller
{

    public function profile(Request $request, $id){
        $admin = User::find($id);
        return view('admin_profile/index',['admin'=>$admin]);
    }

    public function edit(Request $request, $id){
        $admin = User::find($id);
        $admin->name = $request->name;
        $admin->no_hp = $request->no_hp;
        $admin->description = $request->description;
        $admin->occupation = $request->occupation;
        $admin->save();
        return redirect('/'.$id.'/profile')->with('success',$admin->name . ' is edited');
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
