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
                ],
                [
                    'user_id' => 3,
                    'party_id' => 4,
                    'message' => 'How are you?',
                ],
                [
                    'user_id' => 2,
                    'party_id' => 4,
                    'message' => 'I am fine, thanks.',
                ],
                [
                    'user_id' => 1,
                    'party_id' => 2,
                    'message' => 'I am playing this game all day today',
                ],
                [
                    'user_id' => 3,
                    'party_id' => 2,
                    'message' => 'I will join you for a couple of hours',
                ],
                [
                    'user_id' => 1,
                    'party_id' => 2,
                    'message' => 'Great!',
                ],
            ]
        );

    }
}
