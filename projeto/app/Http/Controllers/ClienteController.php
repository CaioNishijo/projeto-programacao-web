<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pessoa;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PgSql\Lob;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::with('pessoa')->get();
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("clientes.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $pessoa = Pessoa::create($request->all());
            Cliente::create([
                'pessoa_id' => $pessoa->id,
                'status_atividade' => false,
            ]);
            return redirect()->route('clientes.index')
                ->with('sucesso', 'Cliente cadastrado com sucesso!');
        } catch (Exception $e){
            Log::error("Erro ao cadastrar cliente: ". $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->route('clientes.index')
                ->with('erro' , 'Erro ao cadastrar cliente!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cliente = Cliente::with('pessoa')->findOrFail($id);
        return view("clientes.show", compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cliente = Cliente::with('pessoa')->findOrFail($id);
        return view("clientes.edit", compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $cliente = Cliente::with('pessoa')->findOrFail($id);
            
            $cliente->update([
                'status_atividade' => $request->status_atividade ?? false,
            ]);
            
            $cliente->pessoa->update([
                'nome' => $request->nome,
                'sobrenome' => $request->sobrenome,
                'genero' => $request->genero,
                'cpf' => $request->cpf,
                'data_nascimento' => $request->data_nascimento,
                'endereco' => $request->endereco,
                'numero_celular' => $request->numero_celular,
                'email' => $request->email,
            ]);
            
            return redirect()->route('clientes.index')
                ->with('sucesso', 'Cliente alterado com sucesso!');
                
        } catch (Exception $e) {
            Log::error("Erro ao editar cliente: ". $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'cliente_id' => $id,
                'request' => $request->all()
            ]);
            
            return redirect()->route('clientes.index')
                ->with('erro', 'Erro ao editar cliente!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $cliente = Cliente::with('pessoa')->findOrFail($id);
            $cliente->delete();
            return redirect()->route('clientes.index')
                ->with('sucesso', 'Cliente excluído com sucesso!');
        } catch (Exception $e){
            Log::error("Erro ao excluir o cliente: ". $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'cliente_id' => $id
            ]);
            return redirect()->route('clientes.index')
                ->with('erro', 'Erro ao excluir!');
        }
    }
}
