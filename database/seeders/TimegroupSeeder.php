<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class TimegroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('timegroups')->insert([
            [
                'time_id' => 1,
                'group' => 1,
            ],
            [
                'time_id' => 2,
                'group' => 1,
            ],
            [
                'time_id' => 3,
                'group' => 1,
            ],
            [
                'time_id' => 4,
                'group' => 1,
            ],
            [
                'time_id' => 5,
                'group' => 1,
            ],
            [
                'time_id' => 2,
                'group' => 2,
            ],
            [
                'time_id' => 3,
                'group' => 2,
            ],
            [
                'time_id' => 4,
                'group' => 2,
            ],
            [
                'time_id' => 5,
                'group' => 2,
            ],
            [
                'time_id' => 6,
                'group' => 2,
            ],
        ]);
    }
}
