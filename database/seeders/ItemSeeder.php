<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
                'todo' => 'work todos user 1',
                'todo_id' => 1
            ],
            [
                'todo' => 'home todos user 1',
                'todo_id' => 2
            ],
            [
                'todo' => 'my work todos user 2',
                'todo_id' => 3
            ],
            [
                'todo' => 'my home todos user 2',
                'todo_id' => 4
            ]
        ]);
    }
}
