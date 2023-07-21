<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('schedules')->insert([
            [
                'date' => '2023-07-10',
                'time_id' => 1,
            ],
            [
                'date' => '2023-07-11',
                'time_id' => 2,
            ],
            [
                'date' => '2023-07-12',
                'time_id' => 3,
            ],
            [
                'date' => '2023-07-13',
                'time_id' => 4,
            ],
            [
                'date' => '2023-07-14',
                'time_id' => 5,
            ],
            [
                'date' => '2023-07-15',
                'time_id' => 6,
            ],
        ]);
    }
}
