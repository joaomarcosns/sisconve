<link rel="stylesheet" href="{{ asset('css/modal/funcionario/show-funcionario.css') }} ">
<div class="modal fade" id="cadastrar-funcionario-show" tabindex="-1"
    aria-labelledby="cadastrar-funcionario-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-cad-funcionario modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header float-right">
                <h5>Ver funcionário</h5>
                <div class="modal-header d-block modal-header-add-items float-right">
                    <div class="close-modal">
                        <img data-bs-dismiss="modal" src="../public/img/block-icon-black.svg" alt="Fechar">
                    </div>
                </div>
            </div>
            <div class="form">
                <div class="input input-nome-funcionario" id="nome_funcionario_show">
                    <label for="nome_funcionario">Nome</label>
                    <input type="text" name="nome_funcionario" placeholder="José da Silva" maxlength="100"
                        class="form-control">
                </div>
                <div class="input-cpf-tel">
                    <div class="input input-cpf" id="cpf_show">
                        <label for="cpf">CPF <small>(somente números)</small></label>
                        <input type="text" name="cpf" placeholder="123.456.789-10" maxlength="11"
                            class="form-control cpf">
                    </div>
                    <div class="input input-num-telefone" id="telefone_show">
                        <label for="telefone">Telefone + DDD <small>(somente números)</small></label>
                        <input type="text" name="telefone" placeholder="(38) 9 12345678" maxlength="11"
                            class="form-control phone_with_ddd">
                    </div>
                </div>
                <div class="input input-endereco" id="endereco_show">
                    <label for="endereco">Endereço <small>(completo)</small></label>
                    <input type="text" name="endereco" placeholder="Rua dos Cocais, num 25 Bairro Centro, Espinosa-MG"
                        maxlength="100" class="form-control">
                </div>
                <div class="input-cargo-salario">
                    <div class="input input-cargo" id="cargo_show">
                        <label for="cargo">Cargo</label>
                        <input type="text" name="cargo" placeholder="Caixa" maxlength="20" class="form-control">
                    </div>
                    <div class="input input-salario" id="salario_show">
                        <label for="salario">Salário R$ <small>(somente números)</small></label>
                        <input type="number" name="salario" placeholder="1500,00" min="0" max="99999"
                            class="form-control">
                    </div>
                </div>
                <div class="input-usuario-nivel">
                    <div class="input input-email" id="email_show">
                        <label for="email">E-mail</label>
                        <input type="text" name="email" placeholder="funcionario@email.com" maxlength="30"
                            class="form-control">
                    </div>
                    <div class="input input-caixa" id="caixa-cadastro_show">
                        <label for="caixa">Caixa</label>
                        <input name="caixa" style="background-color: #e5e5e5;" disabled class="form-control">
                    </div>
                    <div class="input input-caixa" id="email_show" style="margin-bottom: 30px">
                        <label for="email">E-mail</label>
                        <input name="email" style="background-color: #e5e5e5;" disabled class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(() => {
        $(".verFuncionario").click(function(e) {
            let id = $(this).closest('tr').find('.idFuncionario').text();
            $.ajax({
                type: "GET",
                url: `./funcionario/show/${id}`,
                dataType: "json",
                success: function(response) {

                    $('#nome_funcionario_show>input').val(response.nome_funcionario),
                    $('#cpf_show>input').val(response.cpf),
                    $('#telefone_show>input').val(response.telefone),
                    $('#email_show>input').val(response.email ? response.email : "Não informado"),
                    $('#endereco_show>input').val(response.endereco),
                    $('#cargo_show>input').val(response.cargo),
                    $('#salario_show>input').val(response.salario),
                    $('#caixa-cadastro_show>input').val(response.id_caixa ? response.id_caixa : "Não informado"),
                    console.log(response);
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });
    })
</script>
