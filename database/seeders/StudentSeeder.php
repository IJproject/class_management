<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            [
                'name' => 'student',
                'email' => 'student@student.com',
                'password' => Hash::make('abcd1234'),
            ],
            [
                'name' => 'student1',
                'email' => 'student1@student.com',
                'password' => Hash::make('abcd1234'),
            ],
            [
                'name' => 'student2',
                'email' => 'student2@student.com',
                'password' => Hash::make('abcd1234'),
            ],
            [
                'name' => 'student3',
                'email' => 'student3@student.com',
                'password' => Hash::make('abcd1234'),
            ],
            [
                'name' => 'student4',
                'email' => 'student4@student.com',
                'password' => Hash::make('abcd1234'),
            ],
            [
                'name' => 'student5',
                'email' => 'student5@student.com',
                'password' => Hash::make('abcd1234'),
            ],
        ]);
    }
}
