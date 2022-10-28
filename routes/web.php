<?php

use App\Http\Livewire\Dashboard\Dashboard;
use App\Http\Livewire\Produto\CadastrarProduto;
use App\Http\Livewire\Produto\DetalhesProduto;
use App\Http\Controllers\ProdutoPDFController;
use App\Http\Livewire\Produto\VisualizarProdutos;
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
Route::get('/', VisualizarProdutos::class)->name('visualizarProdutos');
Route::get('/produtos', VisualizarProdutos::class)->name('visualizarProdutos');
Route::get('/produtos/produto/{id}', DetalhesProduto::class);
Route::get('/produtos/cadastrar', CadastrarProduto::class);
Route::post('/produtos/cadastrar', [CadastrarProduto::class, 'cadastrar']);
Route::post('/produtos/produto/{id}/generatePDF', [ProdutoPDFController::class, 'generatePDF']);
Route::put('/produtos/produto/{id}/editar', [DetalhesProduto::class, 'editar']);
Route::delete('/produtos/produto/{id}/deletar', [DetalhesProduto::class, 'deletar']);

/*DASHBOARD*/
Route::get('/dashboard', Dashboard::class)->name('dashboard');
