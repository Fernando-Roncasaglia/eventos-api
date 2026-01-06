<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\BarController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\MovimentacaoController;
use App\Http\Controllers\UnidadeController;

Route::apiResource('eventos', EventoController::class);
Route::apiResource('produtos', ProdutoController::class);
Route::apiResource('bares', BarController::class);
Route::apiResource('unidades', UnidadeController::class);

Route::prefix('estoques')->group(function () {
    Route::get('/', [EstoqueController::class, 'index']);
    Route::post('/entrada', [EstoqueController::class, 'entrada']);
    Route::post('/saida', [EstoqueController::class, 'saida']);
});


Route::get('movimentacoes', [MovimentacaoController::class, 'index']);
Route::get('movimentacoes/{id}', [MovimentacaoController::class, 'show']);