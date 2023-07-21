<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subjects')->insert([
            [
                'name' => '国語',
                'grade' => '小５',
                'level' => '難関',
            ],
            [
                'name' => '社会',
                'grade' => '小６',
                'level' => '標準',
            ],
            [
                'name' => '英語',
                'grade' => '中２',
                'level' => '基礎',
            ],
            [
                'name' => '数学',
                'grade' => '中３',
                'level' => '標準',
            ],
            [
                'name' => '物理',
                'grade' => '高１',
                'level' => '基礎',
            ],
            [
                'name' => '場の量子論',
                'grade' => '学部３年',
                'level' => '難関',
            ],
        ]);
    }
}
