@extends('layouts.app')

@section('title', 'Editar Tipo de Contato')

@section('content')
<h1>Editar Tipo de Contato</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Erro!</strong> Corrija os campos abaixo:<br><br>
        <ul>
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('tipo-contatos.update', $tipo->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nome" class="form-label">Nome do Tipo</label>
        <input type="text" name="nome" class="form-control" value="{{ old('nome', $tipo->nome) }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Atualizar</button>
    <a href="{{ route('tipo-contatos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
