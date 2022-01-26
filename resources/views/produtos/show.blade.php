<div class="modal fade" id="show-produto-modal" tabindex="-1" aria-labelledby="cadastrar-produto-modalLabel"
    aria-hidden="true">
    
    <div class="toast fade show slideInUp" id="toast">

    </div>
    <div class="modal-dialog modal-cad-produto modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header float-right">
                <h5>Produto</h5>
                <div class="modal-header d-block modal-header-add-items float-right">
                    <div class="close-modal">
                        <img data-dismiss="modal" src="{{ asset('img/block-icon-black.svg') }}" alt="Fechar">
                    </div>
                </div>
            </div>
            <form>
                <div class="form mb-5">
                    <div class="input input-nome-produto" id="nome_produto_show">
                        <label for="nome-produto">Nome do produto</label>
                        <input type="text" name="nome_produto" disabled>
                    </div>
                    <div class="input input-categoria" id="select_categoria-show">
                        <label for="categoria">Categoria</label>
                        <input type="text" name="categoria" disabled>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@section('script')
    <script>
        $(document).ready(function () {
            $('.show_produto').click(function (e) { 
                e.preventDefault();
                var id = $('.idProdutos').text();
                var url = `./produto/show/${id}`;

                $.ajax({
                    type: "GET",
                    url: `${url}`,
                    dataType: "json",
                    success: function (response) {
                        $("#nome_produto_show").find('input').val(response.nome);
                        $("#select_categoria-show").find('input').val(response.categoria);
                    },
                    error: function (response) {
                        console.log(response);
                    }
                });
            });
        });
    </script>
@endsection