<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Priority;
use App\Models\ProyectMember;
use App\Models\ProyectTask;
use App\Models\Role;
use App\Models\Task;
use App\Models\TypeState;

class ProyectTaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProyectTask::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'proyect_member_id' => ProyectMember::factory(),
            'task_id' => Task::factory(),
            'role_id' => Role::factory(),
            'priority_id' => Priority::factory(),
            'due_date' => $this->faker->date(),
            'type_state_id' => TypeState::factory(),
        ];
    }
}
