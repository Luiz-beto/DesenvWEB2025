<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliar Sono</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">Avaliar Sono</h1>

    <!-- Formulário para enviar as horas de sono -->
    <form action="{{ route('avaliar_sono') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="horas_sono" class="form-label">Horas de sono:</label>
            <input type="text" id="horas_sono" name="horas_sono" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Avaliar</button>
    </form>

    <!-- Exibe a avaliação, caso tenha sido realizada -->
    @isset($avaliacao)
        <div class="mt-4">
            <h2 class="text-center">{{ $avaliacao }}</h2>
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
