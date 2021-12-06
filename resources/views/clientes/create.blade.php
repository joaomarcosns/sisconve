<link rel="stylesheet" href="{{ asset('css/modal/cadastro-cliente.css') }} ">
<div class="modal fade" id="cadastrar-cliente-modal" tabindex="-1" aria-labelledby="cadastrar-cliente-modalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-cad-cliente modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header float-right">
                <h5>Cadastrar cliente</h5>
                <div class="modal-header d-block modal-header-add-items float-right">
                    <div class="close-modal">
                        <img data-dismiss="modal" src="{{ asset('img/block-icon-black.svg') }}" alt="Fechar">
                    </div>
                </div>
            </div>
            <div class="form">
                <form autocomplete="off" name="formCadastarCleinte" id="formCadastarCleinte">
                    <div class="input input-nome-cliente" id="nome">
                        <label for="nome-cliente">Nome do cliente</label>
                        <input type="text" name="nome" placeholder="José da Silva" maxlength="100"
                            class="form-control">
                    </div>
                    <div class="input-ddd-tel-cpf">
                        <div class="input input-catagoria_a" id="data_nacimento">
                            <label for="cpf">Data de Nacimento</label>
                            <input type="date" name="data_nacimento" class="form-control">
                        </div>
                        <div class="input input-catagoria" id="cpf">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" placeholder="123.456.789-10" maxlength="11"
                                class="form-control cpf">
                        </div>

                    </div>
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
                    <div class="input-endereco-num">
                        <div class="input input-rua" id="cep" style="width: 35%; margin-right: 10px;">
                            <label for="cep">CEP</label>
                            <input type="text" name="cep" class="form-control cep">
                        </div>

                        <div class="input input-rua" id="rua">
                            <label for="rua">Rua</label>
                            <input type="text" name="rua" placeholder="Rua dos Cocais" maxlength="100"
                                class="form-control" disabled>
                        </div>
                    </div>
                    <div class="input-endereco-num">
                        <div class="input input-rua" id="complemento">
                            <label for="complemento">Complemento</label>
                            <input type="text" name="complemento" placeholder="" maxlength="100" class="form-control">
                        </div>
                        <div class="input input-numero" id="numero">
                            <label for="numero">Número</label>
                            <input type="text" name="numero" placeholder="123" maxlength="5"
                                class="form-control numero">
                        </div>
                    </div>
                    {{--  --}}
                    <div class="input-bairro-cidade-estado">
                        <div class="input input-bairro" id="bairro">
                            <label for="bairro">Bairro</label>
                            <input type="text" name="bairro" placeholder="Vila Nova" maxlength="30"
                                class="form-control" disabled>
                        </div>
                        <div class="input input-cidade" id="cidade">
                            <label for="cidade">Cidade</label>
                            <input type="text" name="cidade" placeholder="Americana" maxlength="30"
                                class="form-control" disabled>
                        </div>
                        <div class="input input-estado" id="estado">
                            <label for="estado">Estado</label>
                            <input type="text" maxlength="2" placeholder="SP" name="uf" class="form-control" disabled>
                        </div>
                    </div>

                    {{--  --}}
                    <div class="modal-footer">
                        <button type="button" class="close" data-dismiss="modal">
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
        $(() => {
            $('#formCadastarCleinte').submit(function(e) {
                $('#nome>input').prop('disabled', true);
                $('#data_nacimento>input').prop('disabled', true);
                $('#cpf>input').prop('disabled', true);
                $('#email>input').prop('disabled', true);
                $('#ddd>input').prop('disabled', true);
                $('#telefone>input').prop('disabled', true);
                $('#cep>input').prop('disabled', true);
                $('#rua>input').prop('disabled', true);
                $('#numero>input').prop('disabled', true);
                $('#bairro>input').prop('disabled', true);
                $('#cidade>input').prop('disabled', true);
                $('#estado>input').prop('disabled', true);
                $('#submit').prop('disabled', true);

                $('#btnSubmit').css("background-color", "#1C1C1C");
                $('#btnClose').css("background-color", "#1C1C1C");

                $(".form-error").each(function() {
                    $(this).remove();
                });

                $(".is-invalid").each(function() {
                    $(this).removeClass('is-invalid');
                });


                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ route('cliente.store') }}",
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                        "nome": $('#nome>input').val(),
                        "data_nacimento": $('#data_nacimento>input').val(),
                        "cpf": $('#cpf>input').val(),
                        "email": $('#email>input').val(),
                        "ddd": $('#ddd>input').val(),
                        "telefone": $('#telefone>input').val(),
                        "cep": $('#cep>input').val(),
                        "rua": $('#rua>input').val(),
                        "numero": $('#numero>input').val(),
                        "bairro": $('#bairro>input').val(),
                        "cidade": $('#cidade>input').val(),
                        "estado": $('#estado>input').val(),
                        "complemento": $('#complemento>input').val(),

                    },
                    dataType: "json",
                    success: function(response) {
                        $('#nome>input').prop('disabled', false);
                        $('#data_nacimento>input').prop('disabled', false);
                        $('#cpf>input').prop('disabled', false);
                        $('#email>input').prop('disabled', false);
                        $('#ddd>input').prop('disabled', false);
                        $('#telefone>input').prop('disabled', false);
                        $('#cep>input').prop('disabled', false);
                        $('#rua>input').prop('disabled', false);
                        $('#numero>input').prop('disabled', false);
                        $('#bairro>input').prop('disabled', false);
                        $('#cidade>input').prop('disabled', false);
                        $('#estado>input').prop('disabled', false);
                        $('#submit').prop('disabled', false);

                        $('#btnSubmit').css("background-color", "#00AC4F");
                        $('#btnClose').css("background-color", "#CD0000");
                        location.reload(true);
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
                        console.log(response);
                        $('#nome>input').prop('disabled', false);
                        $('#data_nacimento>input').prop('disabled', false);
                        $('#cpf>input').prop('disabled', false);
                        $('#email>input').prop('disabled', false);
                        $('#ddd>input').prop('disabled', false);
                        $('#telefone>input').prop('disabled', false);
                        $('#cep>input').prop('disabled', false);
                        $('#rua>input').prop('disabled', false);
                        $('#numero>input').prop('disabled', false);
                        $('#bairro>input').prop('disabled', false);
                        $('#cidade>input').prop('disabled', false);
                        $('#estado>input').prop('disabled', false);
                        $('#submit').prop('disabled', false);

                    }
                });
            })
        });
    </script>
    <script>
        $(document).ready(function() {
            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua>input").val("");
                $("#bairro>input").val("");
                $("#cidade>input").val("");
                $("#estado>input").val("");
            }
            //Quando o campo cep perde o foco.
            $("#cep>input").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if (validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua>input").val("...");
                        $("#bairro>input").val("...");
                        $("#cidade>input").val("...");
                        $("#estado>input").val("...");
                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                            $("#cidade>input").removeClass("form-disabled");
                            $("#estado>input").removeClass("form-disabled");
                            $("#rua>input").removeClass("form-disabled");
                            $("#bairro>input").removeClass("form-disabled");

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua>input").val(dados.logradouro);
                                $("#bairro>input").val(dados.bairro);
                                $("#cidade>input").val(dados.localidade);
                                $("#estado>input").val(dados.uf);

                                $("#cidade>input").addClass('form-disabled');
                                $("#estado>input").addClass('form-disabled');

                                if (dados.bairro == "") {
                                    $('#rua>input').prop('disabled', false);
                                    $('#bairro>input').prop('disabled', false);
                                } else {
                                    $('#rua>input').prop('disabled', true);
                                    $('#bairro>input').prop('disabled', true);
                                    $("#rua>input").addClass('form-disabled');
                                    $("#bairro>input").addClass('form-disabled');
                                }
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });
    </script>
@endsection
