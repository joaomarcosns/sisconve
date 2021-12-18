@extends('layout.layout')

@section('title', 'Caixa')


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
                    <img src="{{ asset("img/cash-register.svg")}}" alt="Caixa">
                    Caixa
                </span>
            </div>
        </div>

        <div class="item-area">
            <div class="manage-item-top">
                <button type="button" id="btn" data-toggle="modal" data-target="#cadastrar-caixa-modal">
                    
                    <img src="{{ asset('img/adicionar-item.svg') }}" alt="Adicionar caixa">
                    Adicionar Caixa
                </button>

                <!-- modal para cadastro de caixas -->

            </div>

            <div class="table-item-area">
                <table id="table-item">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Número do caixa</th>
                            <th>Valor em caixa</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button title="Ver caixa" onclick="">
                                    <img src="{{ asset("img/eye-icon.svg")}}" alt="Ver caixa">
                                </button>
                                <button title="Editar caixa">
                                    <img src="{{ asset("img/pencil-icon.svg")}}" data-toggle="modal"
                                        data-target="#editar-caixa-modal" alt="Editar caixa">
                                </button>
                                <button title="Exluir caixa">
                                    <img src="{{ asset("img/trash-icon.svg")}}" alt="Excluir caixa">
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
