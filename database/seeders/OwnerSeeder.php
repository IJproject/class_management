<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('owners')->insert([
            [
                'name' => 'owner',
                'email' => 'owner@owner.com',
                'password' => Hash::make('abcd1234'),
            ],
            [
                'name' => 'owner1',
                'email' => 'owner1@owner.com',
                'password' => Hash::make('abcd1234'),
            ],
            [
                'name' => 'owner2',
                'email' => 'owner2@owner.com',
                'password' => Hash::make('abcd1234'),
            ],
            [
                'name' => 'owner3',
                'email' => 'owner3@owner.com',
                'password' => Hash::make('abcd1234'),
            ],
            [
                'name' => 'owner4',
                'email' => 'owner4@owner.com',
                'password' => Hash::make('abcd1234'),
            ],
            [
                'name' => 'owner5',
                'email' => 'owner5@owner.com',
                'password' => Hash::make('abcd1234'),
            ],
        ]);
    }
}
