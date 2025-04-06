<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\InstrutorController;
use App\Http\Controllers\PlanoController;
use App\Http\Controllers\MatriculaController;



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

Route::resource('instrutores', InstrutorController::class);

Route::resource('planos', PlanoController::class);

Route::resource('matriculas', MatriculaController::class);

Route::get('/matriculas/{id}/pagar', [MatriculaController::class, 'formPagamento'])->name('matriculas.pagar');
Route::post('/matriculas/{id}/pagar', [MatriculaController::class, 'efetuarPagamento'])->name('matriculas.efetuarPagamento');

