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
    public function index()
    {

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
        $servicio = new Servicio();
        $servicio->descripcion_servicio = $request->get('descripcion_servicio');
        $servicio->precio = $request->get('precio');
        $servicio->save();
        return redirect()->route('usuarios');
    }

    public function estado(Request $request)
    {
        $servicio = Servicio::find($request->get('id'));
        if ($request->get('estado') == 'a') {
            $servicio->estado = 'i';
        } else {
            $servicio->estado = 'a';
        }
        $servicio->save();
        return redirect()->route('usuarios');
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
    public function update(Request $request, string $id)
    {
        //
        $servicio = Servicio::find($id);
        $servicio->descripcion_servicio = $request->get('descripcion_servicio');
        $servicio->precio = $request->get('precio');
        $servicio->save();
        return redirect()->route('usuarios');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicio $servicio)
    {
        //
    }
}
