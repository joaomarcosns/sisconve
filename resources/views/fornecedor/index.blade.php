@extends('layout.layout')

@section('title', 'Fornecedor')


@section('conteudo')
    <div class="dashboard">
        <div class="title-content">
            <div class="title-text">
                <span>
                    <a href="dashboard.index">
                        <img src="{{ asset("img/dashboard-verde.svg")}}" alt="Dashboard">
                        Dashboard
                    </a>
                </span>
                <span>/</span>
                <span>
                    <img src="{{ asset("img/truck-icon.svg")}}" alt="Fornecedor">
                    Fornecedores
                </span>
            </div>
        </div>

        <div class="item-area">
            <div class="manage-item-top">
                <!-- include moda -->
                @include('fornecedor.create')
                @include('fornecedor.show')
                @include('fornecedor.edit')
                <!-- include modal -->
                <button type="button" id="btn" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#fornecedorModal">
                    <img src="{{ asset("img/adicionar-item.svg")}}" alt="Adicionar fornecedor">
                    Cadastrar Fornecedor
                </button>
            </div>

            <div class="table-item-area" id="tableFornecedores">
                <table id="table-item" class="mdl-data-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome do Fornecedor</th>
                            <th>CNPJ</th>
                            <th>Tipo</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fornecedores as $fornecedor)
                            <tr>
                                <td class="id">{{ $fornecedor->id }}</td>
                                <td>{{ $fornecedor->nome_fantasia }}</td>
                                <td>{{ $fornecedor->cnpj }}</td>
                                <td>{{ $fornecedor->tipo }}</td>
                                <td>
                                    <a class="ver" style="cursor: pointer" title="Ver fornecedor" data-bs-toggle="modal"
                                    data-bs-target="#fornecedorModalShow">
                                        <img src="{{ asset("img/eye-icon.svg")}}" alt="Ver fornecedor">
                                    </a>
                                    <a class="edit" title="Editar fornecedor" style="cursor: pointer">
                                        <img src="{{ asset("img/pencil-icon.svg")}}" data-bs-toggle="modal"
                                        data-bs-target="#fornecedorModalEdit" alt="Editar fornecedor">
                                    </a>
                                    <a  title="Exluir fornecedor" style="cursor: pointer">
                                        <img src="{{ asset("img/trash-icon.svg")}}" alt="Excluir fornecedor">
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
