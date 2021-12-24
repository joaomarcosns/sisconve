<form class="form-signin" autocomplete="off" name="formEditFornecedor" id="formEditFornecedor">
    <div class="modal fade" id="fornecedorModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header float-right">
                    <h5>Editar fornecedor</h5>
                    <div class="modal-header d-block modal-header-add-items float-right">
                        <div class="close-modal">
                            <img data-dismiss="modal" src="{{ asset('img/block-icon-black.svg') }}" alt="Fechar"
                                data-bs-dismiss="modal">
                        </div>
                    </div>
                </div>
                <div class="form">
                    {{-- nome_fantasia --}}
                    <div class="input" id="nome_fantasia">
                        <label for="nome">Nome do fornecedor *</label>
                        <input type="text" name="nome_fantasia" placeholder="Brinquedos LTDA" maxlength="100"
                            class="form-control">
                    </div>
                    {{-- CNPJ --}}
                    <div class="input" id="cnpj">
                        <label for="cnpj">CNPJ *</label>
                        <input type="text" name="cnpj" placeholder="00.000.000/0000-00" maxlength="100"
                            class="form-control cnpj">
                    </div>
                    {{-- Tipo --}}
                    <div class="select" id="tipo">
                        <label for="cnpj">Tipo *</label>
                        <select name="tipo" class="form-control">
                            <option value="" selected></option>
                            <option value="MATRIZ">MATRIZ</option>
                            <option value="FILIAL">FILIAL</option>
                        </select>
                    </div>

                    <div class="ddd-telefone">
                        <div class="input input-ddd" id="ddd">
                            <label for="telefone">DDD *</label>
                            <input type="text" name="ddd" placeholder="11" maxlength="2" class="form-control ddd">
                        </div>
                        <div class="input input-telefone" id="telefone">
                            <label for="telefone">Telefone *</label>
                            <input type="text" name="telefone" placeholder="9 1234-5678" maxlength="9"
                                class="form-control phone">
                        </div>
                    </div>
                    {{-- email --}}

                    <div class="input input-telefone-fornecedor" id="email">
                        <label for="email">Email *</label>
                        <input type="email" name="email" placeholder="email@email" maxlength="50"
                            class="form-control">
                    </div>

                    {{-- Endereço --}}

                    <div class="input" id="endereco">
                        <label for="endereco">Endereço *</label>
                        <input type="text" name="endereco" placeholder="Rua x" maxlength="50" class="form-control">
                    </div>

                    {{-- Numero --}}

                    <div class="input-tel-cid-est">
                        <div class="input input-telefone-fornecedor" id="numero">
                            <label for="numero">Numero *</label>
                            <input type="text" name="numero" placeholder="20" maxlength="50"
                                class="form-control numero">
                        </div>
                        {{-- Cidade --}}

                        <div class="input input-cidade-fornecedor" id="cidade">
                            <label for="cidade">Cidade *</label>
                            <input type="text" name="cidade" placeholder="Igaporã" maxlength="30"
                                class="form-control">
                        </div>
                        {{-- Estado --}}

                        <div class="input input-estado-fornecedor" id="uf">
                            <label for="uf">Estado *</label>
                            <input type="text" name="uf" placeholder="MG" maxlength="2" class="form-control uf">
                        </div>

                        {{--  --}}
                        <input name="id" class="id" id="id" style="display: none;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="close btnClose" data-bs-dismiss="modal">
                        Cancelar
                        <img src="{{ asset("img/block-icon.svg")}}" alt="Cancelar">
                    </button>
                    <button type="submit" class="submit btnSubmit">
                        Cadastrar
                        <img src="{{ asset("img/check-icon.svg")}}" alt="Cadastrar">
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(() => {
        $('.edit').click(function(e) {
            var id = $(this).parent().parent().find('.id').text();
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: `./fornecedor/edit/${id}`,
                dataType: "json",
                success: function(response) {
                    $('#id').val(response.id);
                    $('#nome_fantasia>input').val(response.nome_fantasia);
                    $('#cnpj>input').val(response.cnpj);
                    $('#ddd>input').val(response.ddd);
                    $('#tipo>select').val(response.tipo);
                    $('#telefone>input').val(response.telefone);
                    $('#email>input').val(response.email);
                    $('#endereco>input').val(response.endereco);
                    $('#numero>input').val(response.numero);
                    $('#cidade>input').val(response.cidade);
                    $('#uf>input').val(response.uf);
                },
                error: function(response) {
                    console.log(response);
                }
            });
            $('#formEditFornecedor').submit(function(e) {

                $('#id').val('');
                $('#nome_fantasia>input').val('');
                $('#cnpj>input').val('');
                $('#ddd>input').val('');
                $('#tipo>select').val('');
                $('#telefone>input').val('');
                $('#email>input').val('');
                $('#endereco>input').val('');
                $('#numero>input').val('');
                $('#cidade>input').val('');
                $('#uf>input').val('');
                e.preventDefault();
            });
        });
    });
</script>
