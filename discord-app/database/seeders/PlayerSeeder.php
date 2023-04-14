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
                    'email' => 'alex@alex.com',
                    'password' => 'password456'
                ],
                [
                    'name' => "Laura",
                    'last_name' => "Sanchez",
                    'username' => 'WonderWoman',
                    'email' => 'laura@laura.com',
                    'password' => 'password789'
                ],
                [
                    'name' => "Ramón",
                    'last_name' => "Folguera",
                    'username' => 'brannell',
                    'email' => 'ramon@ramon.com',
                    'password' => 'password321'

                ],
                [
                    'name' => "Test",
                    'last_name' => "User",
                    'username' => 'testuser',
                    'email' => 'test@test.com',
                    'password' => 'password123'
                ]
            ]
        );

    }  
}
