<?php

use App\Http\Controllers\ApiRevendaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//buscar todos os carro da revenda
Route::get('revenda',[ApiRevendaController::class,'index']);

//buscar 1 carro da revenda
Route::get('revenda/{id}',[ApiRevendaController::class,'show']);

//salvar o carro na revenda
Route::post('revenda', [ApiRevendaController::class, 'store']);

//atualizar o carro na revenda
Route::put('revenda/{id}', [ApiRevendaController::class, 'update']);

//deletar o carro na revenda
Route::delete('revenda/{id}', [ApiRevendaController::class,'destroy']);