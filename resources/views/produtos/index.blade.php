@extends('layout.layout')

@section('title', 'Dashboard')

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
                    <img src="{{ asset('img/product-dark.svg') }}" alt="Produto">
                    Produtos
                </span>
            </div>
        </div>

        <div class="item-area">
            <div class="manage-item-top">

                <button type="button" id="btn" data-toggle="modal" data-target="#cadastrar-produto-modal">
                    <img src="{{ asset('img/adicionar-item.svg') }}" alt="Adicionar produto">
                    Cadastrar Produto
                </button>
                <!-- modal para cadastro do produto -->
                @include('produtos.create')
                @include('produtos.show')
                @include('produtos.update')
                @include('produtos.destroy')

            </div>
            <div class="table-item-area">
                <table id="table-item">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome do Produto</th>
                            <th>Categoria</th>
                            <th>Preço de Compra</th>
                            <th>Preço de Venda</th>
                            <th>Quantidade</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $categoria)
                            <tr id="item-details">
                                <td class="idProdutos">{{ $categoria->id }}</td>
                                <td>{{ $categoria->nome_produto }}</td>
                                <td>{{ $categoria->nome_categoria }}</td>
                                <td>R$ {{ $categoria->preco_compra }}</td>
                                <td>R$ {{ $categoria->preco_venda }}</td>
                                <td>{{ $categoria->quantidade }}</td>
                                <td>
                                    <button type="button" title="Ver produto">
                                        <img src="{{ asset('img/eye-icon.svg') }}" data-toggle="modal"
                                            data-target="#show-produto-modal" alt="Ver produto" class="show_produto">
                                    </button>
                                    <button type="button" title="Editar produto">
                                        <img src="{{ asset('img/pencil-icon.svg') }}" data-toggle="modal"
                                            data-target="#editar-produto-modal" alt="Editar produto" class="editar_produto">
                                    </button>
                                    <button type="button" title="Exluir produto">
                                        <img src="{{ asset('img/trash-icon.svg') }}" data-toggle="modal"
                                            data-target="#deletar-produto-modal" alt="Exluir produto"
                                            class="deletar_produto">
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
