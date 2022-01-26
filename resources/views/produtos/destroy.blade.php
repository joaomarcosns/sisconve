<div class="modal fade" id="deletar-produto-modal" tabindex="-1" aria-labelledby="cadastrar-produto-modalLabel"
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
            <form action="{{ route('produto.destroy') }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="form">
                    <div class="input input-nome-produto" id="nome_produto_update">
                        <label for="nome-produto" class="text-center">Deja apagar esse produto?</label>
                    </div>
                </div>
                <input type="hidden" id="id_delete" name="id_delete">

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
        $('.deletar_produto').click(function(e) {
            e.preventDefault();
            var id = $('.idProdutos').text();
            var url = `./produto/edit/${id}`;

            $.ajax({
                type: "GET",
                url: `${url}`,
                dataType: "json",
                success: function(response) {
                    $("#id_delete").val(response.idProduto);
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });
    });
</script>
