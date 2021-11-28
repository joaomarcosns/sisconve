<link rel="stylesheet" href="{{ asset('css/modal/cliente/show-cliente.css') }} ">
<div class="modal fade" id="show-cliente-modal" tabindex="-1" aria-labelledby="cadastrar-cliente-modalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-cad-cliente modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header float-right">
                <h5>Mostar Cliente</h5>
                <div class="modal-header d-block modal-header-add-items float-right">
                    <div class="close-modal">
                        <img data-dismiss="modal" class="close" src="{{ asset('img/block-icon-black.svg') }}"
                            alt="Fechar" data-bs-dismiss="modal">
                    </div>
                </div>
            </div>
            <div class="form">
                <div class="input input-nome-cliente" id="nome_show">
                    <label for="nome-cliente">Nome do cliente</label>
                    <input type="text" name="nome" placeholder="José da Silva" maxlength="100" class="form-control"
                        disabled>
                </div>
                <div class="input-ddd-tel-cpf">
                    <div class="input input-catagoria_a" id="data_nacimento_show">
                        <label for="cpf">Data de Nacimento</label>
                        <input type="text" name="data_nacimento" class="form-control" disabled >
                    </div>
                    <div class="input input-catagoria" id="cpf_show">
                        <label for="cpf">CPF</label>
                        <input type="text" name="cpf" placeholder="123.456.789-10" maxlength="11"
                            class="form-control cpf" disabled>
                    </div>

                </div>

                <h5 class="pt-2">Contatos</h5>
                <div class="contatos">
                </div>

                <h5>Endereços</h5>
                <div class="endereco">
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $(() => {
        $('.ver_cliente').click(function(e) {
            var id = $(this).parent().parent().find('.idCliente').text();

            $(".endereco").html("");
            $(".contatos").html("");

            $.ajax({
                type: "GET",
                url: `./cliente/show/${id}`,
                data: "data",
                dataType: "json",
                success: function(response) {

                    var clientes = response.clientes;
                    var enderecos = response.enderecos;
                    var contatos = response.contatos;

                    enderecos.forEach(element => {
                        $(".endereco").append(
                            `<div class="input-endereco-num">` +
                                `<div class="input input-rua" id="cep" style="width: 35%; margin-right: 10px;">`+
                                    `<label for="cep">CEP</label>`+
                                    `<input type="text" name="cep" class="form-control cep" value =${element.cep} disabled>`+
                                `</div>`+

                                `<div class="input input-rua" id="rua">`+
                                    `<label for="rua">Rua</label>`+
                                    `<input type="text" name="rua" maxlength="100"`+
                                    `class="form-control" disabled value =${element.logradouro}>`+
                                `</div>`+
                            `</div>`+

                            `<div class="input-endereco-num">`+
                                `<div class="input input-rua" id="complemento">`+
                                    `<label for="complemento">Complemento</label>`+
                                    `<input type="text" name="complemento" maxlength="100" class="form-control" value=${element.complemento} disabled>`+
                                `</div>`+
                                    `<div class="input input-numero" id="numero">`+
                                        `<label for="numero">Número</label>`+
                                        `<input type="text" name="numero" maxlength="5"`+
                                        `class="form-control numero" value=${element.numero} disabled>`+
                                    `</div>`+
                            `</div>` + 
                            `<div class="input-bairro-cidade-estado">` +
                                `<div class="input input-bairro" id="bairro">` +
                                    `<label for="bairro">Bairro</label>` +
                                    `<input type="text" name="bairro" maxlength="30" `+
                                    `class="form-control" disabled value=${element.bairro}>` +
                                `</div>` +
                                `<div class="input input-cidade" id="cidade">` +
                                    `<label for="cidade">Cidade</label>`+
                                    `<input type="text" name="cidade" maxlength="30"`+
                                    `class="form-control" disabled value=${element.cidade}>`+
                                `</div>`+
                                `<div class="input input-estado" id="estado">`+
                                    `<label for="estado">Estado</label>`+
                                    `<input type="text" maxlength="2" name="uf" class="form-control" disabled value=${element.uf}>`+
                                `</div>`+
                            `</div>`
                        );
                    });

                    contatos.forEach(element => {
                        $(".contatos").append(
                            `<div class="input-ddd-tel-cpf">` +
                                `<div class="input input-catagoria" id="email_show">` +
                                    `<label for="email">Email</label>` +
                                    `<input type="text" name="email" class="form-control" style="width: 110%" disabled value=${element.email}>` +
                                `</div>` +
                                `<div class="input input-ddd" id="ddd_show">` +
                                    `<label for="ddd">DDD</label>` +
                                    `<input type="text" name="ddd" maxlength="2" placeholder="38" class="form-control ddd" disabled value=${element.ddd}>` +
                                `</div>` +
                                `<div class="input input-num-telefone" id="telefone_show">` +
                                        `<label for="num_telefone">Telefone</label>` +
                                    `<input type="text" name="telefone" placeholder="9 12345678" class="form-control phone" disabled value=${element.celular}>` +
                                `</div>` +
                            `</div>`
                        );
                    });

                    clientes.forEach(element => {
                        var data = element.data_nacimento;
                        var data_nacimento = data.split("-");
                        var data_nacimento_formatada = data_nacimento[2] + "/" + data_nacimento[1] + "/" + data_nacimento[0];
                    
                        $('#nome_show>input').val(element.nome);
                        $('#data_nacimento_show>input').val(data_nacimento_formatada);
                        $('#cpf_show>input').val(element.cpf);
                    })

                },
                error: function(response) {
                    console.log(response);
                }
            });
        });
    });
</script>
