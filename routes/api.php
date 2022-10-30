<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Produto\A;
Route::get('api/produtos', [ProdutosAPIController::class, 'index']);