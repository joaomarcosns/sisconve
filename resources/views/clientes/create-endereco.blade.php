<link rel="stylesheet" href="{{ asset('css/modal/cadastro-cliente.css') }} ">
<div class="modal fade" id="create-endereco" tabindex="-1" aria-labelledby="create-enderecoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-cad-cliente modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header float-right">
                <h5>Cadastrar endereço cliente</h5>
                <div class="modal-header d-block modal-header-add-items float-right">
                    <div class="close-modal">
                        <img data-dismiss="modal" class="close" src="{{ asset('img/block-icon-black.svg') }}"
                            alt="Fechar" data-bs-dismiss="modal">
                    </div>
                </div>
            </div>
            <div class="form">
                <form autocomplete="off" name="formCadastarCleinte" id="formCadastarCleinte">
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

@section('script')

<script>
    $(() => {
        $('.cadastro_endereco').click(function(e) {
            var id = $(this).parent().parent().find('.idCliente').text();
        });
    })
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
            alert(cep);

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
