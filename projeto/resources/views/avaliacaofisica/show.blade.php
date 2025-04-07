<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Consultar Avaliação Física</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="container mt-4">
    <h1 class="mb-4">Consultar Avaliação Física</h1>
    
    <form method="post" action="/avaliacaofisica/{{ $avaliacao->id }}">
        @CSRF
        @method('DELETE')
        
        <div class="card mb-4">
            <div class="card-header bg-dark text-white">
                <h5>Informações do Agendamento</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="data_marcada" class="form-label">Data da Avaliação:</label>
                        <input type="date" id="data_marcada" value="{{ $avaliacao->data_marcada }}" class="form-control" disabled>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="horario" class="form-label">Horário:</label>
                        <input type="text" id="horario" value="{{ $avaliacao->horario->horario }}" class="form-control" disabled>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="cliente" class="form-label">Cliente:</label>
                        <input type="text" id="cliente" value="{{ $avaliacao->cliente->pessoa->nome }}" class="form-control" disabled>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="avaliador" class="form-label">Avaliador:</label>
                        <input type="text" id="avaliador" value="{{ $avaliacao->avaliador->pessoa->nome }}" class="form-control" disabled>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between">
            <p class="lead">Deseja excluir esta avaliação?</p>
            <div>
                <a href="/avaliacaofisica" class="btn btn-secondary me-2">Voltar</a>
                <button type="submit" class="btn btn-danger">Excluir Avaliação</button>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>