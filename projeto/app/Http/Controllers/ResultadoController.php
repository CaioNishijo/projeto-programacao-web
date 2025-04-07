<?php

namespace App\Http\Controllers;

use App\Models\AvaliacaoFisica;
use App\Models\Resultado;
use Illuminate\Http\Request;

class ResultadoController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

        $imc = $avaliacao->peso_cliente / $avaliacao->altura_cliente ** 2;

        $resultado = Resultado::firstOrCreate(
            ['avaliacao_fisica_id' => $avaliacao->id],
            ['imc' => $imc]
        );
    
        return view('resultados.show', compact('resultado', 'avaliacao'));
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
