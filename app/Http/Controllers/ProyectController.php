<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProyectStoreRequest;
use App\Http\Requests\ProyectUpdateRequest;
use App\Http\Resources\ProyectCollection;
use App\Http\Resources\ProyectResource;
use App\Models\Proyect;
use Illuminate\Http\Request;

class ProyectController extends Controller
{
    public function index(Request $request): ProyectCollection
    {
        $proyects = Proyect::all();

        return new ProyectCollection($proyects);
    }

    public function store(ProyectStoreRequest $request)
    {

        $proyect = Proyect::create($request->validated());
        return new ProyectResource($proyect);
    }

    public function show(Request $request, Proyect $proyect): ProyectResource
    {
        return new ProyectResource($proyect);
    }

    public function update(ProyectUpdateRequest $request, Proyect $proyect): ProyectResource
    {
        $proyect->update($request->validated());

        return new ProyectResource($proyect);
    }

    public function destroy(Request $request, Proyect $proyect)
    {
        $proyect->delete();

        return response()->noContent();
    }
}
