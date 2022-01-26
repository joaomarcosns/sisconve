<div class="modal fade" id="editar-produto-modal" tabindex="-1" aria-labelledby="cadastrar-produto-modalLabel"
    aria-hidden="true">

    <div class="toast fade show slideInUp" id="toast">

    </div>
    <div class="modal-dialog modal-cad-produto modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header float-right">
                <h5>Editar produto</h5>
                <div class="modal-header d-block modal-header-add-items float-right">
                    <div class="close-modal">
                        <img data-dismiss="modal" src="{{ asset('img/block-icon-black.svg') }}" alt="Fechar">
                    </div>
                </div>
            </div>
            <form action="{{ route('produto.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form">
                    <div class="input input-nome-produto" id="nome_produto_update">
                        <label for="nome-produto">Nome do produto</label>
                        <input type="text" name="nome_produto" placeholder="Boneco Max Steel">
                    </div>
                    <div class="input input-categoria" id="select_categoria_update">
                        <label for="categoria">Categoria</label>
                        <select name="categoria" required></select>
                    </div>
                </div>

                <input type="hidden" id="id_update" name="id_update">

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
    $(document).ready(function() {
        getCategorias();
        $('.editar_produto').click(function(e) {
            e.preventDefault();
            var id = $('.idProdutos').text();
            var url = `./produto/edit/${id}`;

            $.ajax({
                type: "GET",
                url: `${url}`,
                dataType: "json",
                success: function(response) {
                    $("#nome_produto_update input").val(response.nome);
                    $("#id_update").val(response.idProduto);
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });
    });

    function getCategorias() {
        $.ajax({
            url: '{{ route('produto.create') }}',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $.each(response, function(i, item) {
                    $("#select_categoria_update>select").append(
                        `<option value="${item.id}">${item.nome_categoria}</option>`);
                });
            },
            error: function(response) {
                console.error(response);
            }
        });
    }
</script>
