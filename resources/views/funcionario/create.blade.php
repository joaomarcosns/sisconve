<div class="modal fade" id="cadastrar-funcionario-modal" tabindex="-1"
    aria-labelledby="cadastrar-funcionario-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-cad-funcionario modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header float-right">
                <h5>Cadastrar funcionário</h5>
                <div class="modal-header d-block modal-header-add-items float-right">
                    <div class="close-modal">
                        <img data-bs-dismiss="modal" src="../public/img/block-icon-black.svg" alt="Fechar">
                    </div>
                </div>
            </div>
            <div class="form">
                <form action="" id="cadastrarFuncionario" autocomplete="off">
                    <div class="input input-nome-funcionario" id="nome_funcionario">
                        <label for="nome_funcionario">Nome</label>
                        <input type="text" name="nome_funcionario" placeholder="José da Silva" maxlength="100"
                            class="form-control">
                    </div>
                    <div class="input-cpf-tel">
                        <div class="input input-cpf" id="cpf">
                            <label for="cpf">CPF <small>(somente números)</small></label>
                            <input type="text" name="cpf" placeholder="123.456.789-10" maxlength="11"
                                class="form-control cpf">
                        </div>
                        <div class="input input-num-telefone" id="telefone">
                            <label for="telefone">Telefone + DDD <small>(somente números)</small></label>
                            <input type="text" name="telefone" placeholder="(38) 9 12345678" maxlength="11"
                                class="form-control phone_with_ddd">
                        </div>
                    </div>
                    <div class="input input-endereco" id="endereco">
                        <label for="endereco">Endereço <small>(completo)</small></label>
                        <input type="text" name="endereco"
                            placeholder="Rua dos Cocais, num 25 Bairro Centro, Espinosa-MG" maxlength="100"
                            class="form-control">
                    </div>
                    <div class="input-cargo-salario">
                        <div class="input input-cargo" id="cargo">
                            <label for="cargo">Cargo</label>
                            <input type="text" name="cargo" placeholder="Caixa" maxlength="20" class="form-control">
                        </div>
                        <div class="input input-salario" id="salario">
                            <label for="salario">Salário R$ <small>(somente números)</small></label>
                            <input type="number" name="salario" placeholder="1500,00" min="0" max="99999"
                                class="form-control">
                        </div>
                    </div>
                    <div class="input input-account" id="acc">
                        <label for="acc">Acesso ao sistema?</label>
                        <input type="checkbox" name="acc">
                    </div>
                    <div class="input-usuario-nivel">
                        <div class="input input-acesso" id="acess-level">
                            <label for="acess-level">Nível de acesso</label>
                            <select name="acess-level" style="background-color: #e5e5e5;" disabled
                                class="form-control">
                                <option value="" selected disabled>Selecione</option>
                                <option value="1">Usuário gerente</option>
                                <option value="2">Usuário caixa</option>
                            </select>
                        </div>

                        <div class="input input-email" id="email">
                            <label for="email">E-mail</label>
                            <input type="text" name="email" placeholder="funcionario@email.com" maxlength="30"
                                class="form-control">
                        </div>
                        <div class="input input-caixa" id="caixa-cadastro">
                            <label for="caixa">Caixa</label>
                            <select name="caixa" style="background-color: #e5e5e5;" disabled class="form-control">
                                <option value="" selected disabled>Selecione</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-senha-confirm">
                        <div class="input input-senha" id="senha">
                            <label for="senha">Senha</label>
                            <input type="password" style="background-color: #e5e5e5;" name="senha"
                                placeholder="•••••••••••" maxlength="100" disabled class="form-control">
                        </div>
                        <div class="input input-conf-senha" id="confi-senha">
                            <label for="confirma_senha">Confirmar senha</label>
                            <input type="password" style="background-color: #e5e5e5;" name="confirma_senha"
                                placeholder="•••••••••••" maxlength="100" disabled class="form-control">
                            <div id="pw-wrong"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="close" data-bs-dismiss="modal">
                            Cancelar
                            <img src="{{ asset('img/block-icon.svg') }}" alt="Cancelar">
                        </button>
                        <button type="submit" class="submit">
                            Cadastrar
                            <img src="{{ asset('img/check-icon.svg') }}" alt="Cadastrar">
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('script')
    <script>
        $(document).ready(function() {
            checked();
            $("#cadastrarFuncionario").submit(function(e) {
                $(".form-error").each(function() {
                    $(this).remove();
                });
                $(".is-invalid").each(function() {
                    $(this).removeClass('is-invalid');
                });
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ route('funcionario.store') }}",
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                        "nome_funcionario": $('#nome_funcionario>input').val(),
                        "cpf": $('#cpf>input').val(),
                        "telefone": $('#telefone>input').val(),
                        "email": $('#email>input').val(),
                        "endereco": $('#endereco>input').val(),
                        "cargo": $('#cargo>input').val(),
                        "checado": $('#acc>input').is(':checked'),
                        "salario": $('#salario>input').val(),
                        "acess_level": $('#acess-level>select').val(),
                        "id_caixa": $('#caixa-cadastro>select').val(),
                        "senha": $('#senha>input').val(),
                        "confirma_senha": $('#confi-senha>input').val()
                    },
                    dataType: "json",
                    success: function(response) {
                        $('#btnSubmit').prop('disabled', false);
                        $('#btnClose').prop('disabled', false);

                        $('#nome_fantasia>input').prop('disabled', false);
                        $('#cnpj>input').prop('disabled', false);
                        $('#tipo>select').prop('disabled', false);
                        $('#ddd>input').prop('disabled', false);
                        $('#telefone>input').prop('disabled', false);
                        $('#email>input').prop('disabled', false);
                        $('#endereco>input').prop('disabled', false);
                        $('#numero>input').prop('disabled', false);
                        $('#cidade>input').prop('disabled', false);
                        $('#uf>input').prop('disabled', false);

                        $('#btnSubmit').css("background-color", "#00AC4F");
                        $('#btnClose').css("background-color", "#CD0000");

                        location.reload();
                    },
                    error: function(response) {
                        const data = response.responseJSON;
                        const teste = data.errors;
                        for (let i in teste) {
                            for (let j in teste[i]) {
                                $(`#${i}>input`).addClass('is-invalid');
                                $(`#${i}`).append(
                                    `<p class="text-danger form-error">${teste[i][j]}</p>`);
                            }
                        }

                        $('#btnSubmit').prop('disabled', false);
                        $('#btnClose').prop('disabled', false);

                        $('#nome_fantasia>input').prop('disabled', false);
                        $('#cnpj>input').prop('disabled', false);
                        $('#tipo>select').prop('disabled', false);
                        $('#ddd>input').prop('disabled', false);
                        $('#telefone>input').prop('disabled', false);
                        $('#email>input').prop('disabled', false);
                        $('#endereco>input').prop('disabled', false);
                        $('#numero>input').prop('disabled', false);
                        $('#cidade>input').prop('disabled', false);
                        $('#uf>input').prop('disabled', false);

                        $('#btnSubmit').css("background-color", "#00AC4F");
                        $('#btnClose').css("background-color", "#CD0000");
                    }
                });
            });
        });

        function getCaixas() {
            var caixas;
            $.ajax({
                type: "GET",
                url: "{{ route('funcionario.getCaixas') }}",
                dataType: "json",
                success: function(response) {
                    caixas = response;
                    caixas.forEach(element => {
                        $('#caixa-cadastro>select').append(
                            `<option value="${element.numero_caixa}">${element.numero_caixa}</option>`
                            );
                    });
                },
                error: function(response) {
                    console.log(response);
                }
            });
        }

        function checked() {
            $('#acc>input').click(function() {
                if ($(this).is(':checked')) {
                    $('#acess-level>select').prop('disabled', false);
                    $('#caixa-cadastro>select').prop('disabled', false);
                    $('#senha>input').prop('disabled', false);
                    $('#confi-senha>input').prop('disabled', false);
                    getCaixas();
                } else {
                    $('#acess-level>select').prop('disabled', true);
                    $('#caixa-cadastro>select').prop('disabled', true);
                    $('#senha>input').prop('disabled', true);
                    $('#confi-senha>input').prop('disabled', true);

                    $('#acess-level>select').val('');
                    $('#caixa-cadastro>select').val('');
                    $('#senha>input').val('');
                    $('#confi-senha>input').val('');
                }
            });
        }
    </script>
@endsection
