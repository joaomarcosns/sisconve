@extends('layout.layout')
@section('title', 'Realizar Venda')

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
    <div class="dashboard sell-products">
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
                    <img src="{{ asset('img/car-compra.svg') }}" alt="Realizar venda">
                    Venda
                </span>
                <span>/</span>
                <span>Realizar Venda</span>
            </div>
            <div class="caixa-id">
                <span>Caixa ativo: <strong>{{ session('funcionario')->numero_caixa }}</strong></span>
            </div>
        </div>

        <form action="{{ route('venda.store') }}" method="POST" class="sell" onsubmit="setFormSubmitting()">
            @csrf
            <div class="sell-area">
                <div class="section section-sell-area p-0 m-0">
                    <div class="title-section">
                        <h3>Lista de Produtos</h3>
                    </div>
                    <div class="table-section">
                        <table class="table-scroll m-0" id="table-items-venda">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome do Produto</th>
                                    <th>Valor de Venda</th>
                                    <th>Quantidade</th>
                                    <th>Valor Total</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody id="table-body-items-venda"></tbody>
                        </table>
                    </div>
                    <div class="sell-info">
                        <div class="client">
                            <button type="button" id="btn" data-toggle="modal" data-target="#client-modal">
                                <img src="{{ asset('img/Selecionar-Cliente.svg') }}" alt="Cliente">
                                Cliente
                            </button>
                            <div class="data-sell-info">
                                <input type="text" id="name-client" value="CLIENTE PADRÃO" disabled>
                            </div>

                            <!-- modal para selecionar o cliente -->
                            <div class="modal fade" id="client-modal" tabindex="-1" aria-labelledby="client-modalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header float-right">
                                            <h5>Cliente</h5>
                                            <div class="close-modal">
                                                <img data-dismiss="modal" src="{{ asset('img/block-icon-black.svg') }}"
                                                    alt="Fechar">
                                            </div>
                                        </div>

                                        <div class="modal-select">
                                            <label for="cliente">Selecione um cliente</label>
                                            <select name="cliente" id="nome-cliente">
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

                        </div>
                        <div class="payment">
                            <button type="button" id="btn" onclick="metPagamento()" data-toggle="modal"
                                data-target="#payment-modal">
                                <img src="{{ asset('img/Meio-Pagamento.svg') }}" alt="Metodo de Pagamento">
                                Pagamento
                            </button>
                            <div class="data-sell-info">
                                <input type="text" id="met-pag" value="À VISTA" disabled required>
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
                                                <select name="metodo_pagamento" id="metodo-pagamento"
                                                    onchange="metPagamento()" required>
                                                    <option value="1" selected>À VISTA</option>

                                                </select>
                                            </div>
                                            <div class="input-parcel">
                                                <label for="num-parcelas">Número de parcelas</label>
                                                <input type="text" id="input-parcela" name="num_parcelas" min="1" max="99"
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

                        </div>
                        <div class="add-product">
                            <button type="button" id="btn-add-item" data-toggle="modal" data-target="#add-item-modal">
                                <img src="{{ asset('img/adicionar-item.svg') }}" alt="Adicionar Item">
                                Adicionar Item
                            </button>

                            <!-- modal add-items -->
                            <div class="modal fade" id="add-item-modal" tabindex="-1"
                                aria-labelledby="logoff-modalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-add-items-sell modal-dialog-centered">
                                    <div class="modal-content modal-content-add-items">
                                        <div class="modal-header float-right">
                                            <h5>Adicionar um item a venda</h5>
                                            <div class="close-modal">
                                                <img data-dismiss="modal" src="{{ asset('img/block-icon-black.svg') }}"
                                                    alt="Fechar">
                                            </div>
                                        </div>
                                        <div class="modal-select">
                                            <div class="input-modal-add-item">
                                                <div class="input-product">
                                                    <label>Nome do produto</label>
                                                    <select id="nome-produto" class="select name-product" required>
                                                        <option value="" disabled selected>Selecione um produto</option>
                                                    </select>
                                                </div>
                                                <div class="input-quantidade">
                                                    <label>Quantidade</label>
                                                    <input id="quantidade-item" oninput="validaInputNumber(this)"
                                                        class="quant-product" type="text" min="1" value="1" required>
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
            <div class="sell-attributes">
                <div class="value-cart">
                    <span id="total-value">Valor total R$</span>
                    <span id="value-cart">0.00</span>
                </div>
                <div class="buttons">
                    <button type="button" id="cancelar-venda" class="cancel">
                        <span>Cancelar Venda</span>
                        <img src="{{ asset('img/block-icon.svg') }}" alt="Cancelar venda">
                    </button>
                    <button type="submit" id="finalizar-venda" class="accept">
                        <span>Finalizar Venda</span>
                        <img src="{{ asset('img/check-icon.svg') }}" alt="Finalizar venda">
                    </button>
                </div>
            </div>
        </form>
    </div>

    </div>
    <!-- box-center fim -->

    </div>
