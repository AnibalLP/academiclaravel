<?php

namespace App\Http\Controllers;

use App\Models\docentes;
use Illuminate\Http\Request;

class DocentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docente=docentes::all(['id','nombre','apellido','direccion','telefono','catedra']);
        return Response()->json($docente);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $docentes = docentes::create($request->post());
        return Response()->json([
            'message'=>'docente agregado',
            'docente'=>$docentes
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\docentes  $docentes
     * @return \Illuminate\Http\Response
     */
    public function show(docentes $docente)
    {
        return Response()->json($docentes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\docentes  $docentes
     * @return \Illuminate\Http\Response
     */
    public function edit(docentes $docente)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\docentes  $docentes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, docentes $docente)
    {
        $docente->fill($request->post())-save();
        return Response()->json([
            'message'=>'modificado exitosamente',
            'docente'=>$docentes
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\docentes  $docentes
     * @return \Illuminate\Http\Response
     */
    public function destroy(docentes $docentes)
    {
        $docentes->delete();
        return Response()->json(['message'=>'docente eliminado']);
    }
}
