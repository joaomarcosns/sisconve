@extends('layout.layout')
@section('title', 'Venda')

@section('conteudo')
    <div class="dashboard">
        <div class="title-content">
            <div class="title-text">
                <span>
                    <a href="{{route('dashboard.index')}}">
                        <img src="../public/img/dashboard-verde.svg" alt="Dashboard">
                        Dashboard
                    </a>
                </span>
                <span>/</span>
                <span>
                    <img src="../public/img/car-compra.svg" alt="Vendas">
                    Vendas
                </span>
                <span>/</span>
                <span>Ver vendas</span>
            </div>
        </div>

        <div class="item-area">
            <div class="manage-item-top">
                <div class="search-item">
                    <input id="search" onkeyup="search()" type="text" placeholder="Procure por uma venda">
                    <img src="../public/img/search-icon.svg" alt="Search">
                </div>
            </div>

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
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>R$ </td>
                            <td></td>
                            <td>
                                <a title="Ver venda" href="#">
                                    <img src="../public/img/eye-icon.svg" alt="">
                                </a>
                                <a title="Editar venda" href="#">
                                    <img src="../public/img/pencil-icon.svg" alt="">
                                </a>
                                <a title="Exluir venda" href="#">
                                    <img src="../public/img/trash-icon.svg" alt="">
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
