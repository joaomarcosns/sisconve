<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="#" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/box-center.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buy-products.css') }}">
    <link rel="stylesheet" href="{{ asset('css/content-box.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sell-products.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toast.css') }} ">
    {{-- Motal --}}
    <link rel="stylesheet" href="{{ asset('css/modal/modal.css') }} ">
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>SISCONVE - @yield('title')</title>

</head>

<body>
    <nav>
        <div class="logo">
            <a href="#">SISCONVE</a>
        </div>
        <div class="user-area">
            <span id="date-time"></span>
            <img class="divisor" src="{{ asset('img/separador.svg') }}" alt="Separador">
            <span class="username">FUNCIONARIO_NOME_COMPLETO</span>
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
                    <a href="#">
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
                        <a href="#"><img src="{{ asset('img/dashboard.svg')}}" alt="">Dashboard</a>
                    </li>
                    <li href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown">
                        <a href="#"><img src="{{ asset('img/clientes.svg')}}" alt="">Clientes</a>
                    </li>

                    <li href="#pageSubmenuProdutos" data-toggle="collapse" aria-expanded="false" class="dropdown">
                        <a href="#"><img src="{{ asset('img/produtos.svg')}}" alt="">Produtos</a>
                    </li>

                    <li href="#pageSubmenuCategorias" data-toggle="collapse" aria-expanded="false"
                        class="dropdown">
                        <a href="#"><img src="{{ asset('img/categorias.svg')}}" alt="">Categorias</a>
                    </li>

                    <li href="#pageSubmenuVendas" data-toggle="collapse" aria-expanded="false" class="dropdown">
                        <span><img src="{{ asset('img/vendas.svg')}}" alt="">Vendas</span>
                        <ul class="collapse list-unstyled" id="pageSubmenuVendas">
                            <li><a href="#">Realizar venda</a></li>
                            <li><a href="#">Ver vendas</a></li>
                        </ul>
                    </li>

                    <li href="#pageSubmenuCompras" data-toggle="collapse" aria-expanded="false" class="dropdown">
                        <span><img src="{{ asset('img/Compras.svg')}}" alt="">Compras</span>
                        <ul class="collapse list-unstyled" id="pageSubmenuCompras">
                            <li><a href="#">Registrar compra</a></li>
                            <li><a href="#">Ver compras</a></li>
                        </ul>
                    </li>

                    <li href="#pageSubmenuFornecedor" data-toggle="collapse" aria-expanded="false"
                        class="dropdown">
                        <a href="#"><img src="{{ asset('img/fornecedor.svg')}}" alt="Fornecedor">Fornecedor</a>
                    </li>

                    <li href="#pageSubmenuFornecedoa" data-toggle="collapse" aria-expanded="false"
                        class="dropdown">
                        <span><img src="{{ asset('img/financas.svg')}}" alt="">Finanças</span>
                        <ul class="collapse list-unstyled" id="pageSubmenuFornecedoa">
                            {{-- validar paara ver os caixar --}}
                            <li><a href="#">Ver caixas</a></li>
                            {{-- validar paara ver os caixar --}}
                            <li><a href="#">Cobranças</a></li>
                            <li><a href="#">Pagamentos</a></li>
                        </ul>
                    </li>

                    {{-- if ($_SESSION["FUNCIONARIO_NIVEL_ACESSO"] == 1) : ?> --}}
                    <li href="#pageSubmenuFuncionarios" data-toggle="collapse" aria-expanded="false"
                        class="dropdown">
                        <a href="#"><img src="{{ asset('img/funcionario.svg')}}" alt="Funcionários">Funcionários</a>
                    </li>
                    {{-- endif; ?> --}}

                    <li href="#pageSubmenuRelatório" data-toggle="collapse" aria-expanded="false"
                        class="dropdown">
                        <span><img src="{{ asset('img/relatorios.svg')}}" alt="">Relatório</span>
                    </li>
                </ul>
                <ul class="footer-sidebar dropdown">
                    <div class="text-center">
                        <button id="btn" data-toggle="modal" data-target="#logoff-modal">
                            <img src="{{ asset('img/logout.svg')}}" alt="Logout">
                            Sair do sistema
                        </button>
                        @include('layout.modal')
                        <span id="clock"></span>
                    </div>
                </ul>
            </div>
        </div>
        <div class="content-center">
            @yield('conteudo')
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/e386f7fbce.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
</body>
</html>
