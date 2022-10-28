<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Produto;

class Dashboard extends Component {
    public $produtos;
    public function render() {
        return view('livewire.dashboard.dashboard');
    }

    public function mount() {
        $this->produtos = Produto::all();
    }
}
