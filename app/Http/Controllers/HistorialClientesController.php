<?php

namespace App\Http\Controllers;

use App\Models\HistorialCliente;
use Illuminate\Http\Request;

class HistorialClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $historialClientes = HistorialCliente::join('clientes', 'historial_clientes.cliente_id', '=', 'clientes.id')
        ->select(
            'historial_clientes.id',
            'historial_clientes.fecha_servicio',
            'clientes.nombre',
            'clientes.apellido',
            'historial_clientes.descripcion_servicio_realizado',
            'historial_clientes.created_at'
        )
        ->orderBy('historial_clientes.created_at', 'desc')
        ->paginate(10);
        return view('historial.index', compact('historialClientes'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(HistorialCliente $historialCliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HistorialCliente $historialCliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HistorialCliente $historialCliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HistorialCliente $historialCliente)
    {
        //
    }
}
