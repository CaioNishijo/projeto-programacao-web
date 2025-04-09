@include('welcome')

@section('title', 'Lista de Instrutores')

@section('content')
<div class="container mt-4">
    <h2>Instrutores Cadastrados</h2>

    <a href="{{ route('instrutores.create') }}" class="btn btn-primary mb-3">Novo Instrutor</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($instrutores->isEmpty())
        <p>Nenhum instrutor cadastrado.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>CPF</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($instrutores as $instrutor)
                    <tr>
                        <td>{{ $instrutor->pessoa->nome }}</td>
                        <td>{{ $instrutor->pessoa->sobrenome }}</td>
                        <td>{{ $instrutor->pessoa->cpf }}</td>
                        <td>{{ $instrutor->pessoa->email }}</td>
                        <td>{{ $instrutor->pessoa->numero_celular }}</td>
                        <td>
                            <a href="{{ route('instrutores.edit', $instrutor->id) }}" class="btn btn-warning btn-sm">Editar</a>

                            <a href="/instrutores/{{ $instrutor->id }}" class="btn btn-info">Consultar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

