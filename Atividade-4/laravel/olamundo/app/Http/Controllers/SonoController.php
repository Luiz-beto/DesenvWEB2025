<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SonoController extends Controller
{
    public function mostrarForm()
    {
        return view('sono');
    }

    public function avaliar(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'horas_sono' => 'required|numeric|min:0',
            'idade' => 'required|numeric|min:1',
        ]);

        $horasSono = $request->input('horas_sono');
        $idade = $request->input('idade');

        // Lógica para avaliar a qualidade do sono
        $resultado = $this->avaliarQualidadeSono($horasSono, $idade);

        return view('sono', compact('resultado'));
    }

    private function avaliarQualidadeSono($horasSono, $idade)
    {
        $qualidade = '';

        if ($idade >= 18 && $idade <= 64) {
            // Adultos
            if ($horasSono >= 7 && $horasSono <= 9) {
                $qualidade = "Qualidade do sono ideal!";
            } elseif ($horasSono < 7) {
                $qualidade = "Sono insuficiente. Tente dormir mais.";
            } else {
                $qualidade = "Sono excessivo. Tente ajustar seu horário de sono.";
            }
        } elseif ($idade >= 65) {
            // Idosos
            if ($horasSono >= 7 && $horasSono <= 8) {
                $qualidade = "Qualidade do sono ideal!";
            } elseif ($horasSono < 7) {
                $qualidade = "Sono insuficiente. Tente dormir mais.";
            } else {
                $qualidade = "Sono excessivo. Tente ajustar seu horário de sono.";
            }
        } else {
            // Crianças e adolescentes
            if ($horasSono >= 9 && $horasSono <= 12) {
                $qualidade = "Qualidade do sono ideal!";
            } elseif ($horasSono < 9) {
                $qualidade = "Sono insuficiente. Tente dormir mais.";
            } else {
                $qualidade = "Sono excessivo. Tente ajustar seu horário de sono.";
            }
        }

        return $qualidade;
    }
}
