<?php

namespace App\Http\Controllers;

use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class AdminEditController extends Controller
{

    public function profileLoad(Request $request, $id){
        $admin = User::find($id);
        return view('part_page/adminProfile',['admin'=> $admin]);
    }
    public function profileEditLoad(Request $request, $id){
        $admin = User::find($id);
        return view('part_page/adminProfileEdit',['admin'=> $admin]);
    }

    public function edit(Request $request, $id){
        $admin = User::find($id);
        if($request->hasFile('file')){
            $request->file('file')->move('Images/admin/'.$admin->uid,$request->file('file')->getClientOriginalName());
            $admin->foto = $request->file('file')->getClientOriginalName();
            $admin->name = $request->name;
            $admin->description = $request->description;
            $admin->status_admin = $request->status_admin;
            $admin->save();
        }else{
            $admin->name = $request->name;
            $admin->description = $request->description;
            $admin->status_admin = $request->status_admin;
            $admin->save();
        }
        
        return redirect('/'.$admin->id.'/profile');
    }
}
