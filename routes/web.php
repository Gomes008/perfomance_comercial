<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultorController;
use App\Http\Controllers\ClienteController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ConsultorController::class, 'index']);
Route::get('/inicio',  [ConsultorController::class, 'inicio']);
Route::get('/consultores/relatorio', [ConsultorController::class, 'consultorRelatorio']);
Route::get('/consultores/grafico', [ConsultorController::class, 'consultorRelatorio']);
Route::get('/consultores/pizza', [ConsultorController::class, 'consultorRelatorio']);

Route::get('/clientes/relatorio', [ClienteController::class, 'clienteRelatorio']);
Route::get('/clientes/grafico', [ClienteController::class, 'clienteRelatorio']);
Route::get('/clientes/pizza', [ClienteController::class, 'clienteRelatorio']);





