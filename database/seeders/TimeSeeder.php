<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class TimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('times')->insert([
            [
                'start' => '10:00',
                'finish' => '11:30',
            ],
            [
                'start' => '12:00',
                'finish' => '13:30',
            ],
            [
                'start' => '14:00',
                'finish' => '15:30',
            ],
            [
                'start' => '16:00',
                'finish' => '17:30',
            ],
            [
                'start' => '18:00',
                'finish' => '19:30',
            ],
            [
                'start' => '20:00',
                'finish' => '21:30',
            ],
        ]);
    }
}
