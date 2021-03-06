@extends('layout.layout')
@section('title', 'Comprar')

@section('conteudo')
    @if (session('error'))
    <div class="toast fade show slideInUp" id="toast">
        <div class="toast-body bg-red">
            {{ session('error') }}
        </div>
    </div>
    @elseif (session('success'))
    <div class="toast fade show slideInUp" id="toast">
        <div class="toast-body bg-green">
            {{ session('success') }}
        </div>
    </div>
    @endif

    <div class="dashboard buy-page">
        <div class="title-content">
            <div class="title-text">
                <span>
                    <a href="{{ route('dashboard.index') }}">
                        <img src="{{ asset('img/dashboard-verde.svg') }}" alt="Dashboard">
                        Dashboard
                    </a>
                </span>
                <span>/</span>
                <span>
                    <img src="{{ asset('img/plus-icon-dark.svg') }}" alt="Compras">
                    Compras
                    <span>/</span>
                    Registrar compra
                </span>
            </div>
        </div>

        <form action="{{ route('compra.store') }}" class="buy" method="POST" onsubmit="setFormSubmitting()"
            id="">
            @csrf
            <div class="buy-area">
                <div class="section section-buy-area p-0 m-0">
                    <div class="title-section">
                        <h3>Lista de Produtos</h3>
                    </div>
                    <div class="table-section">
                        <table class="table-scroll m-0" id="table-items-compra">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome do Produto</th>
                                    <th>IPI</th>
                                    <th>ICMS</th>
                                    <th>Frete</th>
                                    <th>Valor Unitário</th>
                                    <th>Quantidade</th>
                                    <th>Valor Total <small>(+ impostos)</small></th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody id="table-body-items-compra"></tbody>
                        </table>
                    </div>
                    <div class="buy-info">
                        <div class="fornecedor">
                            <button type="button" id="btn" data-toggle="modal" data-target="#fornecedor-modal">
                                <img src="{{ asset('img/fornecedor.svg') }}" alt="Fornecedor">
                                Fornecedor
                            </button>
                            <div class="data-buy-info">
                                <input type="text" id="name-fornecedor" value="SELECIONE UM FORNECEDOR" disabled>
                            </div>
                        </div>

                        <!-- modal para selecionar o fornecedor -->
                        <div class="modal fade" id="fornecedor-modal" tabindex="-1"
                            aria-labelledby="fornecedor-modalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header float-right">
                                        <h5>Fornecedor</h5>
                                        <div class="close-modal">
                                            <img data-dismiss="modal" src="{{ asset('img/block-icon-black.svg') }}"
                                                alt="Fechar">
                                        </div>
                                    </div>

                                    <div class="modal-select">
                                        <label for="fornecedor">Selecione um fornecedor</label>
                                        <select name="fornecedor_id" id="nome-fornecedor">
                                            <option value="" selected disabled>SELECIONE UM FORNECEDOR</option>
                                        </select>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="confirm" data-dismiss="modal">
                                            <img src="{{ asset('img/check-icon.svg') }}" alt="Confirmar">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- fim modal -->

                        <div class="payment">
                            <button type="button" id="btn" data-toggle="modal" onclick="metPagamento()"
                                data-target="#payment-modal">
                                <img src="{{ asset('img/Meio-Pagamento.svg') }}" alt="Metodo de Pagamento">
                                Pagamento
                            </button>
                            <div class="data-buy-info">
                                <input type="text" id="met-pag" value="À VISTA" disabled required>
                            </div>
                        </div>

                        <!-- modal para o metodo de pagamento -->
                        <div class="modal fade" id="payment-modal" tabindex="-1" aria-labelledby="logoff-modalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header float-right">
                                        <h5>Método de Pagamento</h5>
                                        <div class="close-modal">
                                            <img data-dismiss="modal" src="{{ asset('img/block-icon-black.svg') }}"
                                                alt="Fechar">
                                        </div>
                                    </div>

                                    <div class="modal-select d-flex">
                                        <div class="input-met-pag">
                                            <label for="metodo-pagamento">Selecione o método de pagamento</label>
                                            <select name="metodo-pagamento" id="metodo-pagamento" onchange="metPagamento()"
                                                required>
                                                <option value="1" selected>À VISTA</option>
                                            </select>
                                        </div>
                                        <div class="input-parcel">
                                            <label for="num-parcelas">Número de parcelas</label>
                                            <input type="text" id="input-parcela" name="parcelas" min="1" max="99"
                                                oninput="validaInputNumber(this)" maxlength="2" value="1" required>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="confirm" data-dismiss="modal">
                                            <img src="{{ asset('img/check-icon.svg') }}" alt="Confirmar">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- fim modal -->

                        <div class="add-product">
                            <button type="button" id="btn-add-item" data-toggle="modal" data-target="#add-item-modal">
                                <img src="{{ asset('img/adicionar-item.svg') }}" alt="Adicionar Item">
                                Adicionar Item
                            </button>

                            <!-- modal add-items -->
                            <div class="modal fade" id="add-item-modal" tabindex="-1"
                                aria-labelledby="logoff-modalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-add-items-buy modal-dialog-centered">
                                    <div class="modal-content modal-content-add-items">
                                        <div class="modal-header float-right">
                                            <h5>Adicionar um item a lista de compra</h5>
                                            <div class="close-modal">
                                                <img data-dismiss="modal" src="{{ asset('img/block-icon-black.svg') }}"
                                                    alt="Fechar">
                                            </div>
                                        </div>
                                        <div class="modal-select">
                                            <div class="input-modal-add-item">
                                                <div class="input-produt-quant">
                                                    <div class="input input-product">
                                                        <label>Nome do produto</label>
                                                        <select id="nome-produto" class="select name-product">
                                                            <option value="" disabled selected>Selecione um produto</option>

                                                        </select>
                                                    </div>
                                                    <div class="input input-quant">
                                                        <label>Quantidade <small>(somente números)</small></label>
                                                        <input id="quantidade-item" oninput="validaInput(this)"
                                                            class="quant-product" type="number" min="1" value="1">
                                                    </div>
                                                </div>

                                                <div class="input-frete-unidad">
                                                    <div class="input input-valor-unit">
                                                        <label>Valor R$ <strong>UNID</strong> <small>(somente
                                                                números)</small></label>
                                                        <input id="valor-unit" oninput="validaInput(this)"
                                                            class="valor-unit" type="number" step="0.1" min="0"
                                                            value="0.00">
                                                    </div>
                                                    <div class="input input-frete">
                                                        <label><strong>Valor em <small>%</small> de FRETE</strong>
                                                            <small>(somente números)</small></label>
                                                        <input id="frete" oninput="validaInput(this)" class="frete"
                                                            type="number" step="0.1" min="0" value="0.00">
                                                    </div>
                                                </div>
                                                <div class="input-ipi-icms">
                                                    <div class="input input-ipi">
                                                        <label><strong>Valor em <small>%</small> de IPI</strong>
                                                            <small>(somente números)</small></label>
                                                        <input id="ipi" oninput="validaInput(this)" class="ipi"
                                                            type="number" step="0.1" min="0" value="0.00">
                                                    </div>
                                                    <div class="input input-icms">
                                                        <label><strong>Valor em <small>%</small> de ICMS</strong>
                                                            <small>(somente números)</small></label>
                                                        <input id="icms" oninput="validaInput(this)" class="icms"
                                                            type="number" step="0.1" min="0" value="0.00">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="exit-add" data-dismiss="modal"
                                                class="cancel btn-modal">
                                                Cancelar
                                                <img src="{{ asset('img/block-icon.svg') }}" alt="Cancelar">
                                            </button>
                                            <button type="button" class="confirm-add" id="btn-add-item-modal"
                                                data-dismiss="modal" class="confirm btn-modal">
                                                Adicionar
                                                <img src="{{ asset('img/check-icon.svg') }}" alt="Confirmar">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- fim modal  -->

                        </div>
                    </div>
                </div>

            </div>
            <div class="buy-attributes">
                <div class="value-cart">
                    <span id="total-value">Valor total R$</span>
                    <span id="value-cart">0.00</span>
                </div>
                <div class="buttons">
                    <button type="button" id="cancelar-compra" class="cancel">
                        <span>Limpar Lista</span>
                        <img src="{{ asset('img/block-icon.svg') }}" alt="Limpar Lista">
                    </button>
                    <button type="submit" id="finalizar-compra" class="accept">
                        <span>Registrar Compra</span>
                        <img src="{{ asset('img/check-icon.svg') }}" alt="Finalizar compra">
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        var produtos = [];
        var fornecedor = [];
        var metPag = [];


        $(document).ready(function() {
            metPag[1] = {
                id: 1,
                tipo: "à vista"
            }

            var buttonAddItem = document.getElementById("btn-add-item");
            var buttonAddItemModal = document.getElementById("btn-add-item-modal");
            var tableBodyItems = document.getElementById("table-body-items-compra");
            var valorTotalVenda = document.getElementById("value-cart");

            var inputNomeProduto = document.getElementById("nome-produto");
            var inputQuantProduto = document.getElementById("quantidade-item");
            var inputIcms = document.getElementById("icms");
            var inputIpi = document.getElementById("ipi");
            var inputFrete = document.getElementById("frete");
            var inputPrecoUni = document.getElementById("valor-unit");

            getFonecedores();
            $("#btn-add-item").click(function(e) {
                e.preventDefault();
                inputNomeProduto.value = "";
                inputQuantProduto.value = 1;
                inputFrete.value = "0.00";
                inputIcms.value = "0.00";
                inputPrecoUni.value = "0.00";
                inputIpi.value = "0.00";

            });

            $("#btn-add-item-modal").click(function(e) {
                e.preventDefault();
                if (inputNomeProduto.value != "" && inputQuantProduto.value != "") {
                    var idProduto = produtos[inputNomeProduto.value].id;
                    var nomeProduto = produtos[inputNomeProduto.value].nome;
                    var quantidadeProduto = parseInt(inputQuantProduto.value)
                    // valores em %
                    var ipi = parseFloat(inputIpi.value) / 100;
                    var icms = parseFloat(inputIcms.value) / 100;
                    var frete = parseFloat(inputFrete.value) / 100;
                    // valor unitario e total da compra  do produto
                    var valorUni = parseFloat(inputPrecoUni.value);
                    var valorTotal = parseFloat((((ipi + icms + frete) * valorUni) + valorUni) *
                        quantidadeProduto);
                    //var valorTotal = 

                    tableBodyItems.innerHTML += `
                        <tr>
                            <td>1</td>
                            <td>
                                <input type="text" name="produto_id[]" value="${idProduto}" required style="display: none">
                                ${nomeProduto}
                            </td>
                            <td>
                                <input type="text" name="ipi[]" value="${ipi}" required style="display: none">
                                <strong>${ipi.toFixed(2)} <small>%</small></strong>
                            </td>
                            <td>
                                <input type="text" name="icms[]" value="${icms}" required style="display: none">
                                <strong>${icms.toFixed(2)} <small>%</small></strong>
                            </td>
                            <td>
                                <input type="text" name="frete[]" value="${frete}" required style="display: none">
                                <strong>${frete.toFixed(2)} <small>%</small></strong>
                            </td>
                            <td>
                                <input type="text" name="valor-unitario[]" value="${valorUni}" required style="display: none">
                                R$ ${valorUni.toFixed(2)}
                            </td>
                            <td>
                                <input type="text" id="quantidade" name="quantidade-produto[]" value="${quantidadeProduto}" required style="display: none">
                                ${quantidadeProduto} unid
                            </td>
                            <td>
                                <input type="text" id="valor-total" value="${valorTotal}" style="display: none">
                                R$ ${valorTotal.toFixed(2)}
                            </td>
                            <td>
                                <button title="Remover item" onclick="removeRow(this); console.log('Opa')" class="removeRow" type="button">
                                    <img src="{{ asset('img/lixeira-btn.svg') }}" alt="Remover Produto">
                                </button>
                            </td>
                        </tr>`;
                }
                setTotalValue();
            });

            /////////////////// Fornecedor ///////////////////////
            var spanTxtSC = $("#name-fornecedor")
            var selectFornecedor = $("#nome-fornecedor")

            $("#nome-fornecedor").change(function(e) {
                e.preventDefault();
                $("#name-fornecedor").val(fornecedor[$("#nome-fornecedor").val()].nome.toUpperCase());
            });

            ////////////////// Metodo Pagamento ////////////////
            var spanTxtMP = $("#met-pag");

            $("#metodo-pagamento").change(function(e) {
                e.preventDefault();
                $("#met-pag").val(metPag[parseInt($("#metodo-pagamento").val())].tipo.toUpperCase());
            });
            ////////////////////////////////////////////////////////////////////////////////////
            metPagamento();
        });

        function removeRow(btn) {
            var row = btn.parentNode.parentNode;
            row.remove(row);
            setTotalValue();
        }

        function setTotalValue() {
            var valores = document.querySelectorAll("#valor-total");
            var valorTotal = 0;
            valores.forEach((valor) => {
                valorTotal += parseFloat(valor.value);
            });

            $("#value-cart").html(valorTotal.toFixed(2));
        }

        function getFonecedores() {
            $.ajax({
                url: "{{ route('compra.getAll') }}",
                type: "GET",
                dataType: "json",
                success: function(response) {

                    // fornecedor
                    $('#nome-fornecedor').empty();
                    $('#nome-fornecedor').append(
                        '<option value="" disabled selected>Selecione um fornecedor</option>');
                    $.each(response.fornecedores, function(key, value) {
                        $('#nome-fornecedor').append('<option value="' + value.id + '">' + value
                            .nome_fantasia + '</option>');
                    });

                    // produto
                    $('#nome-produto').empty();
                    $('#nome-produto').append(
                        '<option value="" disabled selected>Selecione um produto</option>');
                    $.each(response.produtos, function(key, value) {
                        $('#nome-produto').append('<option value="' + value.id + '">' + value
                            .nome_produto + '</option>');
                    });

                    // metodo-pagamento
                    $.each(response.metodosPagamentos, function(key, value) {
                        $('#metodo-pagamento').append('<option value="' + value.id + '">' + value
                            .tipo_pagamento + '</option>');
                    });

                    response.produtos.forEach(element => {
                        produtos[`${element.id}`] = {
                            id: parseInt(element.id),
                            nome: element.nome_produto,
                        }
                    });


                    response.fornecedores.forEach(element => {
                        fornecedor[`${element.id}`] = {
                            id: parseInt(element.id),
                            nome: element.nome_fantasia,
                        }
                    });

                    response.metodosPagamentos.forEach(element => {
                        metPag[`${element.id}`] = {
                            id: parseInt(element.id),
                            tipo: element.tipo_pagamento,
                        }
                    });
                }
            });
        }


        function metPagamento() {
            var selectMetPag = document.getElementById("metodo-pagamento");
            var inputParcela = document.getElementById("input-parcela");
            if (parseInt(selectMetPag.value) == 1) {
                inputParcela.value = 1;
                inputParcela.readOnly = true;
            } else {
                inputParcela.readOnly = false;
            }
        }
    </script>
@endsection
