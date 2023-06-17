<?php

namespace App\Http\Controllers;

use App\Models\Cobro;
use App\Models\Servicio;
use App\Models\ServicioDiario;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CobrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $servicios = Servicio::where('estado', 'a')->get();

        $serviciosdiarioscobros = ServicioDiario::join('cliente_servicio_diarios', 'servicio_diarios.id', '=', 'cliente_servicio_diarios.servicio_diario_id')
            ->join('users', 'servicio_diarios.user_id', '=', 'users.id')
            ->join('clientes', 'cliente_servicio_diarios.cliente_id', '=', 'clientes.id')
            ->where('servicio_diarios.estado', '=', 'ac')
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
                'clientes.tipo_vehiculo',
            )
            ->get();


        return view('cobros.index', compact('serviciosdiarioscobros', 'servicios'));
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
    public function show(Cobro $cobro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cobro $cobro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cobro $cobro)
    {
        //
    }

    public function generarFacturaPDF(Request $request)
    {
        $total = $request->get('total');
        $cliente = $request->get('cliente');
        $serviciosArray = explode(',', $request->get('servicios'));
        $resultados = Servicio::whereIn('descripcion_servicio', $serviciosArray)
        ->get();
        $data = [
            'total' => $total,
            'cliente' => $cliente,
            'servicios' => $resultados,
        ];
        $clienteserviciodiario = ServicioDiario::find($request->get('id'));
        $clienteserviciodiario->estado = 'i';

        $clienteserviciodiario->save();

        $pdf = Pdf::loadView('pdf.factura', $data);
        return $pdf->stream('factura.pdf');
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

        return redirect()->route('cobros');
    }
}
