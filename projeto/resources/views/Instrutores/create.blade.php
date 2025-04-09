<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Novo Instrutor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="container mt-5">
    <h1>Novo Instrutor</h1>
    
    <form method="post" action="/instrutores">
        @csrf
        
        <div class="mb-3">
            <label for="nome_completo" class="form-label">Nome completo</label>
            <input type="text" id="nome_completo" name="nome_completo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="genero" class="form-label">Gênero</label>
            <input type="text" id="genero" name="genero" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" id="cpf" name="cpf" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data de nascimento</label>
            <input type="date" id="data_nascimento" name="data_nascimento" class="form-control">
        </div>

        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" id="endereco" name="endereco" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Celular</label>
            <input type="text" id="telefone" name="telefone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" id="email" name="email" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Instrutor</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

