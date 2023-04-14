<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert(
            [
                [
                    'title' => 'Super Mario Bros.',
                    'thumbnail_url' => 'https://example.com/super-mario-bros-thumbnail.jpg',
                    'url' => 'https://example.com/super-mario-bros',
                ],
                [
                    'title' => 'Tetris',
                    'thumbnail_url' => 'https://example.com/tetris-thumbnail.jpg',
                    'url' => 'https://example.com/tetris',
                ],
                [
                    'title' => 'Minecraft',
                    'thumbnail_url' => 'https://example.com/minecraft-thumbnail.jpg',
                    'url' => 'https://example.com/minecraft',
                ],
                [
                    'title' => 'Fortnite',
                    'thumbnail_url' => 'https://example.com/fortnite-thumbnail.jpg',
                    'url' => 'https://example.com/fortnite',
                ],
                [
                    'title' => 'Among Us',
                    'thumbnail_url' => 'https://example.com/among-us-thumbnail.jpg',
                    'url' => 'https://example.com/among-us',
                ],
            ]
        );
    }
}
