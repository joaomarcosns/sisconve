<div class="modal fade" id="cadastrar-caixa-modal" tabindex="-1" aria-labelledby="cadastrar-caixa-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header float-right">
                <h5>Cadastrar caixa</h5>
                <div class="modal-header d-block modal-header-add-items float-right">
                    <div class="close-modal">
                        <img data-dismiss="modal" class="close" src="{{ asset('img/block-icon-black.svg') }}"
                            alt="Fechar" data-bs-dismiss="modal">
                    </div>
                </div>
            </div>

            <form action="" id="caixaCastrar">
                <div class="form">
                    <div class="input-num-caixa" id="numero_caixa">
                        <label for="numero_caixa">Número do caixa <small>(somente números)</small></label>
                        <input type="text" name="numero_caixa" oninput="validaInputNumber(this)" maxlength="99" placeholder="Ex.: 1" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="close" data-bs-dismiss="modal">
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

@section('script')

    <script>
        $(() => {
            $('#caixaCastrar').submit(function (e) { 
                e.preventDefault(); 
                var message = "Cadastro realizado com sucesso!";
                $('#numero_caixa>input').prop('disabled', true);
                $('#btnSubmit').prop('disabled', true);
                $('#btnClose').prop('disabled', true);

                $.ajax({
                    type: "POST",
                    url: "{{route('caixa.store')}}",
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                        "numero_caixa": $('#numero_caixa>input').val()
                    },
                    dataType: "json",
                    success: function (response) {
                        $('#btnSubmit').prop('disabled', false);    
                        $('#btnClose').prop('disabled', false);
                        $('#numero_caixa>input').prop('disabled', false);
                        $('#toast').append(
                            `<div class="toast-body bg-green" id="message">${message}</div>`
                        );
                        $('#toast').toast('show');

                        $('#caixaCastrar input').each(function() {
                        $(this).val('');
                        });
                        $('#caixaCastrar select').each(function() {
                            $(this).val('');
                        });
                        $('#cadastrar-caixa-modal').modal({
                            keyboard: false
                        })
                        location.reload();
                    },
                    error: function (response) {
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

                    $('#numero_caixa>input').prop('disabled', false);

                    $('#btnSubmit').css("background-color", "#00AC4F");
                    $('#btnClose').css("background-color", "#CD0000");
                    }
                });
            });
            
        });

        function validaInputNumber(input) {
            input.value = input.value.replace(/[^0-9]/g, '');
        }
    </script>
    
@endsection