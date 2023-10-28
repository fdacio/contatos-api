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
        
        try {
            $grupo = Grupo::create($request->all());
            return response()->json($grupo, 201);
        } catch (Exception $e) {
            return response()->json(['erro' => 'Contate o Administrador', 'codigo' => $e->getCode()], 401);
        }   
    }


    public function find(Grupo $grupo) 
    {
        return response()->json($grupo, 201);
    }

    public function update(Request $request, $id)
    {
        //
    }

 
    public function destroy(Grupo $grupo)
    {
        try {
            Grupo::destroy($grupo);
            return response()->json($grupo, 201);
        } catch (Exception $e) {
            return response()->json(['erro' => 'Contate o Administrador', 'codigo' => $e->getCode()], 401);
        }  
    }
}
