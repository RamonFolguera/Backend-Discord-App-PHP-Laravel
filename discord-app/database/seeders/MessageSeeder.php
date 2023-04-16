<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert(
            [
                [
                    'user_id' => 2,
                    'party_id' => 4,
                    'message' => 'Hello world!',
                    'created_at' => '2023-04-16 08:53:22',
                    'updated_at' => '2023-04-16 08:53:22'
                ],
                [
                    'user_id' => 3,
                    'party_id' => 4,
                    'message' => 'How are you?',
                    'created_at' => '2023-04-16 08:53:22',
                    'updated_at' => '2023-04-16 08:53:22'
                ],
                [
                    'user_id' => 2,
                    'party_id' => 4,
                    'message' => 'I am fine, thanks.',
                    'created_at' => '2023-04-16 08:53:22',
                    'updated_at' => '2023-04-16 08:53:22'
                ],
                [
                    'user_id' => 1,
                    'party_id' => 2,
                    'message' => 'I am playing this game all day today',
                    'created_at' => '2023-04-16 08:53:22',
                    'updated_at' => '2023-04-16 08:53:22'
                ],
                [
                    'user_id' => 3,
                    'party_id' => 2,
                    'message' => 'I will join you for a couple of hours',
                    'created_at' => '2023-04-16 08:53:22',
                    'updated_at' => '2023-04-16 08:53:22'
                ],
                [
                    'user_id' => 1,
                    'party_id' => 2,
                    'message' => 'Great!',
                    'created_at' => '2023-04-16 08:53:22',
                    'updated_at' => '2023-04-16 08:53:22'
                ],
            ]
        );

    }
}
