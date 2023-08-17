<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\TypeState;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TypeStateController
 */
class TypeStateControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected(): void
    {
        $typeStates = TypeState::factory()->count(3)->create();

        $response = $this->get(route('type-state.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TypeStateController::class,
            'store',
            \App\Http\Requests\TypeStateStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves(): void
    {
        $name = $this->faker->name;

        $response = $this->post(route('type-state.store'), [
            'name' => $name,
        ]);

        $typeStates = TypeState::query()
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $typeStates);
        $typeState = $typeStates->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected(): void
    {
        $typeState = TypeState::factory()->create();

        $response = $this->get(route('type-state.show', $typeState));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TypeStateController::class,
            'update',
            \App\Http\Requests\TypeStateUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected(): void
    {
        $typeState = TypeState::factory()->create();
        $name = $this->faker->name;

        $response = $this->put(route('type-state.update', $typeState), [
            'name' => $name,
        ]);

        $typeState->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $typeState->name);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with(): void
    {
        $typeState = TypeState::factory()->create();

        $response = $this->delete(route('type-state.destroy', $typeState));

        $response->assertNoContent();

        $this->assertModelMissing($typeState);
    }
}
