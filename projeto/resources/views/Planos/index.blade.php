@include('welcome')
@section('title', 'Planos')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Planos Cadastrados</h1>

    <a href="{{ route('planos.create') }}" class="btn btn-primary mb-3">Cadastrar Novo Plano</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($planos->isEmpty())
        <p>Não há planos cadastrados.</p>
    @else
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Duração (meses)</th>
                    <th>Valor (R$)</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($planos as $plano)
                    <tr>
                        <td>{{ $plano->id }}</td>
                        <td>{{ $plano->nome }}</td>
                        <td>{{ $plano->duracao_meses }}</td>
                        <td>{{ number_format($plano->valor, 2, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('planos.show', $plano->id) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('planos.edit', $plano->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('planos.destroy', $plano->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Tem certeza que deseja excluir este plano?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
