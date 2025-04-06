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
        <form method="post">
        @csrf
            <div class="mb-3">
                <label for="data_marcada" class="form-label">Data para avaliação</label>
                <input type="date" id="data_marcada" name="data_marcada" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="cliente_id" class="form-label">Cliente</label>
                <select id="cliente_id" name="cliente_id" class="form-select" required="">
                    @foreach($clientes as $cliente)
                        <option value="{{$cliente->pessoa->id}}">{{$cliente->pessoa->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="horario" class="form-label">Horários</label>
                <select id="horario_id" name="horario_id" class="form-select" required="">
                    @foreach($horarios as $horario)
                        <option value="{{$horario->id}}">{{$horario->horario}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="avaliador_id" class="form-label">Avaliadores</label>
                <select id="avaliador_id" name="avaliador_id" class="form-select" required="">
                @foreach($avaliadores as $avaliador)
                    <option value="{{$avaliador->pessoa->id}}">{{$avaliador->pessoa->nome}}</option>
                @endforeach
                </select>
            </div> 
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </div>
</body>
</html>