<link rel="stylesheet" href="{{ asset('css/modal/cadastro-cliente.css') }} ">
<div class="modal fade" id="create-contatos-modal" tabindex="-1" aria-labelledby="create-contatosLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-cad-cliente modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header float-right">
                <h5>Cadastrar cliente</h5>
                <div class="modal-header d-block modal-header-add-items float-right">
                    <div class="close-modal">
                        <img data-dismiss="modal" data-bs-dismiss="modal" src="{{ asset("img/block-icon-black.svg")}}" alt="Fechar">
                    </div>
                </div>
            </div>
            <div class="form">
                <form autocomplete="off" name="formCadastarCleinte" id="formCadastarCleinte">
                    <div class="input-ddd-tel-cpf">
                        <div class="input input-catagoria" id="email">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" style="width: 110%">
                        </div>
                        <div class="input input-ddd" id="ddd">
                            <label for="ddd">DDD</label>
                            <input type="text" name="ddd" maxlength="2" placeholder="38" class="form-control ddd">
                        </div>
                        <div class="input input-num-telefone" id="telefone">
                            <label for="num_telefone">Telefone</label>
                            <input type="text" name="telefone" placeholder="9 12345678" class="form-control phone">
                        </div>
                    </div>                    
                    {{--  --}}
                    <div class="modal-footer">
                        <button type="button" class="close" data-dismiss="modal" data-bs-dismiss="modal">
                            Cancelar
                            <img src="{{ asset("img/block-icon.svg")}}" alt="Cancelar">
                        </button>
                        <button type="submit" class="submit">
                            Cadastrar
                            <img src="{{ asset("img/check-icon.svg")}}" alt="Cadastrar">
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>