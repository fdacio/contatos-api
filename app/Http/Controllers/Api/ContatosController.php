<?php

namespace App\Http\Controllers\Api;

use App\Contato;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContatoRequest;

class ContatosController extends Controller
{
    public function index()
    {
        $contatos = Contato::with('grupo')->orderBy('nome')->get();
        return response()->json($contatos, 200);
    }

    public function create(ContatoRequest $request)
    {
        $contato = Contato::create($request->all());
        return response()->json($contato, 201);
    }
  
    public function find(Contato $contato)
    {
        return response()->json($contato, 200);
    }

    public function update(ContatoRequest $request, Contato $contato)
    {
        $contato->update($request->all());
        return response()->json($contato, 200);
    }


    public function destroy(Contato $contato)
    {
        Contato::destroy($contato->id);
        return response()->json($contato, 204);
    }
}
