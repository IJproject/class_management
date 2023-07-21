<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('types')->insert([
            [
                'name' => '通常',
            ],
            [
                'name' => '集団',
            ],
            [
                'name' => '春季講習',
            ],
            [
                'name' => '夏期講習',
            ],
            [
                'name' => '秋期講習',
            ],
            [
                'name' => '冬期講習',
            ],
        ]);
    }
}
