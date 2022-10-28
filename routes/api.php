<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ProdutosAPIController;

Route::get('api/produtos', [ProdutosAPIController::class, 'index']);