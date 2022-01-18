@extends('layout.layout')
@section('title', 'Funcionario')

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
                    <img src="{{ asset('img/funcionario-dark.svg') }}" alt="Funcionario">
                    Funcionários
                </span>
            </div>
        </div>

        <div class="item-area">
            <div class="manage-item-top">
                @include('funcionario.create')
                @include('funcionario.show')

                <button type="button" id="btn" data-bs-toggle="modal" data-bs-target="#cadastrar-funcionario-modal">
                    <img src="{{ asset('img/adicionar-item.svg') }}" alt="Adicionar funcionario">
                    Cadastrar Funcionário
                </button>

                <!-- modal para cadastro do funcionario -->
            </div>

            <div class="table-item-area">
                <table id="table-item">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome do Funcionário</th>
                            <th>CPF</th>
                            <th>Telefone</th>
                            <th>Cargo</th>
                            <th>Salario</th>
                            <th>Caixa</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($funcionarios as $funcionario)
                            <tr>
                                <td class="idFuncionario">{{ $funcionario->id }}</td>
                                <td>{{ $funcionario->nome_funcionario }}</td>
                                <td>{{ $funcionario->cpf }}</td>
                                <td>{{ $funcionario->telefone }}</td>
                                <td>{{ $funcionario->cargo }}</td>
                                <td>R$ {{ $funcionario->salario }}</td>
                                <td>{{ $funcionario->id_caixa ? $funcionario->id_caixa : "Sem Caixa" }}</td>

                                <td>
                                    <button title="Ver funcionario" data-bs-toggle="modal" data-bs-target="#cadastrar-funcionario-show">
                                        <img src="{{ asset('img/eye-icon.svg') }}" alt="Ver funcionario" class="verFuncionario">

                                    </button>
                                    <button title="Editar funcionario">
                                        <img src="{{ asset('img/pencil-icon.svg') }}" data-toggle="modal"
                                            data-target="#editar-funcionario-modal" )}}" alt="Editar funcionario">
                                    </button>
                                    <button title="Exluir funcionario">
                                        <img src="{{ asset('img/trash-icon.svg') }}" alt="Excluir funcionario">
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


