
<form class="form-signin" autocomplete="off" name="formCadastarFornecedor" id="formCadastarFornecedor" method="POST"
    action="{{ route('fornecedor.store') }}">
    <div class="modal fade" id="fornecedorModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header float-right">
                    <h5>Cadastrar fornecedor</h5>
                    <div class="modal-header d-block modal-header-add-items float-right">
                        <div class="close-modal">
<<<<<<< HEAD
                            <img data-dismiss="modal" src="{{ asset("img/block-icon-black.svg")}}" alt="Fechar"
                                data-bs-dismiss="modal">
=======
                            <div class="close-modal">
                                <img data-dismiss="modal" src="{{ asset('img/block-icon-black.svg') }}" alt="Fechar">
                            </div>
>>>>>>> develop
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
                            <input type="text" name="numero" placeholder="20" maxlength="50" class="form-control numero">
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
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="close" data-dismiss="modal">
                        Cancelar
<<<<<<< HEAD
                        <img src="{{ asset("img/block-icon.svg")}}" alt="Cancelar">
=======
                        <img src="{{ asset('img/block-icon.svg') }}" alt="Cancelar">
>>>>>>> develop
                    </button>
                    <button type="submit" class="submit">
                        Cadastrar
<<<<<<< HEAD
                        <img src="{{ asset("img/check-icon.svg")}}" alt="Cadastrar">
=======
                        <img src="{{ asset('img/check-icon.svg') }}" alt="Cadastrar">
>>>>>>> develop
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>


<script>
    $(() => {
        $('#formCadastarFornecedor').submit((event) => {
            $('#btnSubmit>input').prop('disabled', true);
            $('#btnClose>input').prop('disabled', true);
            $('#nome_fantasia>input').prop('disabled', true);
            $('#cnpj>input').prop('disabled', true);
            $('#tipo>select').prop('disabled', true);
            $('#ddd>input').prop('disabled', true);
            $('#telefone>input').prop('disabled', true);
            $('#email>input').prop('disabled', true);
            $('#endereco>input').prop('disabled', true);
            $('#numero>input').prop('disabled', true);
            $('#cidade>input').prop('disabled', true);
            $('#uf>input').prop('disabled', true);


            $('#btnSubmit').css("background-color", "#1C1C1C");
            $('#btnClose').css("background-color", "#1C1C1C");
            $(".form-error").each(function() {
                $(this).remove();
            });
            $(".is-invalid").each(function() {
                $(this).removeClass('is-invalid');
            });

            event.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('fornecedor.store') }}",
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                    'nome_fantasia': $('#nome_fantasia>input').val(),
                    'cnpj': $('#cnpj>input').val(),
                    'tipo': $('#tipo>select').val(),
                    'telefone': $('#telefone>input').val(),
                    'ddd': $('#ddd>input').val(),
                    'email': $('#email>input').val(),
                    'numero': $('#numero>input').val(),
                    'endereco': $('#endereco>input').val(),
                    'cidade': $('#cidade>input').val(),
                    'uf': $('#uf>input').val(),

                },
                dataType: 'json',
                success: (response) => {
                    // var tableFornecedores = $('#tableFornecedores>table>tbody');
                    // tableFornecedores.append(
                    //     '<tr>' +
                    //         `<td>${response.id}</td>` +
                    //         `<td>${response.nome_fantasia}</td>` +
                    //         `<td>${response.cnpj}</td>` +
                    //         `<td>${response.tipo}</td>` +
                    //         '<td>'+
                    //             `<a href="./fornecedor/show/${response.id}" title="Ver fornecedor" onclick="">` +
                    //                 '<img src="../public/img/eye-icon.svg" alt="Ver fornecedor">' +
                    //             '</a>'+
                    //             '<button title="Editar fornecedor">' +
                    //                 '<img src="../public/img/pencil-icon.svg" data-toggle="modal"' +
                    //                 'data-target="#editar-fornecedor-modal" alt="Editar fornecedor">' +
                    //             '</button>' +
                    //             '<button title="Exluir fornecedor">' +
                    //                 '<img src="../public/img/trash-icon.svg" alt="Excluir fornecedor">' +
                    //             '</button>'+
                    //         '</td>' +
                    //     '</tr>'
                    // );
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
                    location.reload(true);

                },
                error: (response) => {
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

                },
            });
        });
    })
</script>
