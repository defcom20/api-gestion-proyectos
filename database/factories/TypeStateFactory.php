<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TypeState;

class TypeStateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TypeState::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                'Inicial',
                'En Progreso',
                'Revisión',
                'Aprobado',
                'Rechazado',
                'Completado',
                'Pendiente',
                'Archivado',
                'Cancelado',
                'En Espera',
                'Postergado',
                'En Análisis',
                'En Pruebas',
                'Desplegado',
                'Cerrado'
            ]),
        ];
    }
}
