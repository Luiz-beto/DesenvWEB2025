<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViagemController extends Controller
{
    public function mostrarForm()
    {
        return view('viagem');
    }

    public function calcular(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'distancia' => 'required|numeric|min:0',
            'preco_combustivel' => 'required|numeric|min:0',
            'consumo' => 'required|numeric|min:0',
        ]);

        // Capturando os dados do formulário
        $distancia = $request->input('distancia');
        $precoCombustivel = $request->input('preco_combustivel');
        $consumo = $request->input('consumo');

        // Calculando o gasto de combustível
        $gasto = ($distancia / $consumo) * $precoCombustivel;

        // Passando o resultado para a view
        return view('viagem', compact('gasto'));
    }
}
