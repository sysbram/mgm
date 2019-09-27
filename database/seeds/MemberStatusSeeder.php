<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MemberStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; i<=4; $i++){
            if($i = 1){
                $id = 1;
                $status = "Registrasi";
            }
            else if($i = 2){
                $id = 5;
                $status = "Aktifasi Email";
            }
            else if($i = 3){
                $id = 10;
                $status = "Verifikasi ID";
            }
            else if($i = 4){
                $id = 15;
                $status = "Aktif";
            }
            
            DB::table('member_status')->insert([
                'id'   => $id,
                'member_status' => $status,
            ]);
        }
    }
}
