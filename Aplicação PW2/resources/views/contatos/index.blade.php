@extends('layouts.app')

@section('title', 'Contatos')

@section('content')
<h1>Contatos</h1>

<div class="d-flex mb-3">
    <a href="{{ route('contatos.create') }}" class="btn btn-success me-2">Novo Contato</a>
    <a href="{{ route('tipo-contatos.index') }}" class="btn btn-secondary">Gerenciar Tipos de Contato</a>
</div>

<form method="GET" action="{{ route('contatos.index') }}" class="row g-3 mb-3">
    <div class="col-md-4">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Buscar por nome, email, telefone...">
    </div>
    <div class="col-md-3">
        <select name="tipo_contato_id" class="form-select">
            <option value="">Todos os tipos</option>
            @foreach($tipos as $tipo)
                <option value="{{ $tipo->id }}" @if(request('tipo_contato_id') == $tipo->id) selected @endif>{{ $tipo->nome }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <button class="btn btn-primary" type="submit">Filtrar</button>
    </div>
</form>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered align-middle">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Tipo</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
    @foreach($contatos as $contato)
        <tr>
            <td>
                @if($contato->imagem)
                    <a href="{{ asset('storage/' . $contato->imagem) }}" 
                       target="_blank" 
                       title="Clique para abrir a imagem"
                       style="text-decoration: underline; color: #0d6efd; cursor: pointer;">
                        {{ $contato->nome }}
                    </a>
                @else
                    {{ $contato->nome }}
                @endif
            </td>
            <td>
                @if($contato->telefone)
                <a href="https://wa.me/{{ preg_replace('/\D/', '', $contato->telefone) }}" target="_blank" rel="noopener noreferrer">
                    {{ $contato->telefone }}
                </a>
                @else
                    -
                @endif
            </td>
            <td>
                @if($contato->email)
                <a href="mailto:{{ $contato->email }}">
                    {{ $contato->email }}
                </a>
                @else
                    -
                @endif
            </td>
            <td>{{ $contato->tipoContato->nome }}</td>
            <td>
                <a href="{{ route('contatos.edit', $contato) }}" class="btn btn-primary btn-sm">Editar</a>
                <form action="{{ route('contatos.destroy', $contato) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Confirma exclusão?')" class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $contatos->withQueryString()->links() }}

@endsection
