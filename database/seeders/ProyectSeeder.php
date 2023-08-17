<?php

namespace Database\Seeders;

use App\Models\Proyect;
use Illuminate\Database\Seeder;

class ProyectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Proyect::factory()->count(5)->create();
    }
}
