<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalhes do Instrutor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="container mt-4">
    <h1>Detalhes do Instrutor</h1>

    <form method="post" action="/instrutores/{{ $instrutor->id }}">
        @CSRF
        @method('DELETE')
        
        <div class="card mb-4">
            <div class="card-header bg-dark text-white">
                <h5>Dados Pessoais</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" id="nome" value="{{ $instrutor->pessoa->nome }}" class="form-control" disabled>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="sobrenome" class="form-label">Sobrenome:</label>
                        <input type="text" id="sobrenome" value="{{ $instrutor->pessoa->sobrenome }}" class="form-control" disabled>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="cpf" class="form-label">CPF:</label>
                        <input type="text" id="cpf" value="{{ $instrutor->pessoa->cpf }}" class="form-control" disabled>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
                        <input type="date" id="data_nascimento" value="{{ $instrutor->pessoa->data_nascimento }}" class="form-control" disabled>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="genero" class="form-label">Gênero:</label>
                        <input type="text" id="genero" value="{{ $instrutor->pessoa->genero }}" class="form-control" disabled>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-dark text-white">
                <h5>Informações de Contato</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">E-mail:</label>
                        <input type="email" id="email" value="{{ $instrutor->pessoa->email }}" class="form-control" disabled>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="numero_celular" class="form-label">Celular:</label>
                        <input type="tel" id="numero_celular" value="{{ $instrutor->pessoa->numero_celular }}" class="form-control" disabled>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="endereco" class="form-label">Endereço:</label>
                    <input type="text" id="endereco" value="{{ $instrutor->pessoa->endereco }}" class="form-control" disabled>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <p class="lead">Deseja excluir este Instrutor?</p>
            <div>
                <a href="/clientes" class="btn btn-secondary me-2">Cancelar</a>
                <button type="submit" class="btn btn-danger">Excluir Instrutor</button>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
