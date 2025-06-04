<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Consultar Resultado de Avaliação</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="container mt-4">
    <h1 class="mb-4">Resultado da Avaliação Física</h1>
    
    <form method="post" action="/resultados/{{ $resultado->id }}">
        @CSRF
        @method('DELETE')
        
        <div class="card mb-4">
            <div class="card-header bg-dark text-white">
                <h5>Dados da Avaliação</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="avaliacao_id" class="form-label">ID da Avaliação:</label>
                        <input type="text" id="avaliacao_id" value="{{ $resultado->avaliacao_id }}" class="form-control" disabled>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="data_avaliacao" class="form-label">Data da Avaliação:</label>
                        <input type="text" id="data_avaliacao" value="{{ $avaliacao->data_marcada }}" class="form-control" disabled>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="cliente" class="form-label">Cliente:</label>
                        <input type="text" id="cliente" value="{{ $avaliacao->cliente->name }}" class="form-control" disabled>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="avaliador" class="form-label">Avaliador:</label>
                        <input type="text" id="avaliador" value="{{ $avaliacao->avaliador->pessoa->nome }}" class="form-control" disabled>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5>Resultados Calculados</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="imc" class="form-label">IMC:</label>
                        <input type="text" id="imc" value="{{ number_format($resultado->imc, 2) }}" class="form-control" disabled>
                    </div>
                    <div class="col-md-8 mb-3">
                        <label for="classificacao" class="form-label">Classificação IMC:</label>
                        <input type="text" id="classificacao" 
                            value="@if($resultado->imc < 18.5)
                                        Magreza
                                    @elseif($resultado->imc < 24.9)
                                        Saudável
                                    @elseif($resultado->imc < 29.9)
                                        Sobrepeso
                                    @elseif($resultado->imc < 34.9)
                                        Obesidade Grau I
                                    @elseif($resultado->imc < 39.9)
                                        Obesidade Grau II
                                    @else
                                        Obesidade Grau III
                                    @endif" 
                            class="form-control" disabled>
                    </div>
                </div>
                
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>