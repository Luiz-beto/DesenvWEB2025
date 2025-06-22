<?php

namespace App\Http\Controllers;

use App\Models\TipoContato;
use Illuminate\Http\Request;

class TipoContatoController extends Controller
{
    /**
     * Listagem dos tipos de contato.
     */
    public function index()
    {
        $tipos = TipoContato::all();
        return view('tipo-contatos.index', compact('tipos'));
    }

    /**
     * Formulário para criar novo tipo de contato.
     */
    public function create()
    {
        return view('tipo-contatos.create');
    }

    /**
     * Salvar novo tipo de contato.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|unique:tipo_contatos,nome|max:255'
        ]);

        TipoContato::create($request->all());

        return redirect()->route('tipo-contatos.index')->with('success', 'Tipo de contato criado com sucesso!');
    }

    /**
     * Formulário para editar tipo de contato existente.
     */
    public function edit($id)
    {
        $tipo = TipoContato::findOrFail($id);
        return view('tipo-contatos.edit', compact('tipo'));
    }

    /**
     * Atualizar tipo de contato existente.
     */
    public function update(Request $request, $id)
    {
        $tipo = TipoContato::findOrFail($id);

        $request->validate([
            'nome' => 'required|max:255|unique:tipo_contatos,nome,' . $tipo->id
        ]);

        $tipo->update($request->all());

        return redirect()->route('tipo-contatos.index')->with('success', 'Tipo de contato atualizado com sucesso!');
    }

    /**
     * Excluir tipo de contato.
     */
    public function destroy($id)
    {
        $tipo = TipoContato::findOrFail($id);
        $tipo->delete();

        return redirect()->route('tipo-contatos.index')->with('success', 'Tipo de contato excluído com sucesso!');
    }
}
