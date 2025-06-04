@include('layout')

<div class="container">
    <h1 class="mb-4">Realizar Assinatura</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Erro!</strong> Por favor, corrija os campos abaixo:<br><br>
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('matriculas.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="cliente_id">Cliente</label>
            <select name="cliente_id" class="form-control" required>
                <option value="">Selecione um cliente</option>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="plano_id">Plano</label>
            <select name="plano_id" class="form-control" required>
                <option value="">Selecione um plano</option>
                @foreach ($planos as $plano)
                    <option value="{{ $plano->id }}">{{ $plano->nome }} (R$ {{ number_format($plano->preco, 2, ',', '.') }} - {{ $plano->duracao_dias }} mes)</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="data_inicial">Data de Início</label>
            <input type="date" name="data_inicial" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Confirmar Assinatura</button>
        <a href="{{ route('matriculas.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>