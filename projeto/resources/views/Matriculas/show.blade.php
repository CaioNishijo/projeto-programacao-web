@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes da Assinatura</h1>

    <div class="card mt-4">
        <div class="card-header">
            Assinatura #{{ $matricula->id }}
        </div>
        <div class="card-body">
            <p><strong>Cliente:</strong> {{ $matricula->cliente->nome ?? 'N/A' }}</p>
            <p><strong>Plano:</strong> {{ $matricula->plano->nome ?? 'N/A' }}</p>
            <p><strong>Data de Início:</strong> {{ \Carbon\Carbon::parse($matricula->data_inicial)->format('d/m/Y') }}</p>
            <p><strong>Data de Fim:</strong> {{ \Carbon\Carbon::parse($matricula->data_final)->format('d/m/Y') }}</p>
            <p><strong>Status:</strong> 
                @if ($matricula->status === 'ativa')
                    <span class="badge bg-success">Ativa</span>
                @else
                    <span class="badge bg-secondary">Inativa</span>
                @endif
            </p>
        </div>
    </div>

    <a href="{{ route('matriculas.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalhes da Matrícula</h2>

    <p><strong>Cliente:</strong> {{ $matricula->cliente->nome }}</p>
    <p><strong>Plano:</strong> {{ $matricula->plano->nome }}</p>
    <p><strong>Data de Início:</strong> {{ $matricula->data_inicial }}</p>
    <p><strong>Data Final:</strong> {{ $matricula->data_final }}</p>
    <p><strong>Status:</strong> {{ $matricula->status }}</p>

    <hr>

    <h4>Informações de Pagamento</h4>
    <p><strong>Status do Pagamento:</strong> {{ ucfirst($matricula->status_pagamento) }}</p>

    @if($matricula->data_pagamento)
        <p><strong>Data do Pagamento:</strong> {{ \Carbon\Carbon::parse($matricula->data_pagamento)->format('d/m/Y') }}</p>
    @else
        <p><strong>Data do Pagamento:</strong> <em>Não pago</em></p>
        <a href="{{ route('matriculas.pagar', $matricula->id) }}" class="btn btn-primary">Efetuar Pagamento</a>
    @endif

    <a href="{{ route('matriculas.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection
