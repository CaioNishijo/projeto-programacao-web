<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Avaliador;
use App\Models\Pessoa;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        try{
            $pessoa = Pessoa::create($request->all());
            Avaliador::create([
                'pessoa_id' => $pessoa->id
            ]);
            return redirect()->route('instrutores.index')
                ->with('sucesso', 'Instrutor cadastrado com sucesso!');
        } catch (Exception $e){
            Log::error("Erro ao cadastrar instrutor: ". $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->route('instrutores.index')
                ->with('erro' , 'Erro ao cadastrar cliente!');
        }

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

        return view('instrutores.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $instrutor = Avaliador::with('pessoa')->findOrFail($id);
            $instrutor->delete();
            return redirect()->route('instrutores.index')
                ->with('sucesso', 'Instrutor excluído com sucesso!');
        } catch (Exception $e){
            Log::error("Erro ao excluir o instrutor: ". $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'cliente_id' => $id
            ]);
            return redirect()->route('instrutores.index')
                ->with('erro', 'Erro ao excluir!');
        }
    }
}
