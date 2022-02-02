<link rel="stylesheet" href="{{ asset('css/modal/fornecedor/show-fornecedor.css') }} ">
<div class="modal fade" id="fornecedorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header float-right">
                <h5>Casdastar Fornecedor</h5>
                <div class="modal-header d-block modal-header-add-items float-right">
                    <div class="close-modal">
                        <img data-dismiss="modal" class="close" src="{{ asset('img/block-icon-black.svg') }}"
                            alt="Fechar" data-bs-dismiss="modal">
                    </div>
                </div>
            </div>
            <div class="form">
                <form class="form-signin" autocomplete="off" name="formCadastarFornecedor"
                    id="formCadastarFornecedor">
                    {{-- nome_fantasia --}}
                    <div class="input" id="nome_fantasia_show">
                        <label for="nome">Nome do fornecedor *</label>
                        <input type="text" name="nome_fantasia" class="form-control">
                    </div>
                    {{-- CNPJ --}}
                    <div class="input" id="cnpj_show">
                        <label for="cnpj">CNPJ *</label>
                        <input type="text" name="cnpj" class="form-control cnpj">
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
                        <div class="input input-ddd" id="ddd_show">
                            <label for="telefone">DDD *</label>
                            <input type="text" name="ddd" class="form-control ddd">
                        </div>
                        <div class="input input-telefone" id="telefone_show">
                            <label for="telefone">Telefone *</label>
                            <input type="text" name="telefone" class="form-control phone">
                        </div>
                    </div>
                    {{-- email --}}

                    <div class="input input-telefone-fornecedor" id="email_show">
                        <label for="email">Email *</label>
                        <input type="email" name="email" placeholder="email@email" class="form-control">
                    </div>

                    {{-- Endereço --}}

                    <div class="input" id="endereco_show">
                        <label for="endereco">Endereço *</label>
                        <input type="text" name="endereco" placeholder="Rua x" class="form-control">
                    </div>

                    {{-- Numero --}}

                    <div class="input-tel-cid-est">
                        <div class="input input-telefone-fornecedor" id="numero_show">
                            <label for="numero">Numero *</label>
                            <input type="text" name="numero" placeholder="20" class="form-control numero">
                        </div>
                        {{-- Cidade --}}
                        <div class="input input-cidade-fornecedor" id="cidade_show">
                            <label for="cidade">Cidade *</label>
                            <input type="text" name="cidade" placeholder="Igaporã" class="form-control">
                        </div>
                        {{-- Estado --}}
                        <div class="input input-estado-fornecedor mb-5" id="uf_show">
                            <label for="uf">Estado *</label>
                            <input type="text" name="uf" placeholder="MG" class="form-control uf">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="close btnClose" data-bs-dismiss="modal">
                            Cancelar
                            <img src="{{ asset('img/block-icon.svg') }}" alt="Cancelar">
                        </button>
                        <button type="submit" class="submit btnSubmit">
                            Cadastrar
                            <img src="{{ asset('img/check-icon.svg') }}" alt="Cadastrar">
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(() => {
        $('#formCadastarFornecedor').submit((event) => {
            $('#btnSubmit_show>input').prop('disabled', true);
            $('#btnClose_show>input').prop('disabled', true);
            $('#nome_fantasia_show>input').prop('disabled', true);
            $('#cnpj_show>input').prop('disabled', true);
            $('#tipo_show>select').prop('disabled', true);
            $('#ddd_show>input').prop('disabled', true);
            $('#telefone_show>input').prop('disabled', true);
            $('#email_show>input').prop('disabled', true);
            $('#endereco_show>input').prop('disabled', true);
            $('#numero_show>input').prop('disabled', true);
            $('#cidade_show>input').prop('disabled', true);
            $('#uf_show>input').prop('disabled', true);


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
                    'nome_fantasia': $('#nome_fantasia_show>input').val(),
                    'cnpj': $('#cnpj_show>input').val(),
                    'tipo': $('#tipo>select').val(),
                    'telefone': $('#telefone_show>input').val(),
                    'ddd': $('#ddd_show>input').val(),
                    'email': $('#email_show>input').val(),
                    'numero': $('#numero_show>input').val(),
                    'endereco': $('#endereco_show>input').val(),
                    'cidade': $('#cidade_show>input').val(),
                    'uf': $('#uf_show>input').val(),

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
                    location.reload();

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
