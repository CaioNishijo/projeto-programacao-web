<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Instrutor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="container mt-4">
    <h1>Editar Instrutor</h1>

    <form method="POST" action="{{ route('instrutores.update', $instrutor->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome_completo" class="form-label">Nome Completo</label>
            <input type="text" name="nome_completo" id="nome_completo" class="form-control" required value="{{ $instrutor->pessoa->nome_completo }}">
        </div>

        <div class="mb-3">
            <label for="genero" class="form-label">Gênero</label>
            <input type="text" name="genero" id="genero" class="form-control" required value="{{ $instrutor->pessoa->genero }}">
        </div>

        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" id="cpf" class="form-control" required value="{{ $instrutor->pessoa->cpf }}">
        </div>

        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento</label>
            <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" value="{{ $instrutor->pessoa->data_nascimento }}">
        </div>

        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" name="endereco" id="endereco" class="form-control" required value="{{ $instrutor->pessoa->endereco }}">
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" name="telefone" id="telefone" class="form-control" required value="{{ $instrutor->pessoa->telefone }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required value="{{ $instrutor->pessoa->email }}">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('instrutores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
