<link rel="stylesheet" href="{{ asset('css/modal/categoria/show-categoria.css') }} ">
<div class="modal fade" id="show-categoria-modal" tabindex="-1" aria-labelledby="show-categoria-modalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header float-right">
                <h5>Categoria</h5>
                <div class="modal-header d-block modal-header-add-items float-right">
                    <div class="close-modal">
                        <img data-bs-dismiss="modal" src="{{ asset('img/block-icon-black.svg') }}" alt="Fechar">
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="input-nome-categoria" style="width: 95%" id="nome_categoria_show">
                    <label for="nome_categoria_show">Nome da categoria</label>
                    <input type="text" name="nome_categoria_show" placeholder="nome da categoria" disabled>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(() => {
        $('.ver_categoria').click(function(e) {
            e.preventDefault();
            var id = $(this).parent().parent().find('.idCategoria').text();
            var url = `./categoria/show/${id}`;
            $.ajax({
                type: "GET",
                url: `${url}`,
                dataType: "json",
                success: function(response) {
                    $('#nome_categoria_show>input').val(response.nome_categoria);
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });
    })
</script>
