@extends('layouts.app')

@section('title', 'Detalhes do Plano')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Detalhes do Plano</h1>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $plano->nome }}</h4>
            <p class="card-text"><strong>Duração:</strong> {{ $plano->duracao_meses }} meses</p>
            <p class="card-text"><strong>Valor:</strong> R$ {{ number_format($plano->valor, 2, ',', '.') }}</p>
        </div>
    </div>

    <a href="{{ route('planos.edit', $plano->id) }}" class="btn btn-warning mt-3">Editar</a>
    <a href="{{ route('planos.index') }}" class="btn btn-secondary mt-3">Voltar à lista</a>
</div>
@endsection
