<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\TypeState::factory(10)->create();
        \App\Models\Category::factory(15)->create();
        \App\Models\Priority::factory(5)->create();
        \App\Models\Role::factory(15)->create();
        \App\Models\Task::factory(15)->create();
        \App\Models\Proyect::factory(3)->create();
        \App\Models\Member::factory(10)->create();

    }
}
