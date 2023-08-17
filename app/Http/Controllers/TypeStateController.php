<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeStateStoreRequest;
use App\Http\Requests\TypeStateUpdateRequest;
use App\Http\Resources\TypeStateCollection;
use App\Http\Resources\TypeStateResource;
use App\Models\TypeState;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TypeStateController extends Controller
{
    public function index(Request $request): Response
    {
        $typeStates = TypeState::all();

        return new TypeStateCollection($typeStates);
    }

    public function store(TypeStateStoreRequest $request): Response
    {
        $typeState = TypeState::create($request->validated());

        return new TypeStateResource($typeState);
    }

    public function show(Request $request, TypeState $typeState): Response
    {
        return new TypeStateResource($typeState);
    }

    public function update(TypeStateUpdateRequest $request, TypeState $typeState): Response
    {
        $typeState->update($request->validated());

        return new TypeStateResource($typeState);
    }

    public function destroy(Request $request, TypeState $typeState): Response
    {
        $typeState->delete();

        return response()->noContent();
    }
}
