<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>  
    @include('cabecalho')
    <div class="container">
    <h2>Clientes</h2>
                        <a href="/clientes/create" class="btn btn-success mb-3">Novo Registro</a>
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>nome</th><th>email</th><th>status_atividade</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            @foreach($clientes as $cliente)
                            <tbody>
                                
                                    <tr>
                                        <td>{{ $cliente->id }}</td>
                                        <td>{{ $cliente->name }}</td><td>{{ $cliente->email }}</td><td>{{ $cliente->status_atividade }}</td>
                                        <td>
                                            <a href="/clientes/{{ $cliente->id }}/edit" class="btn btn-warning">Editar</a>
                                            <a href="/clientes/{{ $cliente->id }}" class="btn btn-info">Consultar</a>
                                        </td>
                                    </tr>
                            </tbody>
                            @endforeach
                        </table>
 
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>