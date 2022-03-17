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
                'todo' => 'work todo user 1',
                'todo_id' => 1
            ],
            [
                'todo' => 'home todo user 1',
                'todo_id' => 2
            ],
            [
                'todo' => 'my work todo user 2',
                'todo_id' => 3
            ],
            [
                'todo' => 'my home todo user 2',
                'todo_id' => 4
            ]
        ]);
    }
}
