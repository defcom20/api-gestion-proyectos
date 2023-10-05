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
    public function index(Request $request): TypeStateCollection
    {
        $typeStates = TypeState::all();

        return new TypeStateCollection($typeStates);
    }

    public function store(TypeStateStoreRequest $request): TypeStateResource
    {
        $typeState = TypeState::create($request->validated());

        return new TypeStateResource($typeState);
    }

    public function show(Request $request, TypeState $typeState): TypeStateResource
    {
        return new TypeStateResource($typeState);
    }

    public function update(TypeStateUpdateRequest $request, TypeState $typeState): TypeStateResource
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