@endsection


@section('script')
    <script>
        var produtos = [];
        var estoqueProduto = [];
        var clientes = [];
        var metPag = [];

        $(document).ready(function() {
            metPag[1] = {
                id: 1,
                tipo: "à vista"
            }
            getAll();


            var buttonAddItem = document.getElementById("btn-add-item");
            var inputNomeProduto = document.getElementById("nome-produto");
            var inputQuantProduto = document.getElementById("quantidade-item");
            var tableBodyItems = document.getElementById("table-body-items-venda");
            var buttonAddItemModal = document.getElementById("btn-add-item-modal");
            var cancelarVenda = document.getElementById("cancelar-venda");
            var finalizarVenda = document.getElementById("finalizar-venda");
            var valorTotalVenda = document.getElementById("value-cart");
            var table = document.getElementById("table-items-venda");
            var indiceTable = 0;

            buttonAddItem.addEventListener("click", () => {
                inputNomeProduto.value = "";
                inputQuantProduto.value = 1;
            });

            $("#btn-add-item-modal").click(function(e) {
                e.preventDefault();

                if (inputQuantProduto.value > estoqueProduto[inputNomeProduto.value]) {
                    return alert("Não existe essa quantidade para esse produto cadastrado em estoque!");
                }

                if (inputNomeProduto.value != "" && inputQuantProduto.value != "") {

                    estoqueProduto[inputNomeProduto.value] -= inputQuantProduto.value;

                    tableBodyItems.innerHTML += `
                <tr>
                    <td>${indiceTable+1}</td>
                    <td>
                        <input type="text" name="id_produto[]" value="${inputNomeProduto.value}" required style="display: none">
                        ${produtos[inputNomeProduto.value].nome}
                    </td>
                    <td>
                        <input type="text" name="valor_unitario[]" value="${(produtos[inputNomeProduto.value].valor)}" required style="display: none">
                        R$ ${(produtos[inputNomeProduto.value].valor)}
                    </td>
                    <td>
                        <input type="text" id="quantidade-produto" name="quantidade_produto[]" value="${inputQuantProduto.value}" required style="display: none">
                        ${inputQuantProduto.value} unid
                    </td>
                    <td>
                        <input type="text" id="valor-total-produto" value="${(parseInt(inputQuantProduto.value)*produtos[inputNomeProduto.value].valor)}" required style="display: none">
                        R$ ${(parseInt(inputQuantProduto.value)*produtos[inputNomeProduto.value].valor)}
                    </td>
                    <td>
                        <button title="Remover item" onclick="removeRow(this)">
                            <img src="{{ asset('img/lixeira-btn.svg') }}" alt="Remover Produto">
                        </button>
                    </td>
                </tr>
            `;
                }

                indiceTable++;
                countTableRows();
                setTotalValue();
            });



            function countTableRows() {
                if (table.rows.length == 1) {
                    finalizarVenda.disabled = true;
                    cancelarVenda.disabled = true;
                    finalizarVenda.style.cursor = "not-allowed";
                    cancelarVenda.style.cursor = "not-allowed";
                    finalizarVenda.style.opacity = "70%";
                    cancelarVenda.style.opacity = "70%";
                } else {
                    finalizarVenda.disabled = false;
                    cancelarVenda.disabled = false;
                    finalizarVenda.style.cursor = "pointer";
                    cancelarVenda.style.cursor = "pointer";
                    finalizarVenda.style.opacity = "100%";
                    cancelarVenda.style.opacity = "100%";
                }
            }

            cancelarVenda.addEventListener("click", () => {
                var value = confirm("Deseja cancelar a venda?");
                if (value) {
                    tableBodyItems.innerHTML = "";
                    // devolvendo a quantidade dos produtos para a variavel estoque
                    produtos.forEach(produto => {
                        estoqueProduto[produto.id] = produto.quantidade;
                    });
                }
                indiceTable = 0;
                countTableRows();
                setTotalValue();
            });

            // //////////////////////////////////////////////////
            // //                 modal clientes

            // var clientes = [];
            $("#nome-cliente").change(function(e) {
                e.preventDefault();
                $("#name-client").val(clientes[$("#nome-cliente").val()].nome.toUpperCase());

            });

            // //////////////////////////////////////////////////
            // //           modal metodo de pagamento
            $("#metodo-pagamento").change(function(e) {
                e.preventDefault();
                $("#met-pag").val(metPag[parseInt($("#metodo-pagamento").val())].tipo.toUpperCase());
            });
            /////////////////////////////////////
            metPagamento();
        });

        function validaInputNumber(input) {
            input.value = input.value.replace(/[^0-9]/g, '');
        }

        function setTotalValue() {
            var valores = document.querySelectorAll("#valor-total-produtoZ");
            var valorTotal = 0;
            valores.forEach((valor) => {
                valorTotal += parseFloat(valor.value);
            });

            $("#value-cart").html(valorTotal);
        }

        function removeRow(btn) {
            var row = btn.parentNode.parentNode;
            row.remove(row);
            setTotalValue();
        }

        function getAll() {
            $.ajax({
                type: "GET",
                url: "{{ route('venda.getAll') }}",
                dataType: "json",
                success: function(response) {
                    $('#nome-cliente').empty();
                    $('#nome-cliente').append(
                        '<option value="" disabled selected>Selecione um produto</option>');
                    response.clientes.forEach(function(cliente) {
                        $('#nome-cliente').append('<option value="' + cliente.id + '">' + cliente.nome +
                            '</option>');
                    });

                    response.metoPagamento.forEach(function(metoPagamento) {
                        $('#metodo-pagamento').append('<option value="' + metoPagamento.id + '">' +
                            metoPagamento.nome + '</option>');
                    });

                    $('nome-produto').empty();
                    $('nome-produto').append(
                        '<option value="" disabled selected>Selecione um produto</option>');
                    response.produtos.forEach(function(produto) {
                        $('#nome-produto').append('<option value="' + produto.id + '">' + produto.nome +
                            '</option>');
                    });


                    response.produtos.forEach(function(element) {
                        produtos[`${element.id}`] = {
                            id: element.id,
                            nome: element.nome,
                            valor: element.preco_venda,
                            quantidade: element.quantidade
                        }
                        estoqueProduto[`${element.id}`] = {
                            id: element.id,
                            quantidade: element.quantidade
                        }
                    });

                    response.clientes.forEach(function(element) {
                        clientes[`${element.id}`] = {
                            id: element.id,
                            nome: element.nome
                        }
                    });

                    response.metoPagamento.forEach(element => {
                        metPag[`${element.id}`] = {
                            id: parseInt(element.id),
                            tipo: element.nome,
                        }
                    });

                },
                error: function(error) {
                    console.log(error);
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
