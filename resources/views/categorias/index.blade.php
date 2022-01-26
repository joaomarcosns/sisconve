@extends('layout.layout')

@section('title', 'Categorias')


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
                    <img src="{{ asset('img/categoria-dark.svg') }}" alt="Categorias">
                    Categorias
                </span>
            </div>
        </div>
        <div class="item-area">
            <div class="manage-item-top">

                <button type="button" id="btn" data-toggle="modal" data-target="#cadastrar-categoria-modal">
                    <img src="{{ asset('img/adicionar-item.svg') }}" alt="Adicionar categoria">
                    Adicionar Categoria
                </button>

                <!-- modal para cadastro de categorias -->
                @include('categorias.create')
                @include('categorias.show')
                @include('categorias.update')
                @include('categorias.destroy')

            </div>

            <div class="table-item-area">
                <table id="table-item">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome da Categoria</th>
                            <th>Quantidade de Produtos</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $categoria)
                            <tr>
                                <td class="idCategoria">{{ $categoria->id }}</td>
                                <td>{{ $categoria->nome_categoria }}</td>
                                <td>{{ $categoria->qunatidade_categoria }}</td>

                                <td>
                                    <button title="Ver categoria" class="ver_categoria">
                                        <img src="{{ asset('img/eye-icon.svg') }}" alt="Ver categoria"
                                            data-bs-toggle="modal" data-bs-target="#show-categoria-modal"
                                            alt="Mostrar categoria">

                                    </button>

                                    <button title="Editar categoria">
                                        <img src="{{ asset('img/pencil-icon.svg') }}" data-toggle="modal"
                                            data-target="#editar-categoria-modal" alt="Editar categoria"
                                            class="editar-categoria">
                                    </button>

                                    <button title="Exluir categoria">
                                        <img src="{{ asset('img/trash-icon.svg') }}" data-toggle="modal"
                                            data-target="#apagar-categoria-modal" alt="Excluir categoria"
                                            class="deletar-categoria">
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
