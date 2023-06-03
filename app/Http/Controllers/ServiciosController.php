<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use App\Models\ServicioDiario;
use App\Models\Cliente;
use App\Models\RegistroServicio;

class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // Mostrar los servicios diarios programados para un día específico
    public function mostrarServiciosDiarios($fecha)
    {
        $serviciosDiarios = ServicioDiario::where('fecha', $fecha)->get();
        return view('servicios.mostrar', compact('serviciosDiarios'));
    }

    // Asignar clientes a un servicio diario
    public function asignarClientes($id)
    {
        $servicioDiario = ServicioDiario::find($id);
        $clientes = Cliente::all();
        return view('servicios.asignar_clientes', compact('servicioDiario', 'clientes'));
    }

    public function guardarClientes(Request $request, $id)
    {
        $servicioDiario = ServicioDiario::find($id);
        $servicioDiario->clientes()->sync($request->clientes);
        return redirect()->route('servicios.mostrar', $servicioDiario->fecha)->with('success', 'Cliente asignados correctamente.');
    }

    // Registrar un servicio realizado
    public function registrarServicio($id)
    {
        $servicioDiario = ServicioDiario::find($id);
        return view('servicios.registrar', compact('servicioDiario'));
    }

    public function guardarRegistro(Request $request, $id)
    {
        $registroServicio = new RegistroServicio;
        $registroServicio->servicios_diarios_id = $id;
        $registroServicio->descripcion = $request->descripcion;
        $registroServicio->comentarios = $request->comentarios;
        $registroServicio->save();
        return redirect()->route('servicios.mostrar', $registroServicio->servicioDiario->fecha)->with('success', 'Registro de servicio guardado correctamente.');
    }
    public function index()
    {
        $alumnos = Servicio::where('estado', 'a')->get();
        return view('servicios.registrar')->with('servicios', $alumnos);
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
    public function show(Servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servicio $servicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servicio $servicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicio $servicio)
    {
        //
    }
}