<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use App\Models\TipoContato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ContatoController extends Controller
{
    public function index(Request $request)
    {
        $tipos = TipoContato::all();

        $query = Contato::with('tipoContato');

        if ($request->filled('tipo_contato_id')) {
            $query->where('tipo_contato_id', $request->tipo_contato_id);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nome', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%")
                  ->orWhere('telefone', 'like', "%$search%");
            });
        }

        $contatos = $query->orderBy('nome')->paginate(10);

        return view('contatos.index', compact('contatos', 'tipos'));
    }

    public function create()
    {
        $tipos = TipoContato::all();
        return view('contatos.create', compact('tipos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'telefone' => 'nullable|max:20',
            'email' => 'nullable|email|max:255',
            'tipo_contato_id' => 'required|exists:tipo_contatos,id',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $dados = $request->all();

        if ($request->hasFile('imagem')) {
            // Armazena a imagem na pasta storage/app/public/imagens
            $path = $request->file('imagem')->store('imagens', 'public');
            $dados['imagem'] = $path; // Exemplo: imagens/1750624976.png
        }

        Contato::create($dados);

        return redirect()->route('contatos.index')->with('success', 'Contato criado com sucesso!');
    }

    public function show(string $id)
    {
        $contato = Contato::with('tipoContato')->findOrFail($id);
        return view('contatos.show', compact('contato'));
    }

    public function edit(string $id)
    {
        $contato = Contato::findOrFail($id);
        $tipos = TipoContato::all();
        return view('contatos.edit', compact('contato', 'tipos'));
    }

    public function update(Request $request, string $id)
    {
        $contato = Contato::findOrFail($id);

        $request->validate([
            'nome' => 'required|max:255',
            'telefone' => 'nullable|max:20',
            'email' => 'nullable|email|max:255',
            'tipo_contato_id' => 'required|exists:tipo_contatos,id',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $dados = $request->all();

        if ($request->hasFile('imagem')) {
            // Remove a imagem antiga, se existir
            if ($contato->imagem && File::exists(storage_path('app/public/' . $contato->imagem))) {
                File::delete(storage_path('app/public/' . $contato->imagem));
            }
            // Armazena a nova imagem
            $path = $request->file('imagem')->store('imagens', 'public');
            $dados['imagem'] = $path;
        }

        $contato->update($dados);

        return redirect()->route('contatos.index')->with('success', 'Contato atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $contato = Contato::findOrFail($id);

        // Remove a imagem do contato, se existir
        if ($contato->imagem && File::exists(storage_path('app/public/' . $contato->imagem))) {
            File::delete(storage_path('app/public/' . $contato->imagem));
        }

        $contato->delete();

        return redirect()->route('contatos.index')->with('success', 'Contato excluído com sucesso!');
    }
}
