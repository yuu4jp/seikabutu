<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'マスター',
            'email'=>'a@a',
            'password'=>Hash::make('123456789'),
            'sex'=>'男',
            'age'=>21,
            'departure'=>'master',
            'master'=>0,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
