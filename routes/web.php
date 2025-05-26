<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FinanceiroController;
use App\Http\Controllers\FuncionarioController;
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
Route::post('/financeiro/store', [FinanceiroController::class, 'store'])->name('financeiro.store');
Route::post('/financeiro/store_mp', [FinanceiroController::class, 'storeMp'])->name('financeiro.store.mp');

Route::get('/financeiro/funcionarios/{funcionario}/edit', [FinanceiroController::class, 'editFuncionario'])->name('financeiro.funcionarios.edit');
Route::put('/financeiro/funcionarios/{funcionario}', [FinanceiroController::class, 'updateFuncionario'])->name('financeiro.funcionarios.update');
Route::delete('/financeiro/funcionarios/{funcionario}', [FinanceiroController::class, 'destroyFuncionario'])->name('financeiro.funcionarios.destroy');

Route::get('/financeiro/materiaprima/{materiaPrima}/edit', [FinanceiroController::class, 'editMateriaPrima'])->name('financeiro.materiaprima.edit');
Route::put('/financeiro/materiaprima/{materiaPrima}', [FinanceiroController::class, 'updateMateriaPrima'])->name('financeiro.materiaprima.update');
Route::delete('/financeiro/materiaprima/{materiaPrima}', [FinanceiroController::class, 'destroyMateriaPrima'])->name('financeiro.materiaprima.destroy');

Route::get('/produtos/{produto}/edit', [ProdutoController::class, 'edit'])->name('produtos.edit');
Route::put('/produtos/{produto}', [ProdutoController::class, 'update'])->name('produtos.update');
Route::delete('/produtos/{produto}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');