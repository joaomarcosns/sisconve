<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\LoginController;
use App\Models\EnderecoCliente;
use Illuminate\Support\Facades\Route;



Route::get('/', [LoginController::class, 'index']);

Route::prefix('login')->group(function () {
    Route::get('/', [LoginController::class, 'create'])->name('login.create');
    Route::post('/loginStore', [LoginController::class, 'store'])->name('login.store');
    Route::get('/logout', [LoginController::class, 'destroy'])->name('login.destroy');
});

Route::prefix("dashboard")->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
});

Route::prefix("cliente")->group(function () {
    Route::get('/', [ClientesController::class, 'index'])->name('cliente.index');
    Route::get('/create', [ClientesController::class, 'create'])->name('cliente.create');
    Route::post('/store', [ClientesController::class, 'store'])->name('cliente.store');
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
