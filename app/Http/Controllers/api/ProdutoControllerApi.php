<?php

namespace App\Http\Controllers\Api;

use App\Models\Produto as Produto;
use App\Http\Resources\ProdutoResource as ProdutoResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProdutoControllerApi extends Controller {

  public function index(){
    $produtos = Produto::paginate(15);
    return ProdutoResource::collection($produtos);
  }

  public function viewProduto($id){
    $produto = Produto::findOrFail( $id );
    return new ProdutoResource( $produto );
  }

  public function cadastrar(Request $request){
    $produto = new Produto;
    $produto->nome = $request->input('nome');
    $produto->descricao = $request->input('descricao');
    $produto->quantidade = $request->input('quantidade');

    if( $produto->save() ){
      return new ProdutoResource( $produto );
    }
  }

   public function editar(Request $request){
    $produto = Produto::findOrFail( $request->id );
    $produto->nome = $request->input('nome');
    $produto->descricao = $request->input('descricao');
    $produto->quantidade = $request->input('quantidade');

    if( $produto->save() ){
      return new ProdutoResource( $produto );
    }
  } 

  public function deletar($id){
    $produto = Produto::findOrFail( $id );
    if( $produto->delete() ){
      return new ProdutoResource( $produto );
    }

  }
}