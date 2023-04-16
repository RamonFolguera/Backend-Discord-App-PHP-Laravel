<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parties')->insert(
            [
                [
                    'game_id' => 5,
                    'name' => 'LAN Party',
                    'created_at' => '2023-04-16 08:53:22',
                    'updated_at' => '2023-04-16 08:53:22'
                ],
                [
                    'game_id' => 3,
                    'name' => 'Game Night',
                    'created_at' => '2023-04-16 08:53:22',
                    'updated_at' => '2023-04-16 08:53:22'
                ],
                [
                    'game_id' => 1,
                    'name' => 'Gaming Convention',
                    'created_at' => '2023-04-16 08:53:22',
                    'updated_at' => '2023-04-16 08:53:22'
                ],
                [
                    'game_id' => 2,
                    'name' => 'Esports Tournament',
                    'created_at' => '2023-04-16 08:53:22',
                    'updated_at' => '2023-04-16 08:53:22'
                ],
                [
                    'game_id' => 4,
                    'name' => 'Board Game Cafe Night',
                    'created_at' => '2023-04-16 08:53:22',
                    'updated_at' => '2023-04-16 08:53:22'
                ],
            ]
        );
    }
}
