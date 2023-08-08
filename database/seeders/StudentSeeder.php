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
                'firstName' => '美奈',
                'lastName' => '進藤',
                'email' => 'student@student.com',
                'password' => Hash::make('abcd1234'),
            ],
            [
                'owner_id' => 1,
                'firstName' => '仁',
                'lastName' => '伊藤',
                'email' => 'student1@student.com',
                'password' => Hash::make('abcd1234'),
            ],
            [
                'owner_id' => 1,
                'firstName' => '麻里',
                'lastName' => '鈴木',
                'email' => 'student2@student.com',
                'password' => Hash::make('abcd1234'),
            ],
            [
                'owner_id' => 1,
                'firstName' => '幸太',
                'lastName' => '天野',
                'email' => 'student3@student.com',
                'password' => Hash::make('abcd1234'),
            ],
            [
                'owner_id' => 1,
                'firstName' => '紀香',
                'lastName' => '青木',
                'email' => 'student4@student.com',
                'password' => Hash::make('abcd1234'),
            ],
            [
                'owner_id' => 1,
                'firstName' => 'カツオ',
                'lastName' => '磯野',
                'email' => 'student5@student.com',
                'password' => Hash::make('abcd1234'),
            ],
        ]);
    }
}
