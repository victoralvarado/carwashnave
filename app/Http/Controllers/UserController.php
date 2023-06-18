<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ])->validate();



        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'empleado',
            // Valor por defecto
            'estado' => 'i', // Valor por defecto
        ]);

        \Illuminate\Support\Facades\Session::flash('success', '¡Registro exitoso! Tu cuenta está pendiente de activación.');

        return redirect('/');
    }

    public function index()
    {
        //obtener los users con estado diferente a e
        $usuarios = User::where('estado', '!=', 'e')->paginate(5);
        $servicios = Servicio::where('estado', '!=', 'e')->get();
        return view('usuarios.index', compact('usuarios', 'servicios'));
    }


    public function habilitarInhabilitar(Request $request)
    {
        $usuario = User::find($request->get('id'));
        if ($request->get('estado') == 'a') {
            $usuario->estado = 'i';
        } else {
            $usuario->estado = 'a';
        }
        $usuario->save();
        return redirect()->route('usuarios');
    }


    public function update(Request $request, string $id)
    {
        //
        $usuario = User::find($id);
        $usuario->role = $request->get('role');
        $usuario->save();
        return redirect()->route('usuarios');
    }


    //eliminado logico de users
    public function destroy(string $id)
    {
        if ($id === 1) {
            return redirect()->route('usuarios');
        } else {
            $usuario = User::find($id);
            $usuario->estado = 'e';

            $usuario->save();
        }

        return redirect()->route('usuarios');
    }

}
