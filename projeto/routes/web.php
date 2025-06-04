<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AvaliacaoFisicaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\InstrutorController;
use App\Http\Controllers\PlanoController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\ResultadoController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RoleAdmMiddleware;
use App\Http\Middleware\RoleCliMiddleware;

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
    return view('/login');
});

Route::get('/matriculas/{id}/pagar', [MatriculaController::class, 'efetuarPagamento'])->name('matriculas.pagar');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::resource("users", UserController::class);

Route::middleware('auth')->group(function() {
    Route::get('/user', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/user', [UserController::class, 'update']);

    Route::middleware([RoleAdmMiddleware::class])->group(
        function (){
            Route::get('/dashboard-adm', function(){
                return view('dashboard-adm');
            });

            Route::resource("clientes", ClienteController::class);
            Route::resource('instrutores', InstrutorController::class);
            Route::resource('planos', PlanoController::class);
            Route::resource('matriculas', MatriculaController::class);
            Route::resource("avaliacaofisica", AvaliacaoFisicaController::class);
            Route::resource("resultados", ResultadoController::class);
        }
    );

    Route::middleware([RoleCliMiddleware::class])->group(function(){
        Route::get('/dashboard-cli', function(){
            return view('dashboard-cli');
        });
    });

    Route::post('/logout', [AuthController::class, 'logout']);
});