<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Consultar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="container mt-4">
    <h1 class="mb-4">Consultar Cliente</h1>
    
    <form method="post" action="/clientes/{{ $cliente->id }}">
        @CSRF
        @method('DELETE')
        
        <div class="card mb-4">
            <div class="card-header bg-dark text-white">
                <h5>Dados Pessoais</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Nome:</label>
                        <input type="text" id="name" value="{{ $cliente->name }}" class="form-control" disabled>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" id="email" value="{{ $cliente->email }}" class="form-control" disabled>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-dark text-white">
                <h5>Status do Cliente</h5>
            </div>
            <div class="card-body">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="status_atividade" 
                           {{ $cliente->status_atividade ? 'checked' : '' }} disabled>
                    <label class="form-check-label" for="status_atividade">
                        Cliente {{ $cliente->status_atividade ? 'Ativo' : 'Inativo' }}
                    </label>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <p class="lead">Deseja excluir este cliente?</p>
            <div>
                <a href="/clientes" class="btn btn-secondary me-2">Cancelar</a>
                <button type="submit" class="btn btn-danger">Excluir Cliente</button>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>