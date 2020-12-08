<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert(
            ['description' => 'Vasarlas', 
            'user_id' => 1, 
        ]);
        DB::table('tasks')->insert(
            ['description' => 'Szaladas', 
            'user_id' => 2, 
        ]);
        DB::table('tasks')->insert(
            ['description' => 'Turazas', 
            'user_id' => 3, 
        ]);
    }
}
