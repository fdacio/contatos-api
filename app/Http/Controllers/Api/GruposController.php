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
        dd($request);
        try {
            $grupo = Grupo::create($request->all());
            return response()->json($grupo, 201);
        } catch (Exception $e) {
            return response()->json($e, 401);
        }   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
