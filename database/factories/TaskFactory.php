<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Task;
use App\Models\TypeState;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'description' => $this->faker->randomElement([
                'Desarrollar la función de inicio de sesión',
                'Diseñar la página de inicio',
                'Realizar pruebas en el módulo de registro',
                'Actualizar la documentación del API',
                'Revisar el rendimiento de la base de datos',
                'Optimizar las imágenes del sitio web',
                'Implementar la función de recuperación de contraseña',
                'Corregir errores en la página de perfil',
                'Añadir validación en el formulario de contacto',
                'Investigar nuevas tecnologías para el frontend',
                'Preparar presentación para los stakeholders',
                'Planificar la próxima reunión de equipo',
                'Revisar y responder correos de soporte',
                'Realizar una auditoría de seguridad',
                'Crear una estrategia de marketing para el próximo trimestre'
            ]),
            'category_id' => Category::factory(),
            'type_state_id' => TypeState::factory(),
        ];
    }
}
