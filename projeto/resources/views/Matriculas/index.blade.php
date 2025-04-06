@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Assinaturas Realizadas</h1>

    <a href="{{ route('matriculas.create') }}" class="btn btn-primary mb-3">Nova Assinatura</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($matriculas->isEmpty())
        <p>Nenhuma assinatura encontrada.</p>
    @else
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Plano</th>
                    <th>Data Inicial</th>
                    <th>Data Final</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($matriculas as $matricula)
                    <tr>
                        <td>{{ $matricula->id }}</td>
                        <td>{{ $matricula->cliente->nome ?? 'N/A' }}</td>
                        <td>{{ $matricula->plano->nome ?? 'N/A' }}</td>
                        <td>{{ \Carbon\Carbon::parse($matricula->data_inicial)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($matricula->data_final)->format('d/m/Y') }}</td>
                        <td>
                            @if ($matricula->status === 'ativa')
                                <span class="badge bg-success">Ativa</span>
                            @else
                                <span class="badge bg-secondary">Inativa</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('matriculas.show', $matricula->id) }}" class="btn btn-info btn-sm">Detalhes</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
