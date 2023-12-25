<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
                'name' => '名前',
                'email' => 'メールアドレス',
                'password'=>'パスワード',
                'sex'=>'性別',
                'age'=>'年齢',
                'departure'=>'部署',
                'master'=>'アカウントの種類',
                'image'=>'画像データ',
        ]);
    }
}
