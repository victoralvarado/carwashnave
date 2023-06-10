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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    'verified'
])->group(function () {
    Route::get('serviciosdiarios', 'App\Http\Controllers\ServiciosDiariosController@index')
        ->name('serviciosdiarios');

    Route::post('serviciosdiarios', 'App\Http\Controllers\ServiciosDiariosController@store')
        ->name('serviciosdiarios');

    Route::delete('serviciosdiarios/{id}', 'App\Http\Controllers\ServiciosDiariosController@destroy')
        ->name('serviciosdiarios.destroy');

    Route::put('serviciosdiarios/{id}', 'App\Http\Controllers\ServiciosDiariosController@update')
        ->name('serviciosdiarios.update');
});

Route::middleware([
    'auth:sanctum',
    'verified'
])->group(function () {
    Route::get('clientes', 'App\Http\Controllers\ClientesController@index')
        ->name('clientes');

    Route::post('clientes', 'App\Http\Controllers\ClientesController@store')
        ->name('clientes');

    Route::delete('clientes/{id}', 'App\Http\Controllers\ClientesController@destroy')
        ->name('clientes.destroy');

    Route::put('clientes/{id}', 'App\Http\Controllers\ClientesController@update')
        ->name('clientes.update');
});


Route::middleware([
    'auth:sanctum',
    'verified'
])->group(function () {
    Route::get('dashboard', 'App\Http\Controllers\ServiciosDiariosController@mostrarDatosUsuario')
        ->name('dashboard');
});
