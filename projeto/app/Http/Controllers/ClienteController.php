<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = User::where('role', 'CLI')->get();
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cliente = User::where('role', 'CLI')->findOrFail($id);
        return view("clientes.show", compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cliente = User::where('role', 'CLI')->findOrFail($id);
        return view("clientes.edit", compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $cliente = User::where('role', 'CLI')->findOrFail($id);
            
            $cliente->update([
                'status_atividade' => $request->status_atividade ?? false,
            ]);
            
            $cliente->update([
                'name' => $request->name,
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
            $cliente = User::where('role', 'CLI')->findOrFail($id);
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
