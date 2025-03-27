<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Bem-vindo ao Site de Exercícios</title>
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

        ul {
            list-style: none;
        }

        li {
            margin: 10px 0;
        }

        a {
            text-decoration: none;
            font-size: 18px;
            color: #007BFF;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Escolha uma opção</h1>
        <ul>
            <li><a href="{{ route('imc') }}">Calcular IMC</a></li>
            <li><a href="{{ route('sono') }}">Avaliar Sono</a></li>
            <li><a href="{{ route('viagem') }}">Calcular Gasto de Viagem</a></li>
        </ul>
    </div>
</body>
</html>
