<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ThreadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('threads')->insert([
            [
                'thread_title' => 'test',
                'latest_comment_time' => '2022/10/11',
                'created_at' => '2022/10/05 11:11:11',
            ],
            [
                'thread_title' => 'test2',
                'latest_comment_time' => '2022/10/11',
                'created_at' => '2022/10/05 11:11:11',
            ],
            [
                'thread_title' => 'test3',
                'latest_comment_time' => '2022/10/11',
                'created_at' => '2022/10/05 11:11:11',
            ],
        ]);
    }
}
