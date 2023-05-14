<html>

<head>
    <title>Dashboard</title>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

    </div>
    <div class="content">
        <h2>Gráfico de pizza por estado</h2>
        <canvas id="grafico-pizza-estado"></canvas>

        <h2>Gráfico de pizza por marca</h2>
        <canvas id="grafico-pizza-marca"></canvas>

        <h2>Gráfico de pizza por porte</h2>
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