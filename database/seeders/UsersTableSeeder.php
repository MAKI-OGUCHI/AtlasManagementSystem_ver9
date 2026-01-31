<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['over_name' => "佐藤",
            'under_name' => "裕太",
            'over_name_kana' => "サトウ",
            'under_name_kana' => "ユウタ",
            'mail_address' => "sy@mail",
            'sex' => "1",
            'birth_day' => "1990/01/31",
            'role' =>"1",
            'password' => bcrypt('Yuta_Sato')],
            ['over_name' => "鈴木",
            'under_name' => "美樹",
            'over_name_kana' => "スズキ",
            'under_name_kana' => "ミキ",
            'mail_address' => "sm@mail",
            'sex' => "2",
            'birth_day' => "2000/12/31",
            'role' =>"4",
            'password' => bcrypt('Miki_Suzuki')]
        ]);

    }
}
