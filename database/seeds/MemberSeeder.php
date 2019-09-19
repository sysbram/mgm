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
        $faker = Faker::create('uid');

        for($x=1; $x<=10; $x++){
            DB::table('member')->insert([
                'nik'   => $faker->nik,
                'nama' => $faker->name,
                'email' => $faker->email,
                'no_handphone' => $faker->no_handhpone,
            ]);
        }
    }
}
