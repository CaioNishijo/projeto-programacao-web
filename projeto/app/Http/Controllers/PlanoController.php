<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PlanoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $planos = Plano::all();
        return view('planos.index', compact('planos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('planos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric|min:0',
            'duracao_meses' => 'required|integer|min:1',
        ]);

        Plano::create($request->all());

        return redirect()->route('planos.index')->with('success', 'Plano cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plano $plano)
    {
        return view('planos.show', compact('plano'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plano $plano)
    {
        return view('planos.edit', compact('plano'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plano $plano)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric|min:0',
            'duracao_meses' => 'required|integer|min:1',
        ]);

        $plano->update($request->all());

        return redirect()->route('planos.index')->with('success', 'Plano atualizado com sucesso!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plano $plano)
    {
        $plano->delete();

        return redirect()->route('planos.index')->with('success', 'Plano excluído com sucesso!');
    }
}
