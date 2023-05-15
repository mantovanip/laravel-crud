<!DOCTYPE html>
<html lang="pt-br">

<head>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        {{-- Pegando as variáveis de ambiente --}}
        <title>{{ env('APP_NAME') }}</title>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>

<body>
    <div class="container">
        <nav>
            {{-- Links para o cadastro --}}
            <li><a href="/integradors/create">Cadastro de Integradores</a></li>
            <li><a href="/integradors">Lista de Integradores</a></li>
            <li><a href="/">Dashboard</a></li>

            </ul>
        </nav>

    </div>
    <div class="content">
        <h2>Gráfico de estado</h2>
        <canvas id="grafico-pizza-estado"></canvas>

        <h2>Gráfico de marca</h2>
        <canvas id="grafico-pizza-marca"></canvas>

        <h2>Gráfico de porte</h2>
        <canvas id="grafico-pizza-porte"></canvas>
    </div>
</body>
<script>
    //  grafico estado 
    var dadosEstado = <?php echo json_encode($dados['estado']); ?>;

    var data = {
        labels: Object.keys(dadosEstado),
        datasets: [{
            data: Object.values(dadosEstado),
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#00FFFF', '#00FF00', '#FF00FF'],
        }]
    };

    var ctx = document.getElementById('grafico-pizza-estado').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'pie',
        data: data,
        options: {
            aspectRatio: 5
        }
    });


    // grafico pizza
    var dadosMarca = <?php echo json_encode($dados['marca_paineis']); ?>;

    var data = {
        labels: Object.keys(dadosMarca),
        datasets: [{
            data: Object.values(dadosMarca),
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#00FFFF', '#00FF00', '#FF00FF'],
        }]
    };

    var ctx = document.getElementById('grafico-pizza-marca').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'pie',
        data: data,
        options: {
            aspectRatio: 5
        }
    });

    // grafico porte empresa
    var dadosPorte = <?php echo json_encode($dados['porte']); ?>

    var data = {
        labels: Object.keys(dadosPorte),
        datasets: [{
            data: Object.values(dadosPorte),
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#00FFFF', '#00FF00', '#FF00FF'],
        }]
    };

    var ctx = document.getElementById('grafico-pizza-porte').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'pie',
        data: data,
        options: {
            aspectRatio: 5
        }
    });
</script>


</html>