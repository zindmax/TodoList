<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'work',
                'user_id' => 1
            ],
            [
                'name' => 'home',
                'user_id' => 1
            ],
            [
                'name' => 'my work',
                'user_id' => 2
            ],
            [
                'name' => 'shopping',
                'user_id' => 2
            ]
        ]);
    }
}
