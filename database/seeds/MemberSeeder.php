<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        function generate_uuid() {
            return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
                mt_rand( 0, 0xffff ),
                mt_rand( 0, 0x0fff ) | 0x4000,
                mt_rand( 0, 0x3fff ) | 0x8000,
                mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
            );
        }

        function RandomString() {
            return sprintf( '%04x%%04x',
                mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
                mt_rand( 0, 0xffff ),
                mt_rand( 0, 0x0fff ) | 0x4000,
                mt_rand( 0, 0x3fff ) | 0x8000,
                mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
            );
        }

        $faker = Faker::create('uid');

        for ($i=1; $i<= 50; $i++){
            
            if($i < 10){
                DB::table('member')->insert([
                    'uid'   => generate_uuid(),
                    'nama' => $faker->name,
                    'nik' => '123456789101110'.$i,
                    'no_handphone' => '081212345678',
                    'email' => $faker->email,
                    'id_jenkel' => Rand(1,2),
                    'password' => Hash::make('Pass123'),
                    'id_status' => 20,
                    'status_hapus' => 'N',
                    'referral_code' => 'nama_'.RandomString(),
                ]);
            }
            else{
                DB::table('member')->insert([
                    'uid'   => generate_uuid(),
                    'nama' => $faker->name,
                    'nik' => '12345678910111'.$i,
                    'no_handphone' => '081212345678',
                    'email' => $faker->email,
                    'id_jenkel' => Rand(1,2),
                    'password' => Hash::make('Pass123'),
                    'id_status' => 20,
                    'status_hapus' => 'N',
                    'referral_code' => 'nama_'.RandomString(),
                ]);
            }
        }
    }
}
