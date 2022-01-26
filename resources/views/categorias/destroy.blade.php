<div class="modal fade" id="apagar-categoria-modal" tabindex="-1" aria-labelledby="cadastrar-categoria-modalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header float-right">
                <h5>Apagar categoria</h5>
                <div class="modal-header d-block modal-header-add-items float-right">
                    <div class="close-modal">
                        <img data-dismiss="modal" src="{{ asset('img/block-icon-black.svg') }}" alt="Fechar">
                    </div>
                </div>
            </div>

            <form action="{{ route('categoria.destroy') }}" method="POST" id="form-cadastro-categoria">
                @csrf
                @method('DELETE')
                <div class="d-flex justify-content-center">
                    <div class="input-nome-categoria" style="width: 95%" id="nome_categoria">
                        <label for="nomecategoria" class="text-center">Deseja apagar a categoria ?</label> 
                        <input type="hidden" name="id" id="id_deletar"> 
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
    $(document).ready(function() {
        $('.deletar-categoria').click(function(e) {
            e.preventDefault();
            var id = $('.idCategoria').text();
            var url = `./categoria/show/${id}`;
            $.ajax({
                type: "GET",
                url: `${url}`,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $('#id_deletar').val(response.id);
                    
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });
    });
</script>

