<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Agendar avaliação física</h1>
        <form method="post" action="/avaliacaofisica/{{$avaliacao->id}}">
            @CSRF
            @method('PUT')
            <div class="mb-3">
                <label for="data_marcada" class="form-label">Data para avaliação</label>
                <input type="date" id="data_marcada" name="data_marcada" class="form-control" required="" value="{{$avaliacao->data_marcada}}">
            </div>
            <div class="mb-3">
                <label for="cliente_id" class="form-label">Cliente</label>
                <select id="cliente_id" name="cliente_id" class="form-select" required="">
                    @foreach($clientes as $cliente)
                        <option value="{{$cliente->id}}" {{ $avaliacao->cliente_id == $cliente->id ? "selected" : "" }} >{{$cliente->pessoa->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="horario" class="form-label">Horários</label>
                <select id="horario_id" name="horario_id" class="form-select" required="">
                    @foreach($horarios as $horario)
                        <option value="{{$horario->id}}" {{ $avaliacao->horario_id == $horario->id ? "selected" : "" }} >{{$horario->horario}} - {{$horario->avaliador->pessoa->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="peso_cliente" class="form-label">Peso(Kg)</label>
                <input step=".01" class="form-control" type="number" id="peso_cliente" name="peso_cliente" type="text" value="{{$avaliacao->peso_cliente}}">
            </div>
            <div class="mb-3">
                <label for="altura_cliente" class="form-label">Altura(m)</label>
                <input step=".01" class="form-control" type="number" id="altura_cliente" name="altura_cliente" type="text" value="{{$avaliacao->altura_cliente}}">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </div>
</body>
</html>