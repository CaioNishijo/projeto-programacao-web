@include('welcome')

@section('content')
<div class="container">
    <h2>Registrar pagamento da mensalidade</h2>
    <p><strong>Cliente:</strong> {{ $matricula->cliente->pessoa->nome }}</p>
    <p><strong>Plano:</strong> {{ $matricula->plano->duracao }}</p>
    <p><strong>Status atual:</strong> {{ $matricula->status_pagamento }}</p>

    <form action="{{ route('matriculas.efetuarPagamento', $matricula->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">Confirmar pagamento</button>
        <a href="{{ route('matriculas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
