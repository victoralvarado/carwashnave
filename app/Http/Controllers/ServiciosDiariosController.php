<?php

namespace App\Http\Controllers;

use App\Models\ClienteServicioDiario;
use App\Models\ServicioDiario;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ServiciosDiariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $serviciosdiarios = ServicioDiario::where('estado', 'a')->get();
        return view('serviciosdiarios.index')->with('serviciosdiarios', $serviciosdiarios);
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
        // Agregar servicio diario y obtener el ID
        $serviciodiarioId = ServicioDiario::table('servicio_diarios')->insertGetId([
            'fecha' => $request->get('fecha'),
            'hora' => $request->get('hora'),
            'hora' => $request->get('hora'),
            'user_id' => $request->get('user_id'),
            'servicio_id' => $request->get('servicio_id'),
        ]);

        // Agregar cliente servicio diario
        $clienteserviciodiario = new ClienteServicioDiario();

        $clienteserviciodiario->cliente_id = $request->get('cliente_id');
        $clienteserviciodiario->servicio_diario_id = $serviciodiarioId;

        $clienteserviciodiario->save();

        return redirect()->route('serviciosdiarios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $clienteserviciodiario = ServicioDiario::find($id);
        $clienteserviciodiario->fecha = $request->get('fecha');
        $clienteserviciodiario->hora = $request->get('hora');
        $clienteserviciodiario->user_id = $request->get('user_id');
        $clienteserviciodiario->servicio_id = $request->get('servicio_id');
        $clienteserviciodiario->save();

        return redirect()->route('serviciosdiarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $clienteserviciodiario = ServicioDiario::find($id);
        $clienteserviciodiario->estado = 'i';

        $clienteserviciodiario->save();

        return redirect()->route('serviciosdiarios.index');
    }
}
