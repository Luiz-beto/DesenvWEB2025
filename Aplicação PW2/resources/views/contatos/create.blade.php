@extends('layouts.app')

@section('content')
<h2>Criar Contato</h2>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('contatos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}" required>
    </div>

    <div class="mb-3">
        <label for="telefone" class="form-label">Telefone</label>
        <input type="text" name="telefone" id="telefone" class="form-control" value="{{ old('telefone') }}">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
    </div>

    <div class="mb-3">
        <label for="tipo_contato_id" class="form-label">Tipo Contato</label>
        <select name="tipo_contato_id" id="tipo_contato_id" class="form-select" required>
            <option value="">Selecione...</option>
            @foreach ($tipos as $tipo)
            <option value="{{ $tipo->id }}" {{ old('tipo_contato_id') == $tipo->id ? 'selected' : '' }}>
                {{ $tipo->nome }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="imagem" class="form-label">Imagem</label>
        <input type="file" name="imagem" id="imagem" class="form-control" accept="image/*">
    </div>

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('contatos.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
</form>
@endsection
