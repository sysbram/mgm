<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Menu;

class SettingController extends Controller
{
    public function index(){
        $menu = Menu::all();
        return view('settings/index',compact('menu'));
    }

    public function create(Request $request){
        Menu::create([

            'menu_id' => bcrypt($request->menu),
            'menu_name' => $request->menu

        ]);
        return redirect('/setting');
    }
}
