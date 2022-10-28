<?php

namespace App\Http\Livewire\Produto;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Produto;

class VisualizarProdutos extends Component
{
    public $produtos;
    public $search;

    public function render(Request $request)
    {
        return view('livewire.produto.produtos');
    }

    public function mount(Request $request){
        if(!isset($request->search) && empty($request->search)){
            $this->produtos = Produto::all();
        }else{
            $this->produtos = Produto::where('nome', 'LIKE', "%{$request->search}%")->orWhere('descricao', 'LIKE', "%{$request->search}%")->get();
        }
    }

}
