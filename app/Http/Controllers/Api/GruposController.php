<?php

namespace App\Http\Controllers\Api;

use App\Grupo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GrupoRequest;
use Exception;

class GruposController extends Controller
{

    public function index()
    {
        $grupos = Grupo::orderBy('nome')->get();
        return response()->json($grupos, 200);
    }

    public function create(GrupoRequest $request)
    {
        $grupo = Grupo::create($request->all());
        return response()->json($grupo, 201);
    }


    public function find(Grupo $grupo)
    {
        return response()->json($grupo, 201);
    }

    public function update(GrupoRequest $request, Grupo $grupo)
    {
        $grupo->update($request->all());
        return response()->json($grupo, 200);
    }


    public function destroy(Grupo $grupo)
    {
        Grupo::destroy($grupo->id);
        return response()->json($grupo, 204);
    }
}
