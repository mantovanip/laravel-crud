<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Pegando as variáveis de ambiente --}}
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <header>
            <h1>CRUD Innova</h1>
        </header>
        <nav>
            <ul>
                {{-- Links para o cadastro --}}
                <li><a href="/integradors">Início</a></li>
                <li><a href="/integradors/create">Cadastro de Integradors</a></li>
            </ul>
        </nav>
        <div class="content">
            {{-- o conteúdo da view específica será injetado aqui! --}}
            @yield('content')
        </div>
        <footer>
          
        </footer>
    </div>
</body>
</html>