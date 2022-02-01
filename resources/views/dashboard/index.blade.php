@extends('layout.layout')

@section('title', 'Dashboard')
@section('conteudo')
    <div class="dashboard">
        <div class="title-content">
            <div class="title-text">
                <span>
                    <img src="{{ asset('img/dashboard-verde.svg') }}" alt="Dashboard">
                    Dashboard
                </span>
                <span>/</span>
            </div>
        </div>
        <div class="main-page">
            <div class="content-dashboard">
                <div class="content">
                    <div class="section">
                        <div class="section-title">
                            <span><img src="{{ asset('img/chart-icon.svg') }}" alt="">Números</span>
                        </div>
                        <div class="section-card">
                            <div class="card" style="background-color: #00A3FF !important;">
                                <div class="title-card" style="background-color: #0095E9 !important;">
                                    <span>Total de Venda / dia</span>
                                </div>
                                <div class="card-body">
                                    {{-- totalVendaDia' --}}
                                    <strong>{{ $cardVenda }}</strong>
                                    <span>vendas</span>
                                </div>
                            </div>
                            <div class="card" style="background-color: #00A507 !important;">
                                <div class="title-card" style="background-color: #1C9821 !important;">
                                    <span>Total Recolhidos/ dia</span>
                                </div>
                                <div class="card-body">
                                    <span>R$</span>
                                    {{-- mediadeLucroDia' --}}
                                    <strong>{{$cardRecolhidos}}</strong>
                                </div>
                            </div>
                            <div class="card" style="background-color: #11858C !important;">
                                <div class="title-card" style="background-color: #25767B !important;">
                                    <span>Total de Clientes</span>
                                </div>
                                <div class="card-body">
                                    <strong>{{ $clientes }}</strong>
                                    <span>clientes</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Produtos que tem baixa no estoque... -->
                    <div class="section">
                        <div class="section-title d-flex justify-content-between">
                            <span>
                                <img src="{{ asset('img/probaixoestoque-btn.svg') }}" alt="">
                                Produtos com baixa no estoque
                            </span>
                            <button type="button" id="btnUm" data-toggle="modal" data-target="#cadastrar-cliente-modal"
                                class="grafico">
                                <i class="far fa-chart-bar"></i>
                                Tabela
                            </button>
                        </div>
                        {{-- grafico --}}
                        <canvas id="myChart" style="width:100%; height: 95%; max-width:90rem; "></canvas>
                        {{--  --}}
                        <table id="produtoAbaixoEstoque" style="display: none">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome do Produto</th>
                                    <th>Valor Unitario</th>
                                    <th>Quantidade em Estoque</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- produtoAbaixoEstoque --}}
                                @foreach ($produtosAbaixoEstoque as $produtoAbaixoEstoque)
                                    <tr>
                                        <td>{{ $produtoAbaixoEstoque->id }}</td>
                                        <td>{{ $produtoAbaixoEstoque->nome_produto }}</td>
                                        <td>R$ {{ $produtoAbaixoEstoque->preco_venda }}</td>
                                        <td>{{ $produtoAbaixoEstoque->quantidade }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- clientes que devem... -->
                    {{-- <div class="section">
                        <div class="section-title">
                            <span><img src="{{ asset('img/cliParcleasVencendo.svg') }}" alt="">Clientes com parcelas
                                vencendo</span>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome do Cliente</th>
                                    <th scope="col">Valor da Parcela</th>
                                    <th scope="col">Vencimento</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div> --}}
                    {{-- Produto mais vendido --}}
                    <div class="section">
                        <div class="section-title d-flex justify-content-between">
                            <span>
                                <img src="{{ asset('img/probaixoestoque-btn.svg') }}" alt="">
                                Produto mais vendido
                            </span>
                            <button type="button" id="btnDois" data-toggle="modal" data-target="#cadastrar-cliente-modal"
                                class="grafico graficoDois">
                                <i class="far fa-chart-bar"></i>
                                Tabela
                            </button>
                        </div>
                        {{-- grafico --}}
                        <canvas id="myChartDois" style="width:100%; height: 95%; max-width:90rem; "></canvas>
                        {{--  --}}
                        <table id="prodMaisVendPorCategoria" style="display: none">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome do Produto</th>
                                    <th>Valor Unitario</th>
                                    <th>Quantidade de Vendas</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Produto mais vendido --}}
                                @foreach ($produtoMaisVendidos as $produtoMaisVendido)
                                    <tr>
                                        <td>{{ $produtoMaisVendido->id }}</td>
                                        <td>{{ $produtoMaisVendido->nome_produto }}</td>
                                        <td>R$ {{ $produtoMaisVendido->preco_venda }}</td>
                                        <td>{{ $produtoMaisVendido->quantidade }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{--  --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script>
        var count = 0;
        var countDois = 0;
        $(document).ready(function() {
            graficoUm();
            graficoDois();
            $('#btnUm').click(function() {
                if (count == 0) {
                    $('#produtoAbaixoEstoque').fadeIn();
                    count = 1;
                } else {
                    $('#produtoAbaixoEstoque').fadeOut();
                    count = 0;
                }
            });
            // 
            $('#btnDois').click(function() {
                if (count == 0) {
                    $('#prodMaisVendPorCategoria').fadeIn();
                    count = 1;
                } else {
                    $('#prodMaisVendPorCategoria').fadeOut();
                    count = 0;
                }
            });
        });

        function graficoUm() {
            $.ajax({
                type: "GET",
                url: "{{ route('dashboard.graficoUm') }}",
                dataType: "json",
                success: function(response) {
                    new Chart("myChart", {
                        type: "bar",
                        data: {
                            labels: response.nome,
                            datasets: [{
                                backgroundColor: response.cor,
                                data: response.quantidade
                            }]
                        },
                        options: {
                            legend: {
                                display: false
                            },
                            title: {
                                display: true,
                                text: "Produtos com baixa no estoque"
                            }
                        }
                    });
                },
                error: function(response) {
                    console.log(response);
                }
            });
        }

        function graficoDois() {

            $.ajax({
                type: "GET",
                url: "{{ route('dashboard.graficoDois') }}",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    // var xValues = ["A", "B", "C", "D", "E"];
                    // var yValues = [55, 49, 44, 24, 15];
                    // var barColors = ["red", "green", "blue", "orange", "brown"];

                    new Chart("myChartDois", {
                        type: "bar",
                        data: {
                            labels: response.nome,
                            datasets: [{
                                backgroundColor: response.cor,
                                data: response.quantidade
                            }]
                        },
                        options: {
                            legend: {
                                display: false
                            },
                            title: {
                                display: true,
                                text: "Produtos mais vendidos"
                            }
                        }
                    });
                }
            });

        }
    </script>
@endsection
