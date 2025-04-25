<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index()
    {
        return view('home');  // Página inicial com as opções
    }

    public function calculateImc(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'peso' => 'required|numeric',
                'altura' => 'required|numeric',
            ]);

            $peso = $request->input('peso');
            $altura = $request->input('altura');
            $imc = $peso / ($altura * $altura);

            return view('imc', compact('imc'));
        }

        return view('imc');  // Exibe o formulário para IMC
    }

    public function evaluateSleep(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'horas_sono' => 'required|numeric',
            ]);

            $horas_sono = $request->input('horas_sono');
            $avaliacao = $this->avaliarSono($horas_sono);

            return view('sono', compact('avaliacao'));
        }

        return view('sono');  // Exibe o formulário para avaliar o sono
    }

    public function calculateTravelExpense(Request $request)
    {
        if ($request->isMethod('post')) {
            // Validação para garantir que todos os campos estão presentes
            $request->validate([
                'distancia' => 'required|numeric',
                'rendimento_carro' => 'required|numeric',
                'preco_gasolina' => 'required|numeric',
            ]);

            // Recebe os dados do formulário
            $distancia = $request->input('distancia');
            $rendimento_carro = $request->input('rendimento_carro');
            $preco_gasolina = $request->input('preco_gasolina');

            // Cálculo do gasto de viagem
            $gasto = ($distancia / $rendimento_carro) * $preco_gasolina;

            // Retorna a view com o valor calculado
            return view('viagem', compact('gasto'));
        }

        return view('viagem');  // Exibe o formulário para calcular o gasto de viagem
    }

    private function avaliarSono($horas_sono)
    {
        if ($horas_sono < 6) {
            return "Sono insuficiente, tente dormir mais!";
        } elseif ($horas_sono >= 6 && $horas_sono <= 8) {
            return "Sono adequado, continue assim!";
        } else {
            return "Sono excessivo, cuidado para não dormir demais!";
        }
    }
}
