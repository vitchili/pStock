<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Produto;

class ProdutoPDFController extends Controller
{
    public function generatePDF(Request $request){
        $produto = Produto::findOrFail($request->id);
        $data = [
            "codBarras" => $produto->cod_barras,
            "nome" => $produto->nome,
            "descricao" => $produto->descricao,
            "foto" => $produto->foto,
            "quantidade" => $produto->quantidade,
        ];


        $pdf = Pdf::loadView('livewire.produto.produtoPDF', compact('data'));
        return $pdf->download('produtoPDF.pdf');
    }
}
