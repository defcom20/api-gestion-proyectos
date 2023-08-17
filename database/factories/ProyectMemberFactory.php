<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Member;
use App\Models\Proyect;
use App\Models\ProyectMember;

class ProyectMemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProyectMember::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'proyect_id' => Proyect::factory(),
            'member_id' => Member::factory(),
        ];
    }
}
