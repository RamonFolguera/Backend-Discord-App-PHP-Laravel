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
                    'created_at' => '2023-04-16 08:53:22',
                    'updated_at' => '2023-04-16 08:53:22'
                ],
                [
                    'title' => 'Tetris',
                    'thumbnail_url' => 'https://example.com/tetris-thumbnail.jpg',
                    'url' => 'https://example.com/tetris',
                    'created_at' => '2023-04-16 08:53:22',
                    'updated_at' => '2023-04-16 08:53:22'
                ],
                [
                    'title' => 'Minecraft',
                    'thumbnail_url' => 'https://example.com/minecraft-thumbnail.jpg',
                    'url' => 'https://example.com/minecraft',
                    'created_at' => '2023-04-16 08:53:22',
                    'updated_at' => '2023-04-16 08:53:22'
                ],
                [
                    'title' => 'Fortnite',
                    'thumbnail_url' => 'https://example.com/fortnite-thumbnail.jpg',
                    'url' => 'https://example.com/fortnite',
                    'created_at' => '2023-04-16 08:53:22',
                    'updated_at' => '2023-04-16 08:53:22'
                ],
                [
                    'title' => 'Among Us',
                    'thumbnail_url' => 'https://example.com/among-us-thumbnail.jpg',
                    'url' => 'https://example.com/among-us',
                    'created_at' => '2023-04-16 08:53:22',
                    'updated_at' => '2023-04-16 08:53:22'
                ],
            ]
        );
    }
}
