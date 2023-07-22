<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teachers')->insert([
            [
                'owner_id' => 1,
                'firstName' => 'teacher',
                'lastName' => 'です',
                'email' => 'teacher@teacher.com',
                'password' => Hash::make('abcd1234'),
            ],
            [
                'owner_id' => 1,
                'firstName' => 'teacher1',
                'lastName' => 'です',
                'email' => 'teacher1@teacher.com',
                'password' => Hash::make('abcd1234'),
            ],
            [
                'owner_id' => 1,
                'firstName' => 'teacher2',
                'lastName' => 'です',
                'email' => 'teacher2@teacher.com',
                'password' => Hash::make('abcd1234'),
            ],
            [
                'owner_id' => 1,
                'firstName' => 'teache3',
                'lastName' => 'です',
                'email' => 'teacher3@teacher.com',
                'password' => Hash::make('abcd1234'),
            ],
            [
                'owner_id' => 1,
                'firstName' => 'teacher4',
                'lastName' => 'です',
                'email' => 'teacher4@teacher.com',
                'password' => Hash::make('abcd1234'),
            ],
            [
                'owner_id' => 1,
                'firstName' => 'teacher5',
                'lastName' => 'です',
                'email' => 'teacher5@teacher.com',
                'password' => Hash::make('abcd1234'),
            ],
        ]);
    }
}
