<?php

namespace App\Http\Controllers;

use App\Models\RegistroServicio;
use App\Models\ServicioDiario;
use Illuminate\Http\Request;

class RegistroServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $registroServicio = RegistroServicio::where('estado', 'a')->get();
        return view('dashboard')->with('registroservicio', $registroServicio);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Guardar servicio en la base de datos
        $registroServicio = new RegistroServicio();

        $registroServicio->servicio_diario_id = $request->servicio_diario_id;
        $registroServicio->descripcion_servicio_realizado = $request->descripcion_servicio_realizado;
        $registroServicio->comentarios = $request->comentarios;

        // Modificar estado del servicio
        $clienteserviciodiario = ServicioDiario::find($request->servicio_diario_id);
        $clienteserviciodiario->estado = 'i';

        $registroServicio->save();
        $clienteserviciodiario->save();

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(RegistroServicio $registroServicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RegistroServicio $registroServicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RegistroServicio $registroServicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RegistroServicio $registroServicio)
    {
        //
    }
}
