<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('news')->insert([
            [
                'title' => '全員へ１',
                'content' => 'ワカチコ',
                'target_id' => 1,
            ],
            [
                'title' => '全員へ２',
                'content' => 'ワカチコワカチコ',
                'target_id' => 1,
            ],
            [
                'title' => '講師へ１',
                'content' => 'ワカチコ',
                'target_id' => 2,
            ],
            [
                'title' => '講師へ２',
                'content' => 'ワカチコワカチコ',
                'target_id' => 2,
            ],
            [
                'title' => '生徒へ１',
                'content' => 'ワカチコ',
                'target_id' => 3,
            ],
            [
                'title' => '生徒へ２',
                'content' => 'ワカチコワカチコ',
                'target_id' => 3,
            ],
        ]);
    }
}
