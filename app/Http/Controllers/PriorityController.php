<?php

namespace App\Http\Controllers;

use App\Http\Requests\PriorityStoreRequest;
use App\Http\Requests\PriorityUpdateRequest;
use App\Http\Resources\PriorityCollection;
use App\Http\Resources\PriorityResource;
use App\Models\Priority;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PriorityController extends Controller
{
    public function index(Request $request): Response
    {
        $priorities = Priority::all();

        return new PriorityCollection($priorities);
    }

    public function store(PriorityStoreRequest $request): Response
    {
        $priority = Priority::create($request->validated());

        return new PriorityResource($priority);
    }

    public function show(Request $request, Priority $priority): Response
    {
        return new PriorityResource($priority);
    }

    public function update(PriorityUpdateRequest $request, Priority $priority): Response
    {
        $priority->update($request->validated());

        return new PriorityResource($priority);
    }

    public function destroy(Request $request, Priority $priority): Response
    {
        $priority->delete();

        return response()->noContent();
    }
}
