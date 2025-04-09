<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matricula;
use App\Models\Cliente;
use App\Models\Pagamento;
use App\Models\Planos;
use Carbon\Carbon;

class MatriculaController extends Controller
{

    public function index()
    {
        $matriculas = Matricula::with('cliente.pessoa', 'plano')->get();
        return view('matriculas.index', compact('matriculas'));
    }

    
    public function create()
    {
        $clientes = Cliente::with('pessoa')->get();
        $planos = Planos::all();
        return view('matriculas.create', compact('clientes', 'planos'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'plano_id' => 'required|exists:planos,id',
            'data_inicial' => 'required|date',
        ]);

        $plano = Planos::find($request->plano_id);

        $dataInicial = Carbon::parse($request->data_inicial);
        $dataFinal = $dataInicial->copy()->addDays($plano->duracao_dias ?? 30); 

        Matricula::create([
            'cliente_id'   => $request->cliente_id,
            'plano_id'     => $request->plano_id,
            'data_inicial' => $dataInicial,
            'data_final'   => $dataFinal,
            'status' => 0
        ]);

        return redirect()->route('matriculas.index')->with('success', 'Assinatura realizada com sucesso!');
    }

    
    public function show($id)
    {
        $matricula = Matricula::with('cliente.pessoa', 'plano')->findOrFail($id);
        return view('matriculas.show', compact('matricula'));
    }
    public function formPagamento($id)
    {
        $matricula = Matricula::findOrFail($id);
        return view('matriculas.pagar', compact('matricula'));
    }

    public function efetuarPagamento(Request $request, $id)
    {
        $matricula = Matricula::with('plano')->findOrFail($id);

        Pagamento::create([
            'data_pagamento' => now(),
            'status_pagamento' => 1,
            'cliente_id' => $matricula->cliente_id,
            'valor' => $matricula->plano->preco
        ]);

        $matricula->update([
            'status' => 1
        ]);

        return redirect()->route('matriculas.show', $matricula->id)->with('success', 'Pagamento registrado com sucesso!');
    }
}
