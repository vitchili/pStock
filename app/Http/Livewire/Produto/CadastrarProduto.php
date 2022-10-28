<?php

namespace App\Http\Livewire\Produto;

use App\Models\Produto;
use Livewire\Component;
use Illuminate\Http\Request;

class CadastrarProduto extends Component
{
    public $codBarras;
    public $nome;
    public $descricao;
    public $foto;
    public $quantidade;

    public function render()
    {
        return view('livewire.produto.cadastrar-produto');
    }

    public function cadastrar(Request $request){
        $this->codBarras = $request->codBarras;
        $this->nome = $request->nome;
        $this->descricao = $request->descricao;
        $this->foto = $request->foto;
        $this->quantidade = $request->quantidade;
        
        if($request->hasFile('foto') && $request->file('foto')->isValid()){
            $requestImage = $request->foto;

            $ext = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $ext;
            $requestImage->move(public_path('img/produtos'), $imageName);
        }
        
        $produto = new Produto();
        $produto->cod_barras = $request->codBarras;
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->foto = $imageName;
        $produto->quantidade = $request->quantidade;
        $produto->save();

        
        return redirect()->route('visualizarProdutos');
    }
}
