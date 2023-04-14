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
                    'message' => 'Hello world!',
                    'date' => '2022-01-01',
                ],
                [
                    'message' => 'How are you?',
                    'date' => '2022-01-02',
                ],
                [
                    'message' => 'I am fine, thanks.',
                    'date' => '2022-01-03',
                ],
            ]
        );

    }
}
