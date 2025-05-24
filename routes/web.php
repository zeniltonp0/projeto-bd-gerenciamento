<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FinanceiroController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
Route::get('/financeiro', [FinanceiroController::class, 'index'])->name('financeiro.index');


Route::post('/pedidos/store', [PedidoController::class, 'store'])->name('pedidos.store');
Route::post('/produtos/store', [ProdutoController::class, 'store'])->name('produtos.store');