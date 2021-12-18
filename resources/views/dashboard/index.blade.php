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
                            <span><img src="{{ asset("img/chart-icon.svg")}}" alt="">Números</span>
                        </div>
                        <div class="section-card">
                            <div class="card" style="background-color: #00A3FF !important;">
                                <div class="title-card" style="background-color: #0095E9 !important;">
                                    <span>Total de Venda / dia</span>
                                </div>
                                <div class="card-body">
                                    {{-- totalVendaDia' --}}
                                    <strong>40</strong>
                                    <span>vendas</span>
                                </div>
                            </div>
                            <div class="card" style="background-color: #00A507 !important;">
                                <div class="title-card" style="background-color: #1C9821 !important;">
                                    <span>Média de Lucro / dia</span>
                                </div>
                                <div class="card-body">
                                    <span>R$</span>
                                    {{-- mediadeLucroDia' --}}
                                    <strong>20</strong>
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
                                <img src="{{ asset("img/probaixoestoque-btn.svg")}}" alt="">Produtos com baixa no
                                Estoque
                            </span>
                            <button type="button" id="btn" data-toggle="modal" data-target="#cadastrar-cliente-modal"
                                class="grafico">
                                <img src="{{ asset('img/adicionar-item.svg') }}" alt="Adicionar cliente">
                                Grafico
                            </button>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome do Produto</th>
                                    <th>Valor Unitario</th>
                                    <th>Quantidade</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- produtoAbaixoEstoque --}}
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>R$ </td>
                                    <td>
                                        < </td>
                                </tr>
                            </tbody>
                        </table>

                        {{-- grafico --}}
                        <div id="curve_chart" style="display: none; width: 900px; height: 500px">
                            oi
                        </div>
                        {{--  --}}
                    </div>

                    <!-- clientes que devem... -->
                    <div class="section">
                        <div class="section-title">
                            <span><img src="{{ asset("img/cliParcleasVencendo.svg")}}" alt="">Clientes com parcelas
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        var count = 0;
        $(document).ready(function() {
            $('.grafico').click(function() {
                if (count == 0) {
                    $('#curve_chart').show();
                    count = 1;
                } else {
                    $('#curve_chart').hide();
                    count = 0;
                }
            });
        });
    </script>
@endsection
