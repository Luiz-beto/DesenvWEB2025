<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExercicioController extends Controller
{
    public function index()
    {
        return view('home');
    }

    // IMC
    public function imc()
    {
        return view('imc');
    }

    public function calcularIMC(Request $request)
    {
        $peso = $request->input('peso');
        $altura = $request->input('altura');
        
        if ($peso && $altura) {
            $imc = $peso / ($altura * $altura);
            return view('imc', compact('imc'));
        }

        return redirect()->route('imc')->with('error', 'Por favor, forneça peso e altura.');
    }

    // Sono
    public function sono()
    {
        return view('sono');
    }

    public function avaliarSono(Request $request)
    {
        $horas = $request->input('horas');
        
        if ($horas) {
            if ($horas < 6) {
                $avaliacao = "Sono insuficiente!";
            } elseif ($horas >= 6 && $horas <= 8) {
                $avaliacao = "Sono adequado!";
            } else {
                $avaliacao = "Sono excessivo!";
            }

            return view('sono', compact('avaliacao'));
        }

        return redirect()->route('sono')->with('error', 'Por favor, forneça a quantidade de horas de sono.');
    }

    // Viagem
    public function viagem()
    {
        return view('viagem');
    }

    public function calcularViagem(Request $request)
    {
        $distancia = $request->input('distancia');
        $consumo = $request->input('consumo');
        $preco = $request->input('preco');
        
        if ($distancia && $consumo && $preco) {
            $gasto = ($distancia / $consumo) * $preco;
            return view('viagem', compact('gasto'));
        }

        return redirect()->route('viagem')->with('error', 'Por favor, forneça os dados necessários.');
    }
}
