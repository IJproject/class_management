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
                'owner_id' => 1,
                'firstName' => 'student',
                'lastName' => 'です',
                'email' => 'student@student.com',
                'password' => Hash::make('abcd1234'),
            ],
            [
                'owner_id' => 1,
                'firstName' => 'student1',
                'lastName' => 'です',
                'email' => 'student1@student.com',
                'password' => Hash::make('abcd1234'),
            ],
            [
                'owner_id' => 1,
                'firstName' => 'student2',
                'lastName' => 'です',
                'email' => 'student2@student.com',
                'password' => Hash::make('abcd1234'),
            ],
            [
                'owner_id' => 1,
                'firstName' => 'student3',
                'lastName' => 'です',
                'email' => 'student3@student.com',
                'password' => Hash::make('abcd1234'),
            ],
            [
                'owner_id' => 1,
                'firstName' => 'student4',
                'lastName' => 'です',
                'email' => 'student4@student.com',
                'password' => Hash::make('abcd1234'),
            ],
            [
                'owner_id' => 1,
                'firstName' => 'student5',
                'lastName' => 'です',
                'email' => 'student5@student.com',
                'password' => Hash::make('abcd1234'),
            ],
        ]);
    }
}
