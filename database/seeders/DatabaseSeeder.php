<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            OwnerSeeder::class,
            TeacherSeeder::class,
            StudentSeeder::class,
            SubjectSeeder::class,
            TypeSeeder::class,
            TimeSeeder::class,
            ScheduleSeeder::class,
            LessonSeeder::class,
            TargetSeeder::class,
            NewsSeeder::class,
        ]);
    }
}
