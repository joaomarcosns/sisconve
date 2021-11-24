@extends('layout.layout')
@section('title', 'Clientes')

@section('conteudo')
    <div class="dashboard">
        <div class="title-content">
            <div class="title-text">
                <span>
                    <a href="../DashboardController/dashboard">
                        <img src="../public/img/dashboard-verde.svg" alt="Dashboard">
                        Dashboard
                    </a>
                </span>
                <span>/</span>
                <span>
                    <img src="../public/img/people-icon.svg" alt="Clientes">
                    Clientes
                </span>
            </div>
        </div>

        <div class="item-area">
            <div class="manage-item-top">

                <!-- include moda -->
                @include('clientes.create')
                <!-- include modal -->

                <button type="button" id="btn" data-toggle="modal" data-target="#cadastrar-cliente-modal">
                    <img src="../public/img/adicionar-item.svg" alt="Adicionar cliente">
                    Cadastrar Cliente
                </button>

                <!-- modal cadastro de cliente -->
                {{-- include './../app/include/modal/cadastrar-cliente-modal.php'; ?> --}}

            </div>

            <div class="table-item-area" id="tableClientes">
                <table id="table-item" class="mdl-data-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome do Cliente</th>
                            <th>Contato</th>
                            <th>CPF</th>
                            <th>Crédito</th>
                            <th>Debito</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->id }}</td>
                                <td>{{ $cliente->nome }}</td>
                                <td>({{ $cliente->ddd }}) {{ $cliente->celular }}</td>
                                <td>{{ $cliente->cpf }}</td>
                                <td>R$ {{ $cliente->credito }}</td>
                                <td>R$ {{ $cliente->debito }}</td>
                                <td>
                                    <button title="Ver cliente" onclick="">
                                        <img src="../public/img/eye-icon.svg" alt="">
                                    </button>
                                    <button title="Editar cliente" onclick="">
                                        <img src="../public/img/pencil-icon.svg" alt="">
                                    </button>

                                    <button title="Exluir cliente">
                                        <img src="../public/img/trash-icon.svg" alt="">
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection

