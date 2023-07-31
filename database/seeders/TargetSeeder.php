<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TargetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('targets')->insert([
            [
                'person' => '全員',
            ],
            [
                'person' => '講師のみ',
            ],
            [
                'person' => '生徒のみ',
            ],
        ]);
    }
}
