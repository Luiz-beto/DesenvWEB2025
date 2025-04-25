<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExerciseController;

// Página inicial 
Route::get('/', [ExerciseController::class, 'index'])->name('home');

// Rota para mostrar o formulário de cálculo de IMC
Route::get('/calcular-imc', [ExerciseController::class, 'calculateImc'])->name('imc');

// Rota para mostrar o formulário de avaliação do sono
Route::get('/avaliar-sono', [ExerciseController::class, 'evaluateSleep'])->name('sono');

// Rota para mostrar o formulário de cálculo do gasto de viagem
Route::get('/calcular-viagem', [ExerciseController::class, 'calculateTravelExpense'])->name('viagem');

// Processar o cálculo do IMC via POST
Route::post('/calcular-imc', [ExerciseController::class, 'calculateImc'])->name('calcular_imc');

// Processar a avaliação do sono via POST
Route::post('/avaliar-sono', [ExerciseController::class, 'evaluateSleep'])->name('avaliar_sono');

// Processar o cálculo do gasto de viagem via POST
Route::post('/calcular-viagem', [ExerciseController::class, 'calculateTravelExpense'])->name('calcular_viagem');

