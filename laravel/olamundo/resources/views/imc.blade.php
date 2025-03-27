<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Calcular IMC</title>
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

        .classification {
            font-size: 18px;
            color: #333;
            margin-top: 15px;
        }

        .classification span {
            font-weight: bold;
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
        <h1>Calcule seu IMC</h1>
        <form method="POST" action="{{ route('calcular.imc') }}">
            @csrf
            <input type="number" step="0.1" name="peso" placeholder="Peso (kg)" required>
            <input type="number" step="0.01" name="altura" placeholder="Altura (m)" required>
            <button type="submit">Calcular</button>
        </form>

        @if (isset($imc))
            <p>Seu IMC é: {{ number_format($imc, 2) }}</p>
            <div class="classification">
                <p>Classificação: 
                    @if ($imc < 18.5)
                        <span>Abaixo do peso</span>
                    @elseif ($imc >= 18.5 && $imc < 25)
                        <span>Peso normal</span>
                    @elseif ($imc >= 25 && $imc < 30)
                        <span>Acima do peso (sobrepeso)</span>
                    @elseif ($imc >= 30 && $imc < 35)
                        <span>Obesidade I</span>
                    @elseif ($imc >= 35 && $imc < 40)
                        <span>Obesidade II</span>
                    @else
                        <span>Obesidade III</span>
                    @endif
                </p>
            </div>
        @endif

        @if (session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif

        <!-- Botão Voltar para a Home -->
        <form action="{{ route('home') }}" method="GET">
            <button type="submit" class="back-button">Voltar</button>
        </form>
    </div>
</body>
</html>
