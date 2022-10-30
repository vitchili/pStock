<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProdutoControllerApi;

Route::get('/produtos', [ProdutoControllerApi::class, 'index'])->name('visualizarProdutos');
Route::get('/produtos/produto/{id}', [ProdutoControllerApi::class, 'viewProduto']);
Route::post('/produtos/cadastrar', [ProdutoControllerApi::class, 'cadastrar']);
Route::put('/produtos/produto/{id}/editar', [ProdutoControllerApi::class, 'editar']);
Route::delete('/produtos/produto/{id}/deletar', [ProdutoControllerApi::class, 'deletar']);
