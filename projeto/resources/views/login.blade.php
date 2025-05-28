<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card login-card">
                    <div class="card-header login-header">
                        <h4><i class="bi bi-box-arrow-in-right"></i> Login</h4>
                    </div>
                    <div class="card-body login-body">
                        <form method="post" action="/login">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <div class="input-group">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Digite seu e-mail" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Senha</label>
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Digite sua senha" required>
                                </div>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="lembrar">
                                <label class="form-check-label" for="lembrar">Lembrar-me</label>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-login">Entrar</button>
                            </div>
                            <div class="text-center mt-3">
                                <a href="#" class="text-decoration-none">Esqueceu a senha?</a>
                            </div>
                            <hr>
                            <div class="text-center">
                                <p class="mb-0">Não tem uma conta? <a href="/users/create" class="text-decoration-none">Cadastre-se</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>