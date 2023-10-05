<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Proyect;
use App\Models\TypeState;

class ProyectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Proyect::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                'E-Shop Proyecto',
                'Blogging Central',
                'MobiHealth App',
                'TaskMaster Sistema',
                'NewsHub Portal',
                'PetSocial Red',
                'FinAnalyzer Herramienta',
                'MindfulApp Meditación',
                'BookMeNow Reservas',
                'EduOnline Plataforma',
            ]),
            'description' => $this->faker->randomElement([
                'Plataforma de E-commerce',
                'Sitio Web de Blogging',
                'Aplicación Móvil de Salud',
                'Sistema de Gestión de Proyectos',
                'Portal de Noticias',
                'Red Social para Mascotas',
                'Herramienta de Análisis Financiero',
                'App de Meditación y Bienestar',
                'Sistema de Reservas en Línea',
                'Plataforma de Aprendizaje en Línea',
            ]),
            'type_state_id' => TypeState::factory(),
        ];
    }
}
