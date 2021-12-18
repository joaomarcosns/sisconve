<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISCONVE - Login</title>
    <link rel="shortcut icon" href="{{ asset("img/favicon.svg")}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toast.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/keyframes.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    {{-- Error login --}}
    @if (isset($error))
        <div class="toast fade show slideInUp" id="toast">
            <div class="toast-body bg-red">
                {{ $error }}
            </div>
        </div>
    @endif
    {{-- Error login --}}
    <div id="container">
        <div class="landing-page">
            <div class="img-sistema">
                <img src="{{ asset("img/inv.png")}}" alt="">
                <div class="mini-footer">
                    <p><strong>© SISCONVE</strong> - Todos os direitos reservados</p>
                    <a href="#" target="_blank" title="Acessar repositório no github">
                        <img src="{{ asset("img/github-logo.svg")}}" alt="Repositório github">
                    </a>
                </div>
            </div>
            <form action="{{ route('login.store') }}" method="POST" autocomplete="off">
                @csrf
                <div class="login-form">
                    <div class="main-items">
                        <div class="title-logo">
                            <h1>SISCONVE</h1>
                        </div>
                        <div class="inputs">
                            <div class="login">
                                <label class="label-login" for="login">Usuário</label>
                                <div class="input">
                                    <img src="{{ asset("img/icon-user.svg")}}" alt="Usuário">
                                    <input type="email" name="email" autocomplete="off" maxlength="50"
                                        class="@error('email') is-invalid @enderror">
                                </div>
                                @error('email')
                                    <div class="text-center text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="login">
                                <label class="label-pw" for="password">Senha</label>
                                <div class="input">
                                    <img src="{{ asset("img/icon-pw.svg")}}" alt="Cadeado">
                                    <input type="password" name="senha" maxlength="50"
                                        class=" @error('senha') is-invalid @enderror">
                                </div>
                                @error('senha')
                                    <div class="text-center text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="submit">
                            <button type="submit">
                                <span>Login</span>
                            </button>
                        </div>
                        <div class="mini-footer">
                            <a href="#">Esqueci minha senha</a>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/toastNotify.js') }}"></script>
</body>

</html>
