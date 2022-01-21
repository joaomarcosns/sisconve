@extends('layout.layout')
@section('title', 'Compra')

@section('conteudo')
    <div class="dashboard">
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
                </span>
            </div>
        </div>

        <div class="item-area">
            <div class="manage-item-top">
            </div>

            <div class="table-item-area">
                <table id="table-item">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Comprado por</th>
                            <th>Fornecedor</th>
                            <th>Valor total</th>
                            <th>Data</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($compras as $compra)
                            <tr id="item-details">
                                <td>{{$compra->id}}</td>
                                <td>{{$compra->nome_funcionario}}</td>
                                <td>{{$compra->nome_fantasia}}</td>
                                <td>R$ {{number_format($compra->valor_total)}}</td>
                                <td>{{ date('d/m/Y', strtotime($compra->created_at)) }}</td>
                                <td>
                                    <a title="Ver compra" href="#">
                                        <img src="{{ asset('img/eye-icon.svg') }}" alt="">
                                    </a>
                                    <a title="Editar compra" href="#">
                                        <img src="{{ asset('img/pencil-icon.svg') }}" alt="">
                                    </a>
                                    <a title="Exluir compra" href="#">
                                        <img src="{{ asset('img/trash-icon.svg') }}" alt="">
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
