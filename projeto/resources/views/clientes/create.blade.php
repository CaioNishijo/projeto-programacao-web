<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Novo Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="container">
    <h1>Novo Cliente</h1>
    
    <form method="post" action="/produtos">
        @CSRF
        
        <form method="post">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" id="nome" name="nome" class="form-control" required="">
                        </div>
                    
                        <div class="mb-3">
                            <label for="sobrenome" class="form-label">Sobrenome</label>
                            <input type="text" id="sobrenome" name="sobrenome" class="form-control" required="">
                        </div>
                    
                        <div class="mb-3">
                            <label for="genero" class="form-label">Gênero</label>
                            <input type="text" id="genero" name="genero" class="form-control" required="">
                        </div>
                    
                        <div class="mb-3">
                            <label for="cpf" class="form-label">CPF</label>
                            <input type="text" id="cpf" name="cpf" class="form-control" required="">
                        </div>
                    
                        <div class="mb-3">
                            <label for="data_nascimento" class="form-label">Data de nascimento</label>
                            <input type="date" id="data_nascimento" name="data_nascimento" class="form-control">
                        </div>
                    
                        <div class="mb-3">
                            <label for="endereco" class="form-label">Endereço</label>
                            <input type="text" id="endereco" name="endereco" class="form-control" required="">
                        </div>
                    
                        <div class="mb-3">
                            <label for="numero_celular" class="form-label">Celular</label>
                            <input type="text" id="numero_celular" name="numero_celular" class="form-control" required="">
                        </div>
                    
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" id="email" name="email" class="form-control" required="">
                        </div>
                    
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>