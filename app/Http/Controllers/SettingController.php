<?php

namespace App\Http\Controllers;

use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Model\Access_admin;
Use App\Model\Menu;

class SettingController extends Controller
{
    public function index(){
        $menu = Menu::all();
        return view('settings/index',compact('menu'));
    }

    public function create(Request $request){
        Menu::create([
            'menu_name' => $request->menu,
        ]);
        $user = User::all();
        foreach($user as $loop){
            if($loop->status_admin !=1){
                Access_admin::create([
                    'user_id' => $loop->id,
                    'menu_id' => Menu::max('id'),
                ]);
            }
        }
        return redirect('/setting');
    }

    public function deleting_menu(Request $request, $id){
        if(Access_admin::where('menu_id',$id)->get()){
            DB::table('access_admins')->where('menu_id',$id)->delete();
        }
        Menu::find($id)->delete();
        return redirect('/setting');
    }

    public function access(Request $request, $id){       
        $menu_model = Menu::all();
        $user_model = User::find($id);
        $access_model = Access_admin::all();
        $input_name = ['read','edit','delete','create'];
        $access_value = [];
        for($i=0; $i<count($menu_model); $i++){
            for($j=0; $j<count($input_name); $j++){
                $temp = $input_name[$j].$menu_model[$i]['id'];
                $access_value[$i][$j] = $request->$temp;
            }
        }

            if(count($access_model)>0){
                $sum_menu = count($menu_model);
                for($i=0; $i<count($access_model); $i++){
                    for($j=0; $j<count($menu_model); $j++){
                        if($access_model[$i]['user_id']!=$user_model->id && $access_model[$i]['menu_id']!=$menu_model[$j]['id']){
                            continue;
                        }else{
                            $access_id = Access_admin::where('user_id',$user_model->id)->where('menu_id',$menu_model[$j]['id'])->get();
                            $find_id = Access_admin::find($access_id[0]['id']);
                            // if($find_id['menu_id']==$menu_model[$j]['id']){
                                for($k=0; $k<count($input_name); $k++){
                                    $field_name = $input_name[$k];
                                    $find_id->$field_name = $access_value[$j][$k];
                                    $find_id->save();
                                }
                            // }
                        }
                    }
                }
            }


            return redirect('/'.$user_model->id.'/profile');
        

        
    }
}
