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

Route::resource('serviciosdiarios', 'App\Http\Controllers\ServiciosDiariosController');
/*
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\ServiciosDiariosController@mostrarDatosUsuario')
        ->name('dashboard');
});



Route::middleware([
    'auth:sanctum',
    'verified'
])->group(function () {
    Route::get('serviciosdiarios', 'App\Http\Controllers\ServiciosDiariosController@index')
        ->name('serviciosdiarios');
});
