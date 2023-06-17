<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\HistorialCliente;
use App\Models\RegistroServicio;
use App\Models\Servicio;
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
        //Obtener servicios y su precios de la base de datos
        $serviciosArray = explode(',', $request->get('servicios'));
        $total = 0;
        $servicioprecio = "";

        $resultados = Servicio::whereIn('descripcion_servicio', $serviciosArray)
               ->get();
        foreach ($resultados as $servicio) {
            in_array($servicio->descripcion_servicio, $serviciosArray) ? ($precio = $servicio->precio) : ($precio = 0);
            in_array($servicio->descripcion_servicio, $serviciosArray) ? ($serviciopreciounitario = $servicio->descripcion_servicio . " = $".$servicio->precio." ") : "";
            $servicioprecio .= $serviciopreciounitario;
            $total += $precio;
        }

        //Guardar servicio en la base de datos
        $descripcionservicio = "El empleado: " . $request->get('user') . ", realizo los servicios de: "
            . $servicioprecio . " ($" . $total . "), con el cliente: " . $request->get('cliente') . ", vehiculo: "
            . $request->get('vehiculo') . ", el dia: " . $request->get('fecha_servicio')." , hora: ". $request->get('hora_servicio').", comentarios: ". $request->get('comentarios');

        $registroServicio = new RegistroServicio();
        $registroServicio->servicio_diario_id = $request->get('servicio_diario_id');
        $registroServicio->descripcion_servicio_realizado = $descripcionservicio;
        $registroServicio->comentarios = $request->get('comentarios');
        $registroServicio->save();

        $registroHistorial = new HistorialCliente();
        $registroHistorial->cliente_id = $request->get('cliente_id');
        $registroHistorial->fecha_servicio = $request->get('fecha_servicio');
        $registroHistorial->descripcion_servicio_realizado = $descripcionservicio;
        $registroHistorial->save();

        // Modificar estado del servicio
        $clienteserviciodiario = ServicioDiario::find($request->get('servicio_diario_id'));
        $clienteserviciodiario->estado = 'ac';
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
