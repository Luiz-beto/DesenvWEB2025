@extends('layouts.app')

@section('title', 'Tipos de Contato')

@section('content')
<h1>Tipos de Contato</h1>

<div class="mb-3 d-flex gap-2">
    <a href="{{ route('tipo-contatos.create') }}" class="btn btn-success">Novo Tipo</a>
    <a href="{{ route('contatos.index') }}" class="btn btn-secondary">Voltar para Contatos</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tipos as $tipo)
        <tr>
            <td>{{ $tipo->id }}</td>
            <td>{{ $tipo->nome }}</td>
            <td>
                <a href="{{ route('tipo-contatos.edit', $tipo) }}" class="btn btn-primary btn-sm">Editar</a>

                <form action="{{ route('tipo-contatos.destroy', $tipo) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Confirma exclusão?')" class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
