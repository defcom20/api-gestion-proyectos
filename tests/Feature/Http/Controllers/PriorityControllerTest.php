<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Priority;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PriorityController
 */
class PriorityControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected(): void
    {
        $priorities = Priority::factory()->count(3)->create();

        $response = $this->get(route('priority.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PriorityController::class,
            'store',
            \App\Http\Requests\PriorityStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves(): void
    {
        $name = $this->faker->name;

        $response = $this->post(route('priority.store'), [
            'name' => $name,
        ]);

        $priorities = Priority::query()
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $priorities);
        $priority = $priorities->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected(): void
    {
        $priority = Priority::factory()->create();

        $response = $this->get(route('priority.show', $priority));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PriorityController::class,
            'update',
            \App\Http\Requests\PriorityUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected(): void
    {
        $priority = Priority::factory()->create();
        $name = $this->faker->name;

        $response = $this->put(route('priority.update', $priority), [
            'name' => $name,
        ]);

        $priority->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $priority->name);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with(): void
    {
        $priority = Priority::factory()->create();

        $response = $this->delete(route('priority.destroy', $priority));

        $response->assertNoContent();

        $this->assertModelMissing($priority);
    }
}
