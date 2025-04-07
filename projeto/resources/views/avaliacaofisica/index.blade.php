<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliações Físicas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>  
    @include('cabecalho')
    <div class="container">
    
        <h2>Avaliações Físicas</h2>
        <a href="/avaliacaofisica/create" class="btn btn-success mb-3">Nova Avaliação</a>
        
        @if(session('sucesso'))
            <div class="alert alert-success">
                {{ session('sucesso') }}
            </div>
        @endif
        
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data</th>
                    <th>Cliente</th>
                    <th>Avaliador</th>
                    <th>Horário</th>
                    <th>Altura</th>
                    <th>Peso</th>
                    <th>Realizada</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($avaliacoes as $avaliacao)
                    <tr>
                        <td>{{ $avaliacao->id }}</td>
                        <td>{{ $avaliacao->data_marcada }}</td>
                        <td>{{ $avaliacao->cliente->pessoa->nome }}</td>
                        <td>{{ $avaliacao->avaliador->pessoa->nome }}</td>
                        <td>{{ $avaliacao->horario->horario }}</td>
                        <td>{{ $avaliacao->altura_cliente }}m</td>
                        <td>{{ $avaliacao->peso_cliente }}kg</td>
                        <td>{{ $avaliacao->foi_realizada ? 'Sim' : 'Não' }}</td>
                        <td>
                            @if($avaliacao->foi_realizada == 0)
                                <a href="/avaliacaofisica/{{ $avaliacao->id }}/edit" class="btn btn-warning btn-sm">Realizar avaliação</a>
                            @else
                                <a href="/resultados/{{ $avaliacao->id }}" class="btn btn-warning btn-sm">Ver resultado</a>
                            @endif
                            <a href="/avaliacaofisica/{{ $avaliacao->id }}" class="btn btn-info btn-sm">Consultar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>