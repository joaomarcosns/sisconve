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
                @include('caixa.create')
                <button type="button" id="btn" data-bs-toggle="modal" data-bs-target="#cadastrar-caixa-modal">
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
                        @foreach ($caixas as $caixa)
                        <tr>
                            <td>{{$caixa->id}}</td>
                            <td >{{$caixa->numero_caixa}}</td>
                            <td class="a">{{$caixa->valor_em_caixa}}</td>
                            <td>{{$caixa->status ? "Ativo" : "Inatico"}}</td>
                            <td>
                                <button title="Ver caixa"  class="ver_caixa">
                                    <img src="{{ asset("img/eye-icon.svg")}}" alt="Ver caixa" >
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.ver_caixa').click(function (e) { 
                e.preventDefault();
                var id = $('.a').text();
                console.log(id);
            });
        });
    </script>
@endsection

