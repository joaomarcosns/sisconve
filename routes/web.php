<?php

use App\Http\Controllers\CaixaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\VendaController;
use Illuminate\Support\Facades\Route;



Route::get('/', [LoginController::class, 'index']);

Route::prefix('login')->group(function () {
    Route::get('/', [LoginController::class, 'create'])->name('login.create');
    Route::post('/loginStore', [LoginController::class, 'store'])->name('login.store');
    Route::get('/logout', [LoginController::class, 'destroy'])->name('login.destroy');
});

Route::prefix("dashboard")->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/graficoUm', [DashboardController::class, 'graficoUm'])->name('dashboard.graficoUm');
});

Route::prefix("cliente")->group(function () {
    Route::get('/', [ClientesController::class, 'index'])->name('cliente.index');
    Route::get('/create', [ClientesController::class, 'create'])->name('cliente.create');
    Route::post('/store', [ClientesController::class, 'store'])->name('cliente.store');
    Route::get('/show/{id}',[ClientesController::class, 'show'])->name('cliente.show');
    Route::get('/edit/{id}', [ClientesController::class, 'edit'])->name('cliente.edit');
    Route::post('/update/{id}', [ClientesController::class, 'update'])->name('cliente.update');
    Route::get('/destroy/{id}', [ClientesController::class, 'destroy'])->name('cliente.destroy');
});

Route::prefix('fornecedor')->group(function () {
    Route::get('/', [FornecedorController::class, 'index'])->name('fornecedor.index');
    Route::get('/create', [FornecedorController::class, 'create'])->name('fornecedor.create');
    Route::post('/store', [FornecedorController::class, 'store'])->name('fornecedor.store');
    Route::get('/show/{id}', [FornecedorController::class, 'show'])->name('fornecedor.show');
    Route::get('/edit/{id}', [FornecedorController::class, 'edit'])->name('fornecedor.edit');
    Route::put('/update/{id}', [FornecedorController::class, 'update'])->name('fornecedor.update');
    Route::delete('/destroy/{id}', [FornecedorController::class, 'destroy'])->name('fornecedor.destroy'); 
});

Route::prefix('categoria')->group(function () {
    Route::get('/', [CategoriaController::class, 'index'])->name('categoria.index');
    Route::get('/create', [CategoriaController::class, 'create'])->name('categoria.create');
    Route::post('/store', [CategoriaController::class, 'store'])->name('categoria.store');
    Route::get('/show/{id}', [CategoriaController::class, 'show'])->name('categoria.show');
    Route::get('/edit/{id}', [CategoriaController::class, 'edit'])->name('categoria.edit');
    Route::put('/update/{id}', [CategoriaController::class, 'update'])->name('categoria.update');
    Route::delete('/destroy/{id}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');
});

Route::prefix('produto')->group(function () {
    Route::get('/', [ProdutosController::class, 'index'])->name('produto.index');
    Route::get('/create', [ProdutosController::class, 'create'])->name('produto.create');
    Route::post('/store', [ProdutosController::class, 'store'])->name('produto.store');
    Route::get('/show/{id}', [ProdutosController::class, 'show'])->name('produto.show');
    Route::get('/edit/{id}', [ProdutosController::class, 'edit'])->name('produto.edit');
    Route::put('/update/{id}', [ProdutosController::class, 'update'])->name('produto.update');
    Route::delete('/destroy/{id}', [ProdutosController::class, 'destroy'])->name('produto.destroy');
});

Route::prefix('venda')->group(function () {
    Route::get('/', [VendaController::class, 'index'])->name('venda.index');
    Route::get('/create', [VendaController::class, 'create'])->name('venda.create');
});

Route::prefix('compra')->group(function () {
    Route::get('/', [CompraController::class, 'index'])->name('compra.index');
    Route::get('/create', [CompraController::class, 'create'])->name('compra.create');
});

Route::prefix('funcionario')->group(function () {
    Route::get('/', [FuncionarioController::class, 'index'])->name('funcionario.index');
    Route::get('/create', [FuncionarioController::class, 'create'])->name('funcionario.create');
});

Route::prefix('caixa')->group(function () {
    Route::get('/', [CaixaController::class, 'index'])->name('caixa.index');
    Route::get('/create', [CaixaController::class, 'create'])->name('caixa.create');
});
