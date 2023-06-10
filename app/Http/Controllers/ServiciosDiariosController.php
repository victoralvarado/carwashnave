<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use App\Models\ClienteServicioDiario;
use App\Models\ServicioDiario;
use Illuminate\Support\Facades\Auth;
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
        $servicios = Servicio::where('estado', 'a')->get();

        $clientes = Cliente::where('estado', 'a')->get();

        $users = User::where('role', 'empleado')
            ->where('estado', 'a')
            ->get();

        $serviciosdiariosI = ServicioDiario::join('cliente_servicio_diarios', 'servicio_diarios.id', '=', 'cliente_servicio_diarios.servicio_diario_id')
            ->join('users', 'servicio_diarios.user_id', '=', 'users.id')
            ->join('clientes', 'cliente_servicio_diarios.cliente_id', '=', 'clientes.id')
            ->where('servicio_diarios.estado', '=', 'a')
            ->select(
                'servicio_diarios.id',
                'servicio_diarios.fecha',
                'servicio_diarios.hora',
                'servicio_diarios.servicios',
                'users.name',
                'users.id as id_user',
                'clientes.nombre',
                'clientes.apellido',
                'clientes.id as id_cliente',
                'clientes.tipo_vehiculo'
            )
            ->get();

        return view('serviciosdiarios.index', compact('servicios', 'clientes', 'users', 'serviciosdiariosI'));
    }


    public function mostrarDatosUsuario()
    {
        $userId = Auth::id();
        $user = User::findOrFail($userId);

        $serviciosDiarios = $user->serviciosDiarios()
            ->join('cliente_servicio_diarios', 'servicio_diarios.id', '=', 'cliente_servicio_diarios.servicio_diario_id')
            ->join('users', 'servicio_diarios.user_id', '=', 'users.id')
            ->join('clientes', 'cliente_servicio_diarios.cliente_id', '=', 'clientes.id')
            ->where('servicio_diarios.estado', '=', 'a')
            ->select(
                'servicio_diarios.id',
                'servicio_diarios.fecha',
                'servicio_diarios.hora',
                'servicio_diarios.servicios',
                'users.name',
                'users.id as id_user',
                'clientes.nombre',
                'clientes.apellido',
                'clientes.id as id_cliente',
                'clientes.tipo_vehiculo'
            )
            ->get();


        $serviciosDiariosTodos = ServicioDiario::join('cliente_servicio_diarios', 'servicio_diarios.id', '=', 'cliente_servicio_diarios.servicio_diario_id')
            ->join('users', 'servicio_diarios.user_id', '=', 'users.id')
            ->join('clientes', 'cliente_servicio_diarios.cliente_id', '=', 'clientes.id')
            ->where('servicio_diarios.estado', '=', 'a')
            ->select(
                'servicio_diarios.id',
                'servicio_diarios.fecha',
                'servicio_diarios.hora',
                'servicio_diarios.servicios',
                'users.name',
                'users.id as id_user',
                'clientes.nombre',
                'clientes.apellido',
                'clientes.id as id_cliente',
                'clientes.tipo_vehiculo'
            )
            ->get();
        return view('dashboard', compact('serviciosDiarios', 'serviciosDiariosTodos'));
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
        $servicios = $request->get('servicios');
        $serviciosString = implode(',', $servicios);
        // Agregar servicio diario y obtener el ID
        $servicioDiario = new ServicioDiario;
        $servicioDiario->fecha = $request->get('fecha');
        $servicioDiario->hora = $request->get('hora');
        $servicioDiario->user_id = $request->get('user_id');
        $servicioDiario->servicios = $serviciosString;
        $servicioDiario->save();
        $servicioDiarioId = $servicioDiario->id;

        // Agregar cliente servicio diario
        $clienteserviciodiario = new ClienteServicioDiario();

        $clienteserviciodiario->cliente_id = $request->get('cliente_id');
        $clienteserviciodiario->servicio_diario_id = $servicioDiarioId;

        $clienteserviciodiario->save();

        return redirect()->route('serviciosdiarios');
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
        $servicios = $request->get('servicios'.''.$id);
        $serviciosString = implode(',', $servicios);

        $clienteserviciodiario = ServicioDiario::find($id);
        $clienteserviciodiario->fecha = $request->get('fecha');
        $clienteserviciodiario->hora = $request->get('hora');
        $clienteserviciodiario->user_id = $request->get('user_id');
        $clienteserviciodiario->servicios = $serviciosString;
        $clienteserviciodiario->save();

        return redirect()->route('serviciosdiarios');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $clienteserviciodiario = ServicioDiario::find($id);
        $clienteserviciodiario->estado = 'ac';

        $clienteserviciodiario->save();

        return redirect()->route('serviciosdiarios');
    }
}
