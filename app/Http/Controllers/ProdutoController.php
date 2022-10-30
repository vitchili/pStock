<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

class ProdutoController extends Controller {
    public $produto;
    public $codBarras;
    public $nome;
    public $descricao;
    public $foto;
    public $quantidade;


    public function index(Request $request) {
        if (empty($request->search)) {
            $this->produtos = Produto::all();
        } else {
            $this->produtos = Produto::where('nome', 'LIKE', "%{$request->search}%")->orWhere('descricao', 'LIKE', "%{$request->search}%")->get();
        }
        return view('produto.produtos', [
            'produtos' => $this->produtos
        ]);
    }

    public function viewProduto(Request $request) {
        $this->produto = Produto::findOrFail($request->id);
        $this->codBarras = $this->produto->cod_barras;
        $this->nome = $this->produto->nome;
        $this->descricao = $this->produto->descricao;
        $this->foto = $this->produto->foto;
        $this->quantidade = $this->produto->quantidade;
        return view('produto.detalhes-produto',[
            'produto' => $this->produto,
            'codBarras' => $this->codBarras,
        ]);
    }

    public function viewCadastrar() {
        return view('produto.cadastrar-produto');
    }


    public function generatePDF(Request $request) {
        $produto = Produto::findOrFail($request->id);
        $data = [
            "codBarras" => $produto->cod_barras,
            "nome" => $produto->nome,
            "descricao" => $produto->descricao,
            "foto" => $produto->foto,
            "quantidade" => $produto->quantidade,
        ];


        $pdf = Pdf::loadView('produto.produtoPDF', compact('data'));
        return $pdf->download('produtoPDF.pdf');
    }

    public function cadastrar(Request $request) {
        $this->codBarras = $request->codBarras;
        $this->nome = $request->nome;
        $this->descricao = $request->descricao;
        $this->foto = $request->foto;
        $this->quantidade = $request->quantidade;

        $imageName = '';
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
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


    public function editar(Request $request) {
        $imageName = '';
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
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

    public function deletar(Request $request) {
        $this->produto = Produto::findOrFail($request->id);
        $this->produto->delete();
        return redirect()->route('visualizarProdutos');
    }
}
