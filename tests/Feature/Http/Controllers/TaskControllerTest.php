<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use App\Models\TypeState;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TaskController
 */
class TaskControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected(): void
    {
        $tasks = Task::factory()->count(3)->create();

        $response = $this->get(route('task.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TaskController::class,
            'store',
            \App\Http\Requests\TaskStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves(): void
    {
        $description = $this->faker->text;
        $category = Category::factory()->create();
        $type_state = TypeState::factory()->create();

        $response = $this->post(route('task.store'), [
            'description' => $description,
            'category_id' => $category->id,
            'type_state_id' => $type_state->id,
        ]);

        $tasks = Task::query()
            ->where('description', $description)
            ->where('category_id', $category->id)
            ->where('type_state_id', $type_state->id)
            ->get();
        $this->assertCount(1, $tasks);
        $task = $tasks->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected(): void
    {
        $task = Task::factory()->create();

        $response = $this->get(route('task.show', $task));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TaskController::class,
            'update',
            \App\Http\Requests\TaskUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected(): void
    {
        $task = Task::factory()->create();
        $description = $this->faker->text;
        $category = Category::factory()->create();
        $type_state = TypeState::factory()->create();

        $response = $this->put(route('task.update', $task), [
            'description' => $description,
            'category_id' => $category->id,
            'type_state_id' => $type_state->id,
        ]);

        $task->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($description, $task->description);
        $this->assertEquals($category->id, $task->category_id);
        $this->assertEquals($type_state->id, $task->type_state_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with(): void
    {
        $task = Task::factory()->create();

        $response = $this->delete(route('task.destroy', $task));

        $response->assertNoContent();

        $this->assertModelMissing($task);
    }
}
