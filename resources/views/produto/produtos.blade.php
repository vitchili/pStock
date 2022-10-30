@extends('layouts.app')
@section('content')
<div class="w-full m-auto">
    <div class="containerSection">
        <div class="cabecalho_container pt-2">
            <i class="fa-sharp fa-solid fa-box"></i>&nbsp;<a class="a-com-hover-laranja">Produtos</a>
            <div class="btn-group float-end">
                <a href="/produtos/cadastrar" class="btn btn-light py-0 btn-sm botao-custom-texto-branco">
                    <i class="fas fa-plus-circle"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="mt-2">
        <form class="d-flex">
            <input wire:model="search" id="search" name="search"  class="form-control me-2" type="text" placeholder="Pesquisar produto" aria-label="Pesquisar produto">
            <button type="submit" class="btn btn-secondary">Pesquisar</button>
        </form>
    </div>
</div>

<div class="m-5 flexcard">
    @foreach($produtos as $produto)
    <div class="col-md-2 column productbox m-4">
        <img src="/img/produtos/{{$produto->foto}}" class="imgProduto">
        <div class="producttitle">{{$produto->nome}}</div>
        <div class="productprice">
            <div class="mb-2">
                <a href="/produtos/produto/{{$produto->id}}" class="btn btn-warning btn-sm" role="button">Detalhes</a>
            </div>
            <div class="pricetext">
                @php
                $generatorSVG = new Picqer\Barcode\BarcodeGeneratorSVG();
                echo
                $generatorSVG->getBarcode(
                $produto->cod_barras,
                $generatorSVG::TYPE_CODE_128
                );
                @endphp

            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection