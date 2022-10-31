<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

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

/*PRODUTOS*/
Route::get('/', [ProdutoController::class, 'index'])->name('visualizarProdutos');
Route::get('/produtos', [ProdutoController::class, 'index'])->name('visualizarProdutos');
Route::get('/produtos/produto/{id}', [ProdutoController::class, 'viewProduto']);
Route::get('/produtos/cadastrar', [ProdutoController::class, 'viewCadastrar']);
Route::post('/produtos/cadastrar', [ProdutoController::class, 'cadastrar']);
Route::post('/produtos/importar', [ProdutoController::class, 'importar']);
Route::post('/produtos/produto/{id}/generatePDF', [ProdutoController::class, 'generatePDF']);
Route::put('/produtos/produto/{id}/editar', [ProdutoController::class, 'editar']);
Route::delete('/produtos/produto/{id}/deletar', [ProdutoController::class, 'deletar']);

/*DASHBOARD*/
Route::get('/dashboard', [DashboardController::class, ''])->name('dashboard');
