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
                    'name' => 'LAN Party'
                ],
                [
                    'game_id' => 3,
                    'name' => 'Game Night'
                ],
                [
                    'game_id' => 1,
                    'name' => 'Gaming Convention'
                ],
                [
                    'game_id' => 2,
                    'name' => 'Esports Tournament'
                ],
                [
                    'game_id' => 4,
                    'name' => 'Board Game Cafe Night'
                ],
            ]
        );
    }
}
