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

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{ $instrutor->pessoa->nome_completo }}</h5>
        <p class="card-text"><strong>Gênero:</strong> {{ $instrutor->pessoa->genero }}</p>
        <p class="card-text"><strong>CPF:</strong> {{ $instrutor->pessoa->cpf }}</p>
        <p class="card-text"><strong>Data de Nascimento:</strong> {{ \Carbon\Carbon::parse($instrutor->pessoa->data_nascimento)->format('d/m/Y') }}</p>
        <p class="card-text"><strong>Endereço:</strong> {{ $instrutor->pessoa->endereco }}</p>
        <p class="card-text"><strong>Telefone:</strong> {{ $instrutor->pessoa->telefone }}</p>
        <p class="card-text"><strong>Email:</strong> {{ $instrutor->pessoa->email }}</p>
      </div>
    </div>

    <a href="{{ route('instrutores.index') }}" class="btn btn-secondary mt-3">Voltar para a Lista</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
