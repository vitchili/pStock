@extends('layouts.app')
@section('content')
<div class="w-100 m-auto">
    <div class="m-auto pb-4 card-branco">
        <div class="cabecalho_container">
            <a class="a-com-hover-laranja">Visualizar/Editar Produto</a>
        </div>

        <div class="w-75 p-5 m-auto mt-4 bg-light border border-warning">
            <div class="float-end mb-2">
                <form action="/produtos/produto/{{$produto->id}}/generatePDF" method="POST" class="mt-1">
                    @csrf    
                    <button type="submit" class="btn btn-info py-0 mt-1 btn-sm botao-custom-texto-branco">
                        Gerar PDF
                    </button>
                </form>
            </div>
            <form action="/produtos/produto/{{$produto->id}}/editar" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="col-sm-12">
                        <label for="codBarras" class="form-label">Código de Barras</label>
                        <input wire:model="codBarras" disabled="disabled" type="text" name="codBarras" id="codBarras" class="form-control" maxlength="10" value="{{$codBarras}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="nome" class="form-label">Nome</label>
                        <input wire:model="nome" type="text" name="nome" id="nome" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="descricao" class="form-label">Descrição</label>
                        <textarea wire:model="descricao" rows="3" name="descricao" id="descricao" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="foto" class="form-label">Foto</label>
                        <img src="/img/produtos/{{$produto->foto}}" alt="produto" width="200" height="200" class="m-4">
                        <input type="file" name="foto" id="foto">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3">
                        <label for="quantidade" class="form-label">Quantidade</label>
                        <input wire:model="quantidade" type="number" min="0" name="quantidade" id="quantidade" class="form-control">
                    </div>
                </div>

                <div class="btn-group float-end mt-2">
                    <button type="submit" class="btn btn-success py-0 mt-1 btn-sm botao-custom-texto-branco">
                        Salvar Edição
                    </button>
                    &nbsp;

                </div>
            </form>

            <form action="/produtos/produto/{{$produto->id}}/deletar" method="POST" class="mt-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger py-0 mt-1 btn-sm botao-custom-texto-branco">
                    Deletar Produto
                </button>
            </form>
        </div>
    </div>
</div>
@endsection