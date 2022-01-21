<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {{--  --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/e386f7fbce.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.material.min.js"></script>
    <script src="{{ asset('js/toastNotify.js') }}"></script>
    {{-- <script src="{{ asset('js/metPagamento.js') }}"></script> --}}
    <script src="{{ asset('js/validaInput.js') }}"></script>


    {{--  --}}
    <link rel="shortcut icon" href="{{ asset('img/favicon.svg') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/box-center.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buy-products.css') }}">
    <link rel="stylesheet" href="{{ asset('css/content-box.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sell-products.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toast.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/keyframes.css') }} ">
    {{-- Motal --}}
    <link rel="stylesheet" href="{{ asset('css/modal/modal.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/modal/add-item.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/modal/categoria/cadastro-categoria.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/modal/cadastro-cliente.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/modal/cadastro-cliente.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/modal/cadastro-cliente.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/modal/cadastro-fornecedor.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/modal/produto/cadastro-produto.css') }} ">
    {{--  --}}

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.material.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/4.0.0/material-components-web.min.css">



    <title>SISCONVE - @yield('title')</title>

</head>

<body>
    <nav>
        <div class="logo">
            <a href="{{ route('dashboard.index') }}">SISCONVE</a>
        </div>
        <div class="user-area">
            <span id="date-time"></span>
            <img class="divisor" src="{{ asset('img/separador.svg') }}" alt="Separador">
            <span class="username">{{ session('funcionario')->nome_funcionario }}</span>
            <img class="user-img" src="{{ asset('img/default-user.svg') }}" alt="Usuário">

            <div class="dropdown show">
                <img class="arrow-icon dropdown" id="dropdownMenuLink" data-toggle="dropdown"
                    src="{{ asset('img/arrow-icon.svg') }}" alt="Seta Configuração">
                <div class="dropdown-menu dropdown-menu-right mt-2" aria-labelledby="dropdownMenuLink">
                    <a href="#">
                        <div class="item-menu">
                            <i class="fas fa-user"></i>
                            <p>Minha Conta</p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="item-menu">
                            <i class="fas fa-cog"></i>
                            <p>Configurações</p>
                        </div>
                    </a>

                    <a href="{{ route('login.destroy') }}">
                        <div class="item-menu">
                            <i class="fas fa-power-off"></i>
                            <p>Sair do sistema</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- navbar topo -->

    <div id="container">
        <!-- menu lateral -->
        <div class="wrapper d-flex left-bar">
            <div class="sidebar">
                <ul class="menu-items">
                    <li href="#" data-toggle="collapse" aria-expanded="false" class="dropdown">
                        <a href="{{ route('dashboard.index') }}"><img src="{{ asset('img/dashboard.svg') }}"
                                alt="">Dashboard</a>
                    </li>
                    <li href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown">
                        <a href="{{ route('cliente.index') }}"><img src="{{ asset('img/clientes.svg') }}"
                                alt="">Clientes</a>
                    </li>

                    <li href="#pageSubmenuProdutos" data-toggle="collapse" aria-expanded="false" class="dropdown">
                        <a href="{{ route('produto.index') }}"><img src="{{ asset('img/produtos.svg') }}"
                                alt="">Produtos</a>
                    </li>

                    <li href="#pageSubmenuCategorias" data-toggle="collapse" aria-expanded="false"
                        class="dropdown">
                        <a href="{{ route('categoria.index') }}"><img src="{{ asset('img/categorias.svg') }}"
                                alt="">Categorias</a>
                    </li>

                    <li href="#pageSubmenuVendas" data-toggle="collapse" aria-expanded="false" class="dropdown">
                        <span><img src="{{ asset('img/vendas.svg') }}" alt="">Vendas</span>
                        <ul class="collapse list-unstyled" id="pageSubmenuVendas">
                            <li><a href="{{route('venda.create')}}">Realizar venda</a></li>
                            <li><a href="{{route('venda.index')}}">Ver vendas</a></li>
                        </ul>
                    </li>

                    <li href="#pageSubmenuCompras" data-toggle="collapse" aria-expanded="false" class="dropdown">
                        <span><img src="{{ asset('img/Compras.svg') }}" alt="">Compras</span>
                        <ul class="collapse list-unstyled" id="pageSubmenuCompras">
                            <li><a href="{{route('compra.create')}}">Registrar compra</a></li>
                            <li><a href="{{route('compra.index')}}">Ver compras</a></li>
                        </ul>
                    </li>

                    <li href="#pageSubmenuFornecedor" data-toggle="collapse" aria-expanded="false"
                        class="dropdown">
                        <a href="{{ route('fornecedor.index') }}"><img src="{{ asset('img/fornecedor.svg') }}"
                                alt="Fornecedor">Fornecedor</a>
                    </li>

                    <li href="#pageSubmenuFornecedoa" data-toggle="collapse" aria-expanded="false"
                        class="dropdown">
                        <span><img src="{{ asset('img/financas.svg') }}" alt="">Finanças</span>
                        <ul class="collapse list-unstyled" id="pageSubmenuFornecedoa">
                            @if (session('funcionario')->nivel_acesso != 3)
                                <li><a href="{{route('caixa.index')}}">Ver caixas</a></li>
                            @endif
                            <li><a href="#">Cobranças</a></li>
                            <li><a href="#">Pagamentos</a></li>
                        </ul>
                    </li>


                    @if (session('funcionario')->nivel_acesso == 1)
                        <li href="#pageSubmenuFuncionarios" data-toggle="collapse" aria-expanded="false"
                            class="dropdown">
                            <a href="{{route('funcionario.index')}}"><img src="{{ asset('img/funcionario.svg') }}"
                                    alt="Funcionários">Funcionários</a>
                        </li>
                    @endif
                </ul>
                <ul class="footer-sidebar dropdown">
                    <div class="text-center">
                        @include('login.destroy')
                        <button id="btn" data-toggle="modal" data-target="#logoff-modal">
                            <img src="{{ asset('img/logout.svg') }}" alt="Logout">
                            Sair do sistema
                        </button>
                        <span id="clock"></span>
                    </div>
                </ul>
            </div>
        </div>
        <div class="content-center" id="load">
            @yield('conteudo')
        </div>

    </div>
    <script src="{{ asset('js/masks.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#table-item').DataTable({
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
                },
                autoWidth: false,
                columnDefs: [{
                    targets: ['_all'],
                    className: 'mdc-data-table__cell'
                }]
            });
        });
    </script>
    @yield('script')
</body>

</html>
