<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoContatoController;

Route::get('/', function () {
    return redirect()->route('tipo_contatos.index'); // Redireciona para a página de tipo_contatos
});

// Rota de TipoContato
Route::resource('tipo_contatos', TipoContatoController::class);
