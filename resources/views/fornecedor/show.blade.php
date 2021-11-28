<link rel="stylesheet" href="{{ asset('css/modal/fornecedor/show-fornecedor.css') }} ">
<div class="modal fade" id="fornecedorModalShow" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header float-right">
                <h5>Ver Fornecedor</h5>
                <div class="modal-header d-block modal-header-add-items float-right">
                    <div class="close-modal">
                        <img data-dismiss="modal" class="close" src="{{ asset("img/block-icon-black.svg")}}"
                            alt="Fechar" data-bs-dismiss="modal">
                    </div>
                </div>
            </div>
            <div class="form">
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
                <div class="select" id="tipo_show">
                    <label for="cnpj">Tipo *</label>
                    <input type="text" name="tipo">
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
            </div>
        </div>
    </div>
</div>

<script>
    $(() => {
        $('.ver').click(function(e) {
            e.preventDefault();
            var id = $(this).parent().parent().find('.id').text();
            $('#nome_fantasia_show>input').prop('disabled', true);
            $('#cnpj_show>input').prop('disabled', true);
            $('#tipo_show>input').prop('disabled', true);
            $('#ddd_show>input').prop('disabled', true);
            $('#telefone_show>input').prop('disabled', true);
            $('#email_show>input').prop('disabled', true);
            $('#endereco_show>input').prop('disabled', true);
            $('#numero_show>input').prop('disabled', true);
            $('#cidade_show>input').prop('disabled', true);
            $('#uf_show>input').prop('disabled', true);
            $.ajax({
                type: "GET",
                url: `./fornecedor/show/${id}`,
                dataType: "json",
                success: (response) => {
                    $('#nome_fantasia_show>input').val(response.nome_fantasia);
                    $('#cnpj_show>input').val(response.cnpj);
                    $('#tipo_show>input').val(response.tipo);
                    $('#ddd_show>input').val(response.ddd);
                    $('#telefone_show>input').val(response.telefone);
                    $('#email_show>input').val(response.email);
                    $('#endereco_show>input').val(response.endereco);
                    $('#numero_show>input').val(response.numero);
                    $('#cidade_show>input').val(response.cidade);
                    $('#uf_show>input').val(response.uf);
                },
                error: (response) => {
                    console.log(response);
                }
            });
        });
    })
</script>

<script>
    $('.close').click((e) => {
        $('#nome_fantasia_show>input').val('');
        $('#cnpj_show>input').val('');
        $('#tipo_show>input').val('');
        $('#ddd_show>input').val('');
        $('#telefone_show>input').val('');
        $('#email_show>input').val('');
        $('#endereco_show>input').val('');
        $('#numero_show>input').val('');
        $('#cidade_show>input').val('');
        $('#uf_show>input').val('');
    });
</script>
