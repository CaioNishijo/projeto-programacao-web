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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::with('pessoa')->get();
        $avaliadores = Avaliador::with('pessoa')->get();
        $horarios = Horario::with('pessoa')->get();
        return view('avaliacaofisica.create', compact('clientes', 'avaliadores', 'horarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            AvaliacaoFisica::create($request->all());
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
