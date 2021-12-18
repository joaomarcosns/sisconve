@extends('layout.layout')
@section('title', 'Clientes')

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
                    <img src="{{ asset('img/people-icon.svg') }}" alt="Clientes">
                    Clientes
                </span>
            </div>
        </div>

        <div class="item-area">
            <div class="manage-item-top">
                <button type="button" id="btn" data-toggle="modal" data-target="#cadastrar-cliente-modal">
                    <img src="{{ asset('img/adicionar-item.svg') }}" alt="Adicionar cliente">
                    Cadastrar Cliente
                </button>
            </div>
            <!-- include moda -->
            @include('clientes.create')
            @include('clientes.show')
            @include('clientes.create-endereco')
            @include('clientes.create-contatos')
            <!-- include modal -->

            <div class="table-item-area" id="tableClientes">
                <table id="table-item" class="mdl-data-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome do Cliente</th>
                            <th>CPF</th>
                            <th>Crédito</th>
                            <th>Debito</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td class="idCliente">{{ $cliente->id }}</td>
                                <td>{{ $cliente->nome }}</td>
                                <td>{{ $cliente->cpf }}</td>
                                <td>R$ {{ $cliente->credito }}</td>
                                <td>R$ {{ $cliente->debito }}</td>
                                <td>
                                    <button class="ver_cliente" title="Ver cliente" data-bs-toggle="modal"
                                        data-bs-target="#show-cliente-modal">
                                        <img src="{{ asset('img/eye-icon.svg') }}" alt="">
                                    </button>
                                    <button title="Editar cliente" onclick="">
                                        <img src="{{ asset('img/pencil-icon.svg') }}" alt="">
                                    </button>

                                    <button title="Exluir cliente">
                                        <img src="{{ asset('img/trash-icon.svg') }}" alt="">
                                    </button>
                                    <button title="Adicionar Contatos" data-bs-toggle="modal"
                                        data-bs-target="#create-contatos-modal" class="cadastro_contatos">
                                        <img src="{{ asset('img/phone-plus-icon.svg') }}" alt="">
                                    </button>
                                    <button title="Adicionar Endreço" data-bs-toggle="modal"
                                        data-bs-target="#create-endereco" class="cadastro_endereco">
                                        <img src="{{ asset('img/map-plus-icon.svg') }}" alt="">
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
