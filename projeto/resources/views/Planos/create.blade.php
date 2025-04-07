@extends('layouts.app')

@section('title', 'Cadastrar Plano')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Cadastrar Novo Plano</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('planos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Plano</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>

        <div class="mb-3">
            <label for="duracao_meses" class="form-label">Duração (em meses)</label>
            <input type="number" class="form-control" id="duracao_meses" name="duracao_meses" required min="1">
        </div>

        <div class="mb-3">
            <label for="valor" class="form-label">Valor (R$)</label>
            <input type="number" step="0.01" class="form-control" id="valor" name="valor" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar Plano</button>
        <a href="{{ route('planos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
