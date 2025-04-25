<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular Gasto de Viagem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">Calcular Gasto de Viagem</h1>
    
    <!-- Formulário para enviar os dados -->
    <form action="{{ route('calcular_viagem') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="distancia" class="form-label">Distância (km):</label>
            <input type="text" id="distancia" name="distancia" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="rendimento_carro" class="form-label">Rendimento do carro (km/l):</label>
            <input type="text" id="rendimento_carro" name="rendimento_carro" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="preco_gasolina" class="form-label">Preço da gasolina (R$ por litro):</label>
            <input type="text" id="preco_gasolina" name="preco_gasolina" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Calcular</button>
    </form>

    <!-- Exibe o valor do gasto de viagem calculado -->
    @isset($gasto)
        <div class="mt-4">
            <h2 class="text-center">O gasto de viagem será: R$ {{ number_format($gasto, 2) }}</h2>
        </div>
    @endisset

    <!-- Botão para voltar -->
    <div class="text-center mt-4">
        <a href="{{ route('home') }}" class="btn btn-secondary">Voltar</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
