<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('notes')->insert([
            [
            'title' => 'LOremIpsum',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'user_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'LOremIpsum',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'user_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            ],
            [
            'title' => 'LOremIpsum',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'user_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
