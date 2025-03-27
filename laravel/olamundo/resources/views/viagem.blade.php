<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Calcular Gasto de Viagem</title>
    <style>
        /* Resetando margens e padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: white;
            border-radius: 10px;
            border: 2px solid #ddd;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        p {
            font-size: 18px;
            margin-top: 20px;
            color: #333;
        }

        .error {
            color: red;
            font-size: 16px;
            margin-top: 10px;
        }

        .back-button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        .back-button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Calcule o Gasto de Viagem</h1>
        <form method="POST" action="{{ route('calcular.viagem') }}">
            @csrf
            <input type="number" step="0.01" name="distancia" placeholder="Distância (km)" required>
            <input type="number" step="0.01" name="preco_combustivel" placeholder="Preço do combustível (R$)" required>
            <input type="number" step="0.01" name="consumo" placeholder="Consumo do veículo (km/l)" required>
            <button type="submit">Calcular</button>
        </form>

        @if (isset($gasto))
            <p>O gasto da viagem é: R$ {{ number_format($gasto, 2) }}</p>
        @endif

        @if (session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif

        <!-- Botão Voltar para a Home -->
        <form action="{{ route('home') }}" method="GET">
            <button type="submit" class="back-button">Voltar para a Home</button>
        </form>
    </div>
</body>
</html>
        