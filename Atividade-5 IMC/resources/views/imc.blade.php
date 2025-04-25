<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular IMC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">Calcular IMC</h1>

    <!-- Formulário para enviar os dados de peso e altura -->
    <form action="{{ route('calcular_imc') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="peso" class="form-label">Peso (kg):</label>
            <input type="text" id="peso" name="peso" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="altura" class="form-label">Altura (m):</label>
            <input type="text" id="altura" name="altura" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Calcular</button>
    </form>

    <!-- Exibe o IMC calculado, caso tenha sido calculado -->
    @isset($imc)
        <div class="mt-4">
            <h2 class="text-center">Seu IMC é: {{ number_format($imc, 2) }}</h2>
            <h3 class="text-center">
                @if ($imc < 18.5)
                    Abaixo do peso
                @elseif ($imc >= 18.5 && $imc <= 24.9)
                    Peso normal
                @elseif ($imc >= 25 && $imc <= 29.9)
                    Sobrepeso
                @else
                    Obesidade
                @endif
            </h3>
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
