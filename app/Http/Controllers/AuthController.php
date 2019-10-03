<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{
    public function login(){
        $allow = [];
        return view('auth/login', compact('allow'));
    }
    public function postLogin(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }
    }

    public function logout(){
        $user = User::find(Auth::user()->id);
        $user->status_login = 0;
        $user->save();
        Auth::logout();
        return redirect('/login');
    }
}
