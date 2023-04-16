<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'role_id' => 2,
                    'name' => "Alex",
                    'last_name' => "Moya",
                    'username' => 'CaptainMoya',
                    'email' => 'alex@alex.com',
                    'password' => bcrypt("123456"),
                    'created_at' => '2023-04-16 08:53:22',
                    'updated_at' => '2023-04-16 08:53:22'
                    
                ],
                [
                    'role_id' => 1,
                    'name' => "Laura",
                    'last_name' => "Sanchez",
                    'username' => 'WonderWoman',
                    'email' => 'laura@laura.com',
                    'password' => bcrypt("123456"),
                    'created_at' => '2023-04-16 08:53:22',
                    'updated_at' => '2023-04-16 08:53:22'
                ],
                [
                    'role_id' => 1,
                    'name' => "Ramón",
                    'last_name' => "Folguera",
                    'username' => 'brannell',
                    'email' => 'ramon@ramon.com',
                    'password' => bcrypt("123456"),
                    'created_at' => '2023-04-16 08:53:22',
                    'updated_at' => '2023-04-16 08:53:22'

                ],
                [
                    'role_id' => 1,
                    'name' => "James",
                    'last_name' => "Webb",
                    'username' => 'WebbAthor',
                    'email' => 'james@james.com',
                    'password' => bcrypt("123456"),
                    'created_at' => '2023-04-16 08:53:22',
                    'updated_at' => '2023-04-16 08:53:22'
                ],
                [
                    'role_id' => 1,
                    'name' => "Peter",
                    'last_name' => "Smith",
                    'username' => 'Tank',
                    'email' => 'peter@peter.com',
                    'password' => bcrypt("123456"),
                    'created_at' => '2023-04-16 08:53:22',
                    'updated_at' => '2023-04-16 08:53:22'
                ]
            ]
        );
    }
}
