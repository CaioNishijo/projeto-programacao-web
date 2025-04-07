<?php

use App\Http\Controllers\AvaliacaoFisicaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ResultadoController;

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
    return view('welcome');
});

Route::resource("clientes", ClienteController::class);
Route::resource("avaliacaofisica", AvaliacaoFisicaController::class);
Route::resource("resultados", ResultadoController::class);