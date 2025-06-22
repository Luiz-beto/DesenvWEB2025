<?php

use App\Http\Controllers\TipoContatoController;
use App\Http\Controllers\ContatoController;

Route::get('/', function () {
    return redirect()->route('contatos.index');
});

Route::resource('tipo-contatos', TipoContatoController::class);
Route::resource('contatos', ContatoController::class);

// Autenticação Laravel Breeze (a configurar depois)
