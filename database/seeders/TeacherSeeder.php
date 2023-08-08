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
                'firstName' => '隆弘',
                'lastName' => '山本',
                'email' => 'teacher@teacher.com',
                'password' => Hash::make('abcd1234'),
            ],
            [
                'owner_id' => 1,
                'firstName' => '太郎',
                'lastName' => '佐藤',
                'email' => 'teacher1@teacher.com',
                'password' => Hash::make('abcd1234'),
            ],
            [
                'owner_id' => 1,
                'firstName' => '梨花',
                'lastName' => '山田',
                'email' => 'teacher2@teacher.com',
                'password' => Hash::make('abcd1234'),
            ],
            [
                'owner_id' => 1,
                'firstName' => '優香',
                'lastName' => '西本',
                'email' => 'teacher3@teacher.com',
                'password' => Hash::make('abcd1234'),
            ],
            [
                'owner_id' => 1,
                'firstName' => '宏',
                'lastName' => '蟹元',
                'email' => 'teacher4@teacher.com',
                'password' => Hash::make('abcd1234'),
            ],
            [
                'owner_id' => 1,
                'firstName' => '美優',
                'lastName' => '後藤',
                'email' => 'teacher5@teacher.com',
                'password' => Hash::make('abcd1234'),
            ],
        ]);
    }
}
