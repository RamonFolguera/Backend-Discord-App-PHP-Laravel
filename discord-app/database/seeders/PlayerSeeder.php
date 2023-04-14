<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('players')->insert(
            [
                [
                    'name' => "Alex",
                    'last_name' => "Moya",
                    'username' => 'CaptainMoya',
                    'email' => 'alex@alex.com'
                ],
                [
                    'name' => "Laura",
                    'last_name' => "Sanchez",
                    'username' => 'WonderWoman',
                    'email' => 'laura@laura.com'
                ],
                [
                    'name' => "Ramón   ",
                    'last_name' => "Folguera",
                    'username' => 'brannell',
                    'email' => 'ramon@ramon.com'
                ]
            ]
        );

    }  
}
