<?php

namespace App\Http\Controllers;

use App\Models\Produto;

class DashboardController extends Controller {
    public $produtos;
    public function index() {
        return view('dashboard.dashboard');
    }

    public function __invoke() {
        $this->produtos = Produto::all();
    }
}
