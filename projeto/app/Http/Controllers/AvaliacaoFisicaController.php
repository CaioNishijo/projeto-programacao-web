<?php

namespace App\Http\Controllers;

use App\Models\AvaliacaoFisica;
use App\Models\Avaliador;
use App\Models\Cliente;
use App\Models\Horario;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AvaliacaoFisicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $avaliacoes = AvaliacaoFisica::with([
            'cliente.pessoa', 
            'avaliador.pessoa',
            'horario'
        ])
        ->orderBy('data_marcada', 'desc')
        ->get();

        return view('avaliacaofisica.index', compact('avaliacoes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::with('pessoa')->get();
        $horarios = Horario::with('avaliador.pessoa')->get();
        return view('avaliacaofisica.create', compact('clientes', 'horarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $horario = Horario::findOrFail($request->horario_id);

            AvaliacaoFisica::create([
                'data_marcada' => $request->input('data_marcada'),
                'cliente_id' => $request->input('cliente_id'),
                'horario_id' => $request->input('horario_id'),
                'avaliador_id' => $horario->avaliador_id
            ]);
            return redirect()->route('avaliacaofisica.index')
                ->with('sucesso', 'Avaliação física agendada com sucesso!');
        } catch (Exception $e){
            Log::error("Erro ao agendar: ". $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->route('avaliacaofisica.index')
                ->with('erro' , 'Erro ao agendar!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $avaliacao = AvaliacaoFisica::with([
            'cliente.pessoa', 
            'avaliador.pessoa',
            'horario'
        ])->findOrFail($id);
    
        return view('avaliacaofisica.show', compact('avaliacao'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $avaliacao = AvaliacaoFisica::with([
            'cliente.pessoa', 
            'avaliador.pessoa',
            'horario'
        ])->findOrFail($id);
        
        $clientes = Cliente::with('pessoa')->get();
        $horarios = Horario::with('avaliador.pessoa')->get();
        
        return view('avaliacaofisica.edit', compact('avaliacao', 'clientes', 'horarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $avaliacao = AvaliacaoFisica::findOrFail($id);
            $horario = Horario::findOrFail($request->horario_id);
            
            $avaliacao->update([
                'altura_cliente' => $request->altura_cliente,
                'peso_cliente'  => $request->peso_cliente,
                'data_marcada'  => $request->data_marcada,
                'foi_realizada' => 1,
                'cliente_id' => $request->cliente_id,
                'horario_id' => $request->horario_id,
                'avaliador_id' => $horario->avaliador_id
            ]);

            return redirect()->route('avaliacaofisica.index')
                ->with('sucesso', 'Avaliação alterada com sucesso!');
                
        } catch (Exception $e) {
            Log::error("Erro ao editar avaliação: ". $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'avaliacao_id' => $id,
                'request' => $request->all()
            ]);
            
            return redirect()->route('avaliacaofisica.index')
                ->with('erro', 'Erro ao editar cliente!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $avaliacao = AvaliacaoFisica::with([
                'cliente.pessoa', 
                'avaliador.pessoa',
                'horario'
            ])->findOrFail($id);
            $avaliacao->delete();
            return redirect()->route('avaliacaofisica.index')
                ->with('sucesso', 'Agendamento excluído com sucesso!');
        } catch (Exception $e){
            Log::error("Erro ao excluir o agendamento: ". $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'avaliacao_id' => $id
            ]);
            return redirect()->route('avaliacaofisica.index')
                ->with('erro', 'Erro ao excluir!');
        }
    }
}
