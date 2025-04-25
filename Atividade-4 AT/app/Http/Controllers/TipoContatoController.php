<?php

namespace App\Http\Controllers;

use App\Models\TipoContato;
use Illuminate\Http\Request;

class TipoContatoController extends Controller
{
    public function index()
    {
        $tiposContato = TipoContato::all();
        return view('tipo_contatos.index', compact('tiposContato'));
    }

    public function create()
    {
        return view('tipo_contatos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        TipoContato::create($request->all());

        return redirect()->route('tipo_contatos.index')
                         ->with('success', 'Tipo de Contato criado com sucesso.');
    }

    public function show(TipoContato $tipoContato)
    {
        return view('tipo_contatos.show', compact('tipoContato'));
    }

    public function edit(TipoContato $tipoContato)
    {
        return view('tipo_contatos.edit', compact('tipoContato'));
    }

    public function update(Request $request, TipoContato $tipoContato)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        $tipoContato->update($request->all());

        return redirect()->route('tipo_contatos.index')
                         ->with('success', 'Tipo de Contato atualizado com sucesso.');
    }

    public function destroy(TipoContato $tipoContato)
    {
        $tipoContato->delete();

        return redirect()->route('tipo_contatos.index')
                         ->with('success', 'Tipo de Contato excluído com sucesso.');
    }
}
