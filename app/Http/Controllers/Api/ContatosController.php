<?php

namespace App\Http\Controllers\Api;

use App\Contato;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContatoRequest;
use Illuminate\Http\Request;

class ContatosController extends Controller
{
    private function index(Request $request)
    {
        $nome = $request->get('nome');
        $grupo = $request->get('grupo');

        $contatos = Contato::with('grupo')->orderBy('nome');

        if (!empty($nome)) {
            $contatos = $contatos->where('nome', 'like', "%$nome%");
        }
        if (!empty($grupo)) {
            $contatos = $contatos->where('id_grupo', '=', $grupo);
        }

        return $contatos;

    }

    public function all(Request $request) 
    {
        $contatos =  $this->index($request)->get();
        return response()->json($contatos, 200);
    } 

    public function pageable(Request $request) 
    {
        $size = (request()->get('size') != '') ? request()->get('size') : 200;
        $contatos =  $this->index($request)->paginate()->setSize($size);
        return response()->json($contatos, 200);
    }

    public function create(ContatoRequest $request)
    {
        $contato = Contato::create($request->all());
        return response()->json($contato, 201);
    }

    public function find(Contato $contato)
    {
        $contato = Contato::with('grupo')->find($contato->id);
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
