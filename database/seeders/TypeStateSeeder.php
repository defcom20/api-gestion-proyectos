<?php

namespace Database\Seeders;

use App\Models\TypeState;
use Illuminate\Database\Seeder;

class TypeStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeState::factory()->count(5)->create();
    }
}
