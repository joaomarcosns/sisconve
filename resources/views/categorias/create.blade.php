<div class="modal fade" id="cadastrar-categoria-modal" tabindex="-1" aria-labelledby="cadastrar-categoria-modalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header float-right">
                <h5>Cadastrar categoria</h5>
                <div class="modal-header d-block modal-header-add-items float-right">
                    <div class="close-modal">
                        <img data-dismiss="modal" src="{{ asset('img/block-icon-black.svg') }}" alt="Fechar">
                    </div>
                </div>
            </div>

            <form action="" method="POST" id="form-cadastro-categoria">
                <div class="d-flex justify-content-center">
                    <div class="input-nome-categoria" style="width: 95%" id="nome_categoria">
                        <label for="nomecategoria">Nome da categoria</label>
                        <input type="text" name="nomecategoria" placeholder="nome da categoria" class="form-control">
                    </div>
                </div>

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


<script>
    $(() => {
        $('#form-cadastro-categoria').submit(function(e) {
            e.preventDefault();
            $('#nomecategoria>input').prop('disabled', true);
            $('#submit').prop('disabled', true);

            $.ajax({
                type: 'POST',
                url: '{{ route('categoria.store') }}',
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                    "nome_categoria": $('#nome_categoria>input').val()

                },
                success: function(response) {
                    console.log(response);
                    $('#nomecategoria>input').prop('disabled', false);
                    $('#submit').prop('disabled', false);
                },
                error: function(response) {
                    const data = response.responseJSON;
                    const teste = data.errors;
                    console.log(teste);
                    for (let i in teste) {
                        for (let j in teste[i]) {
                            $(`#${i}>input`).addClass('is-invalid');
                            $(`#${i}`).append(
                                `<p class="text-danger form-error">${teste[i][j]}</p>`);
                        }
                    }
                    // $('#nomecategoria>input').prop('disabled', false);
                    // $('#submit').prop('disabled', false);

                }
            });
        });
    });
</script>
