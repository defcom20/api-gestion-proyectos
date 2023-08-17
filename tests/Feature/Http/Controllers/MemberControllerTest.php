<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Member;
use App\Models\TypeState;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\MemberController
 */
class MemberControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected(): void
    {
        $members = Member::factory()->count(3)->create();

        $response = $this->get(route('member.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MemberController::class,
            'store',
            \App\Http\Requests\MemberStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves(): void
    {
        $name = $this->faker->name;
        $lastname = $this->faker->lastName;
        $type_state = TypeState::factory()->create();

        $response = $this->post(route('member.store'), [
            'name' => $name,
            'lastname' => $lastname,
            'type_state_id' => $type_state->id,
        ]);

        $members = Member::query()
            ->where('name', $name)
            ->where('lastname', $lastname)
            ->where('type_state_id', $type_state->id)
            ->get();
        $this->assertCount(1, $members);
        $member = $members->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected(): void
    {
        $member = Member::factory()->create();

        $response = $this->get(route('member.show', $member));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MemberController::class,
            'update',
            \App\Http\Requests\MemberUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected(): void
    {
        $member = Member::factory()->create();
        $name = $this->faker->name;
        $lastname = $this->faker->lastName;
        $type_state = TypeState::factory()->create();

        $response = $this->put(route('member.update', $member), [
            'name' => $name,
            'lastname' => $lastname,
            'type_state_id' => $type_state->id,
        ]);

        $member->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $member->name);
        $this->assertEquals($lastname, $member->lastname);
        $this->assertEquals($type_state->id, $member->type_state_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with(): void
    {
        $member = Member::factory()->create();

        $response = $this->delete(route('member.destroy', $member));

        $response->assertNoContent();

        $this->assertModelMissing($member);
    }
}
