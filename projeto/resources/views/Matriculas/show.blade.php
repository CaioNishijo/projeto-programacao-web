@include('welcome')

@section('content')
<div class="container">
    <h1>Detalhes da Assinatura</h1>

    <div class="card mt-4">
        <div class="card-header">
            Assinatura #{{ $matricula->id }}
        </div>
        <div class="card-body">
            <p><strong>Cliente:</strong> {{ $matricula->cliente->pessoa->nome ?? 'N/A' }}</p>
            <p><strong>Plano:</strong> {{ $matricula->plano->duracao ?? 'N/A' }}</p>
            <p><strong>Data de Início:</strong> {{ \Carbon\Carbon::parse($matricula->data_inicial)->format('d/m/Y') }}</p>
            <p><strong>Data de Fim:</strong> {{ \Carbon\Carbon::parse($matricula->data_final)->format('d/m/Y') }}</p>
            <p><strong>Status:</strong> 
                @if ($matricula->status === 1)
                    <span class="badge bg-success">Ativa</span>
                @else
                    <span class="badge bg-secondary">Inativa</span>
                @endif
            </p>
        </div>
    </div>

    <a href="{{ route('matriculas.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>

@section('content')
<div class="container">

    <h4>Informações de Pagamento</h4>
    <p><strong>Status do Pagamento:</strong> 
        @if ($matricula->status === 1)
            <span class="badge bg-success">Pago</span>
        @else
            <span class="badge bg-secondary">Pendente</span>
       @endif
    </p>

    @if($matricula->data_pagamento)
        <p><strong>Data do Pagamento:</strong> {{ \Carbon\Carbon::parse($matricula->data_pagamento)->format('d/m/Y') }}</p>
    @else
        <a href="{{ route('matriculas.pagar', $matricula->id) }}" class="btn btn-primary">Efetuar Pagamento</a>
    @endif

    <a href="{{ route('matriculas.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
