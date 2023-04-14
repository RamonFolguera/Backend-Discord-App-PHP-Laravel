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
        DB::table('players')->insert(
            [
                ['name' => 'LAN Party'],
                ['name' => 'Game Night'],
                ['name' => 'Gaming Convention'],
                ['name' => 'Esports Tournament'],
                ['name' => 'Board Game Cafe Night'],
            ];
        );
    }
}
