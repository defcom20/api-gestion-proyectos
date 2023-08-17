<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Proyect;
use App\Models\TypeState;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProyectController
 */
class ProyectControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected(): void
    {
        $proyects = Proyect::factory()->count(3)->create();

        $response = $this->get(route('proyect.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProyectController::class,
            'store',
            \App\Http\Requests\ProyectStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves(): void
    {
        $name = $this->faker->name;
        $description = $this->faker->text;
        $type_state = TypeState::factory()->create();

        $response = $this->post(route('proyect.store'), [
            'name' => $name,
            'description' => $description,
            'type_state_id' => $type_state->id,
        ]);

        $proyects = Proyect::query()
            ->where('name', $name)
            ->where('description', $description)
            ->where('type_state_id', $type_state->id)
            ->get();
        $this->assertCount(1, $proyects);
        $proyect = $proyects->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected(): void
    {
        $proyect = Proyect::factory()->create();

        $response = $this->get(route('proyect.show', $proyect));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProyectController::class,
            'update',
            \App\Http\Requests\ProyectUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected(): void
    {
        $proyect = Proyect::factory()->create();
        $name = $this->faker->name;
        $description = $this->faker->text;
        $type_state = TypeState::factory()->create();

        $response = $this->put(route('proyect.update', $proyect), [
            'name' => $name,
            'description' => $description,
            'type_state_id' => $type_state->id,
        ]);

        $proyect->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $proyect->name);
        $this->assertEquals($description, $proyect->description);
        $this->assertEquals($type_state->id, $proyect->type_state_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with(): void
    {
        $proyect = Proyect::factory()->create();

        $response = $this->delete(route('proyect.destroy', $proyect));

        $response->assertNoContent();

        $this->assertModelMissing($proyect);
    }
}
