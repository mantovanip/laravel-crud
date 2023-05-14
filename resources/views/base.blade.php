<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Pegando as variáveis de ambiente --}}
    <title>{{ env('APP_NAME') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <nav>
            {{-- Links para o cadastro --}}
            <li><a href="/">Inicio</a></li>
            <li><a href="/integradors/create">Cadastro de Integradores</a></li>
            <li><a href="/integradors">Lista de Integradores</a></li>
            <li><a href="/">Dashboard</a></li>

            </ul>
        </nav>
        <div class="content" >
            {{-- o conteúdo da view específica será injetado aqui! --}}
            @yield('content')
        </div>
     
        <footer>
        </footer>
    </div>
</body>

</html>