<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            [
                'thread_id' => 1,
                'body' => '初めてのlaravel開発初めてのlaravel開発初めてのlaravel開発',
                'created_at' => '2022/12/12 11:11:11',
            ],
            [
                'thread_id' => 2,
                'body' => '2初めてのlaravel開発初めての2laravel開発初めてのlaravel開発',
                'created_at' => '2022/10/10 11:11:11',
            ],
            [
                'thread_id' => 3,
                'body' => '3初めてのlaravel開発初めての3laravel開発初めてのlaravel開発',
                'created_at' => '2022/10/13 03:03:03',
            ]
        ]);
    }
}
