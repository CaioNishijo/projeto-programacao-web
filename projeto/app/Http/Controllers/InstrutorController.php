<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Avaliador;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class InstrutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instrutores = Avaliador::with('pessoa')->get();
        return view('instrutores.index', compact('instrutores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('instrutores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|unique:pessoas',
            'rg' => 'nullable|string',
            'data_nascimento' => 'nullable|date',
            'email' => 'required|email|unique:pessoas',
            'telefone' => 'nullable|string',
            'endereco' => 'nullable|string',
            'genero' => 'nullable|string',
        ]);

        $pessoa = Pessoa::create($request);

        Avaliador::create([
            'pessoa_id' => $pessoa->id
        ]);

        return redirect()->route('instrutores.index')->with('success', 'Instrutor cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $instrutor = Avaliador::with('pessoa')->findOrFail($id);
        return view('instrutores.show', compact('instrutor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $instrutor = Avaliador::with('pessoa')->findOrFail($id);
        return view('instrutores.edit', compact('instrutor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $avaliador = Avaliador::findOrFail($id);
        $pessoa = $avaliador->pessoa;

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|unique:pessoas,cpf,' . $pessoa->id,
            'rg' => 'nullable|string',
            'data_nascimento' => 'nullable|date',
            'email' => 'required|email|unique:pessoas,email,' . $pessoa->id,
            'telefone' => 'nullable|string',
            'endereco' => 'nullable|string',
            'genero' => 'nullable|string',
        ]);

        $pessoa->update($validated);

        return response()->json($avaliador->load('pessoa'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $avaliador = Avaliador::findOrFail($id);
        $avaliador->pessoa->delete(); 
        $avaliador->delete();

        return response()->json(['message' => 'Instrutor deletado com sucesso']);
    }
}
