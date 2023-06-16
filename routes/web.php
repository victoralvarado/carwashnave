<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('auth.login');
});

Route::post('/register', UserController::class)->name('register');

Route::middleware([
    'auth:sanctum',
    'verified'
])->group(function () {

    Route::middleware(['role:administrador'])->group(function () {
        Route::get('usuarios', 'App\Http\Controllers\UserController@index')
        ->name('usuarios');

        Route::post('usuarios', 'App\Http\Controllers\UserController@habilitarInhabilitar')
        ->name('usuarios');

        Route::put('usuarios/{id}', 'App\Http\Controllers\UserController@update')
            ->name('usuarios.update');
    });

    Route::middleware(['role:administrador,recepcionista'])->group(function () {
        Route::get('clientes', 'App\Http\Controllers\ClientesController@index')
            ->name('clientes');

        Route::post('clientes', 'App\Http\Controllers\ClientesController@store')
            ->name('clientes');

        Route::delete('clientes/{id}', 'App\Http\Controllers\ClientesController@destroy')
            ->name('clientes.destroy');

        Route::put('clientes/{id}', 'App\Http\Controllers\ClientesController@update')
            ->name('clientes.update');


        Route::get('cobros', 'App\Http\Controllers\CobrosController@index')
            ->name('cobros');

        Route::post('cobros', 'App\Http\Controllers\CobrosController@generarFacturaPDF')
            ->name('cobros');


        Route::get('serviciosdiarios', 'App\Http\Controllers\ServiciosDiariosController@index')
            ->name('serviciosdiarios');

        Route::post('serviciosdiarios', 'App\Http\Controllers\ServiciosDiariosController@store')
            ->name('serviciosdiarios');

        Route::delete('serviciosdiarios/{id}', 'App\Http\Controllers\ServiciosDiariosController@destroy')
            ->name('serviciosdiarios.destroy');

        Route::put('serviciosdiarios/{id}', 'App\Http\Controllers\ServiciosDiariosController@update')
            ->name('serviciosdiarios.update');
    });



    Route::get('dashboard', 'App\Http\Controllers\ServiciosDiariosController@mostrarDatosUsuario')
        ->name('dashboard');

    Route::post('registroservicios', 'App\Http\Controllers\RegistroServiciosController@store')
        ->name('registroservicios');
});
