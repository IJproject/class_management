<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lessons')->insert([
            [
                'student_id' => 1,
                'teacher_id' => 1,
                'subject_id' => 1,
                'type_id' => 1,
                'schedule_id' => 1,
                'memo' => 'これ持ってきてください',
            ],
            [
                'student_id' => 1,
                'teacher_id' => 2,
                'subject_id' => 2,
                'type_id' => 2,
                'schedule_id' => 2,
                'memo' => 'あれ持ってきてください',
            ],
            [
                'student_id' => 1,
                'teacher_id' => 3,
                'subject_id' => 3,
                'type_id' => 3,
                'schedule_id' => 3,
                'memo' => 'それ持ってきてください',
            ],
            [
                'student_id' => 1,
                'teacher_id' => 4,
                'subject_id' => 4,
                'type_id' => 4,
                'schedule_id' => 4,
                'memo' => 'あれを持ってきてください',
            ],
            [
                'student_id' => 2,
                'teacher_id' => 5,
                'subject_id' => 5,
                'type_id' => 5,
                'schedule_id' => 5,
                'memo' => 'これ持ってきてください',
            ],
            [
                'student_id' => 2,
                'teacher_id' => 6,
                'subject_id' => 6,
                'type_id' => 6,
                'schedule_id' => 6,
                'memo' => '誰それ持ってきてください',
            ],
        ]);
    }
}
