<?php

namespace App\Http\Livewire\Produto;

use App\Models\Produto;
use Illuminate\Http\Request;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

class DetalhesProduto extends Component {
    
    public $produto;
    public $codBarras;
    public $nome;
    public $descricao;
    public $foto;
    public $quantidade;
    
    public function render() {
        return view('livewire.produto.detalhes-produto');
    }

    public function mount(Request $request) {
        $this->produto = Produto::findOrFail($request->id);
        $this->codBarras = $this->produto->cod_barras;
        $this->nome = $this->produto->nome;
        $this->descricao = $this->produto->descricao;
        $this->foto = $this->produto->foto;
        $this->quantidade = $this->produto->quantidade;
    }

    public function editar(Request $request){
        $imageName = '';
        if($request->hasFile('foto') && $request->file('foto')->isValid()){
            $requestImage = $request->foto;

            $ext = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $ext;
            $requestImage->move(public_path('img/produtos'), $imageName);
        }

        $this->produto = Produto::findOrFail($request->id);
        $this->produto->nome = $request->nome;
        $this->produto->descricao = $request->descricao;
        $this->produto->foto = $imageName;
        $this->produto->quantidade = $request->quantidade;
        $this->produto->update();
        return redirect()->route('visualizarProdutos');

    }

    public function deletar(Request $request){
        $this->produto = Produto::findOrFail($request->id);
        $this->produto->delete();
        return redirect()->route('visualizarProdutos');
    }
}