@extends('layout.layout')
@section('title', 'Venda')

@section('conteudo')
    <div class="dashboard">
        <div class="title-content">
            <div class="title-text">
                <span>
                    <a href="{{route('dashboard.index')}}">
                        <img src="{{ asset("img/dashboard-verde.svg")}}" alt="Dashboard">
                        Dashboard
                    </a>
                </span>
                <span>/</span>
                <span>
                    <img src="{{ asset("img/car-compra.svg")}}" alt="Vendas">
                    Vendas
                </span>
                <span>/</span>
                <span>Ver vendas</span>
            </div>
        </div>

        <div class="item-area">
            <div class="table-item-area">
                <table id="table-item">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Cliente</th>
                            <th>Parcelas</th>
                            <th>Valor total</th>
                            <th>Data</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vendas as $venda)
                        <tr>
                            <td>{{$venda->id}}</td>
                            <td>{{$venda->nome_cliente}}</td>
                            <td>{{$venda->parcela}}</td>
                            <td>R$ {{$venda->valor_total}}</td>
                            <td>{{date('d/m/Y', strtotime($venda->created_at))}}</td>
                            <td>
                                <a title="Ver venda" href="#">
                                    <img src="{{ asset("img/eye-icon.svg")}}" alt="">
                                </a>
                                <a title="Editar venda" href="#">
                                    <img src="{{ asset("img/pencil-icon.svg")}}" alt="">
                                </a>
                                <a title="Exluir venda" href="#">
                                    <img src="{{ asset("img/trash-icon.svg")}}" alt="">
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
