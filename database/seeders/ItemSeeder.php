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
                'todos' => 'work todos user 1',
                'todo_id' => 1
            ],
            [
                'todos' => 'home todos user 1',
                'todo_id' => 2
            ],
            [
                'todos' => 'my work todos user 2',
                'todo_id' => 3
            ],
            [
                'todos' => 'my home todos user 2',
                'todo_id' => 4
            ]
        ]);
    }
}
