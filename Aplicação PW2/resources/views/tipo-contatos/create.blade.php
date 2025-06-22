@extends('layouts.app')

@section('title', 'Novo Tipo de Contato')

@section('content')
<h1>Criar Tipo de Contato</h1>

<form action="{{ route('tipo-contatos.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required>
        @error('nome')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="{{ route('tipo-contatos.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
