
<div class="modal fade" id="cadastrar-produto-modal" tabindex="-1" aria-labelledby="cadastrar-produto-modalLabel"
    aria-hidden="true">
    
    <div class="toast fade show slideInUp" id="toast">

    </div>
    <div class="modal-dialog modal-cad-produto modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header float-right">
                <h5>Cadastrar produto</h5>
                <div class="modal-header d-block modal-header-add-items float-right">
                    <div class="close-modal">
                        <img data-dismiss="modal" src="{{ asset('img/block-icon-black.svg') }}" alt="Fechar">
                    </div>
                </div>
            </div>
            <form action="" id="form-produto">
                <div class="form">
                    <div class="input input-nome-produto" id="nome_produto">
                        <label for="nome-produto">Nome do produto</label>
                        <input type="text" name="nome_produto" placeholder="Boneco Max Steel">
                    </div>
                    <div class="input input-categoria" id="select_categoria">
                        <label for="categoria">Categoria</label>
                        <select name="categoria" required>
                            <option value="" disabled selected> Selecione uma categoria</option>
                        </select>
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
        $('#form-produto input').each(function() {
            $(this).val('');
        });
        $('#form-produto select').each(function() {
            $(this).val('');
        });

        $.ajax({
            url: '{{ route('produto.create') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $.each(response, function(i, item) {
                    $("#select_categoria>select").append(
                        `<option value="${item.id}">${item.nome_categoria}</option>`);
                });
            },
            error: function(response) {
                console.error(response);
            }
        });

        $('#form-produto').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('produto.store') }}",
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                    'nome_produto': $('#nome_produto>input').val(),
                    'categoria_id': $('#select_categoria>select').val()
                },
                dataType: "json",
                success: function(response) {
                    var message = "teste"
                    $('#toast').append(
                        `<div class="toast-body bg-green" id="message">${message}</div>`
                    );
                    $('#toast').toast('show');
                    $('#form-produto input').each(function() {
                        $(this).val('');
                    });
                    $('#form-produto select').each(function() {
                        $(this).val('');
                    });
                    $('#cadastrar-produto-modal').modal({
                        keyboard: false
                    })

                },
                error: function(response) {
                    console.error(response);
                }
            });
        });

    });
</script>
