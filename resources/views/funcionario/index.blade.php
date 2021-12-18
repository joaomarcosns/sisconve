@extends('layout.layout')
@section('title', 'Funcionario')

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
                    <img src="../public/img/funcionario-dark.svg" alt="Funcionario">
                    Funcionários
                </span>
            </div>
        </div>

        <div class="item-area">
            <div class="manage-item-top">

                <button type="button" id="btn" data-toggle="modal" data-target="#cadastrar-funcionario-modal">
                    <img src="../public/img/adicionar-item.svg" alt="Adicionar funcionario">
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
                            <th>Telefone</th>
                            <th>Cargo</th>
                            <th>Nivel de Acesso</th>
                            <th>Salario</th>
                            <th>Caixa</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>R$</td>
                            <td></td>

                            <td>
                                <button title="Ver funcionario" onclick="">
                                    <img src="../public/img/eye-icon.svg" alt="Ver funcionario">
                                </button>
                                <button title="Editar funcionario">
                                    <img src="../public/img/pencil-icon.svg" data-toggle="modal"
                                        data-target="#editar-funcionario-modal" alt="Editar funcionario">
                                </button>
                                <button title="Exluir funcionario">
                                    <img src="../public/img/trash-icon.svg" alt="Excluir funcionario">
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
