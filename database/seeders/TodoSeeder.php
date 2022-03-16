<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')->insert([
            [
                'name' => 'work',
                'user_id' => 1,
                'category_id' => 1
            ],
            [
                'name' => 'home',
                'user_id' => 1,
                'category_id' => 2
            ],
            [
                'name' => 'my work',
                'user_id' => 2,
                'category_id' => 3

            ],
            [
                'name' => 'grocery store',
                'user_id' => 2,
                'category_id' => 4
            ]

        ]);
    }
}
