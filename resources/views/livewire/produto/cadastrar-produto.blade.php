
        <div class="w-100 m-auto">
            <div class="m-auto pb-4 card-branco">
                <div class="cabecalho_container">
                    <a class="a-com-hover-laranja">Novo Produto</a>
                </div>
                <div class="w-75 p-5 m-auto mt-4 bg-light border border-warning">
                    <form action="/produtos/cadastrar" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-sm-12">
                                <label for="codBarras" class="form-label">Código de Barras</label>
                                <input wire:model="codBarras" type="text" name="codBarras" id="codBarras" class="form-control" maxlength="10">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" name="nome" id="nome" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="descricao" class="form-label">Descrição</label>
                                <textarea rows="3" name="descricao" id="descricao" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="foto" class="form-label">Foto</label>
                                <img src="https://freesvg.org/img/mcol-open-box.png" alt="produto" width="200" height="200" class="m-4">
                                <input type="file" name="foto" id="foto" >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">
                                <label for="quantidade" class="form-label">Quantidade</label>
                                <input type="number" min="0" name="quantidade" id="quantidade" class="form-control">
                            </div>
                        </div>
                        
                        <div class="btn-group float-end">
                            <button type="submit" class="btn btn-warning py-0 mt-1 btn-sm botao-custom-texto-branco">
                                <i class="fas fa-paper-plane"></i>&nbsp;Enviar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

